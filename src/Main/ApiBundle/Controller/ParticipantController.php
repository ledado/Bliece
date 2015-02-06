<?php
/**
 * Created by PhpStorm.
 * User: Lednicky
 * Date: 18.10.2014
 * Time: 20:07
 */

namespace Main\ApiBundle\Controller;

use Main\ApiBundle\Entity\EventUserNotification;
use Main\ApiBundle\Entity\EventUserParticipant;
use Main\ApiBundle\Entity\Notification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Main\ApiBundle\Entity\Participant;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityRepository;

class ParticipantController extends Controller {
    public function addParticipantAction(Request $request){
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->get('doctrine')->getManager();

        $participantId = $request->query->get('participantId');
        $participantUser = $em->getRepository('MainApiBundle:User')->findOneById($participantId);

        $eventId = $request->query->get('eventId');
        $userEntity = $em->getRepository('MainApiBundle:User')->findOneById($user->getId());
        $event = $em->getRepository('MainApiBundle:Event')->findOneById($eventId);


        $participant = new Participant();
        $participant->setUser($participantUser);
        $participant->setIsActive(false);
        $em->persist($participant);
        $em->flush();

        $eventUserParticipant = new EventUserParticipant();
        $eventUserParticipant->setParticipant($participant);
        $eventUserParticipant->setUser($userEntity);
        $eventUserParticipant->setEvent($event);
        $em->persist($eventUserParticipant);
        $em->flush();

        $this->get('notification_service')->createEventUserNotification($participantUser,2,$eventId,$user->getId());

        $response = array(
            "code" => 100,
        );
        return new Response(json_encode($response));


    }

    public function getAvailableUserAction(Request $request){
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->get('doctrine')->getManager();

        $eventId = $request->query->get('eventId');
        $event = $em->getRepository('MainApiBundle:Event')->findOneById($eventId);
        $userConnects = $em->getRepository('MainApiBundle:UserConnect')->findByUser($user);

        $availableUsersId = array();
        $availableUsersName = array();
        $isInvite = array();
        foreach($userConnects as $userConnect){
            if($userConnect->getConnect()->getIsActive() == true){

                $isInvited = false; //identifikator ci uz bol pozvany
                $isParticipant = false; //identifikator ci patri medzi aktivnych participantov
                foreach($event->getEventUserParticipans() as $eventUserParticipant){

                    if($eventUserParticipant->getParticipant()->getUser()->getId() == $userConnect->getConnect()->getUser()->getId()){

                        if($eventUserParticipant->getParticipant()->getIsActive() == 0){
                            $isInvited = true;
                        }else{
                            $isParticipant = true;
                        }


                    }
                }
                if(!$isParticipant){ //aby vratilo iba neaktivnych participantov
                    $availableUsersName[] = $userConnect->getConnect()->getUser()->getUsername();
                    $availableUsersId[] = $userConnect->getConnect()->getUser()->getId();
                    $isInvite[] = $isInvited;
                }




            }

        }

        $response = array(
            "code" => 100,
            "availableUsersId" => $availableUsersId,
            "availableUsersName" => $availableUsersName,
            "isInvite" => $isInvite

        );
        return new Response(json_encode($response));

    }

} 
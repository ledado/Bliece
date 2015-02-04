<?php
/**
 * Created by PhpStorm.
 * User: Lednicky
 * Date: 18.10.2014
 * Time: 20:07
 */

namespace Main\ApiBundle\Controller;

use Main\ApiBundle\Entity\EventUserNotification;
use Main\ApiBundle\Entity\Notification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Main\ApiBundle\Entity\Participant;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityRepository;

class ParticipantController extends Controller {
    public function addParticipantAction(Request $request, $event_id){
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->get('doctrine')->getManager();

        $userId = $em->getRepository('MainApiBundle:User')->findOneById($user->getId());
        $event = $em->getRepository('MainApiBundle:Event')->findOneById($event_id);

        $userConnects = $em->getRepository('MainApiBundle:UserConnect')->findByUser($user);

        $form = $this->createFormBuilder()
            ->getForm();


        foreach($userConnects as $key => $userConnect){
            if($userConnect->getConnect()->getIsActive() == true){
                $isPraticipant = false; //aby v pripade ze uz je medzi participantmi aby ho nezobrazilo
                foreach($event->getParticipans() as $participant){
                    if($participant->getUserUnder()->getId() == $userConnect->getConnect()->getUser()->getId()){
                       $isPraticipant = true;
                    }
                }

                if($isPraticipant == false){
                    $form->add($key,'checkbox', array(
                        'label'     => $userConnect->getConnect()->getUser(),
                        'required'  => false,
                        'value'     => $userConnect->getConnect()->getUser()->getId(),
                    ));
                }


            }

        }

        $form->add('send', 'submit', array('label' => 'Send request'));

        $form->handleRequest($request);

        $error = "";

        if ($form->isValid()) {

            $requestData = $request->get('form');
            $a = 0;
            for($i = 0; $i == $a; $i++) //pridavanie checknutych userov
                if(!empty($requestData[$i])){

                    $toUser = $em->getRepository('MainApiBundle:User')->findOneById($requestData[$i]);
                    $notification = $this->get('notification_service')->createNotification($toUser,2,$event_id,$user->getId());

                    $participant = new Participant();
                    $participant->setEvent($event);
                    $participant->setUser($userId);
                    $participant->setUserUnder($toUser);
                    $participant->setIsActive(false);
                    $em->persist($participant);
                    $em->flush();




                    $a++;
                }else{
                    $a--;
                }



            $error = 'Participant was added';
        }



        return $this->render('MainApiBundle:Event:create_event.html.twig', array(
            'form' => $form->createView(),
            'error' => $error,
        ));
    }

    public function getAvailableUser(Request $request){
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->get('doctrine')->getManager();

        $eventId = $request->query->get('eventId');
        $event = $em->getRepository('MainApiBundle:Event')->findOneById($eventId);
        $userConnects = $em->getRepository('MainApiBundle:UserConnect')->findByUser($user);

        $availableUsers = array();
        foreach($userConnects as $key => $userConnect){
            if($userConnect->getConnect()->getIsActive() == true){
                $isPraticipant = false; //aby v pripade ze uz je medzi participantmi aby ho nezobrazilo
                foreach($event->getParticipans() as $participant){
                    if($participant->getUserUnder()->getId() == $userConnect->getConnect()->getUser()->getId()){
                        $isPraticipant = true;
                    }
                }

                if($isPraticipant == false){
                    $availableUsers[] = $userConnect->getConnect()->getUser();
                }


            }

        }

        $response = array(
            "code" => 100,
            "availableUsers" => $availableUsers

        );
        return new Response(json_encode($response));

    }

} 
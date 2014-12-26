<?php
/**
 * Created by PhpStorm.
 * User: Lednicky
 * Date: 18.10.2014
 * Time: 20:07
 */

namespace Main\ApiBundle\Controller;

use Main\ApiBundle\Entity\Notification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Main\ApiBundle\Entity\Participant;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityRepository;

class ParticipantController extends Controller {
    public function addParticipantAction(Request $request, $event_id){
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->get('doctrine')->getManager();

        $userId = $em->getRepository('MainApiBundle:User')->findOneById($user->getId());
        $eventId = $em->getRepository('MainApiBundle:Event')->findOneById($event_id);

        $form = $this->createFormBuilder()
            ->add('usersUnder', 'entity', array(
                'class' => 'MainApiBundle:User',
                'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.username', 'ASC');
                    },
            ))

            ->add('send', 'submit', array('label' => 'Send request'))
            ->getForm();

        $form->handleRequest($request);



        $error = "";

        

        
        if ($form->isValid()) {
            $data = $form->getData();

            $notification = new Notification();
            $notification->setTitle('Notification title');
            $notification->setType(1);
            $notification->setToUser($data['usersUnder']);
            $notification->setFromUser($userId);
            $notification->setDate(new \DateTime('now'));
            $notification->setIsNew(true);


            $participant = new Participant();
            $participant->setEvent($eventId);
            $participant->setUser($userId);
            $participant->setUserUnder($data['usersUnder']);
            $participant->setIsActive(false);

            $em->persist($participant);
            $em->persist($notification);
            $em->flush();
            $error = 'Participant was added';
        }



        return $this->render('MainApiBundle:Event:create_event.html.twig', array(
            'form' => $form->createView(),
            'error' => $error,
        ));
    }

} 
<?php
/**
 * Created by PhpStorm.
 * User: Lednicky
 * Date: 16.10.2014
 * Time: 20:56
 */

namespace Main\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class MainController extends Controller {
    public function indexAction(){
        $user = $this->get('security.context')->getToken()->getUser();

        $em = $this->get('doctrine')->getManager();
        $events = $em->getRepository('MainApiBundle:Event')->findByUser($user->getId());
        $notifications = $em->getRepository('MainApiBundle:Notification')->getBackNotification($user->getId());
        $asParticipants = $em->getRepository('MainApiBundle:Participant')->findBy(
            array( 'user' => $user->getId())
        );

        $participantEvents = array();
        foreach($asParticipants as $asParticipant){
            $participantEvents[] = $asParticipant->getEventUserParticipant()->getEvent(); //eventy na ktorych som ako participant
        }

        $userConnections = $em->getRepository('MainApiBundle:UserConnect')->findBy(
            array('user' => $user)
        );


        return $this->render('MainApiBundle:Main:index.html.twig', array(
            'events' => $events,
            'user' => $user,
            'notifications' => $notifications,
            'userConnections' => $userConnections,
            'participantEvents' => $participantEvents
        ));
    }

    public function dashboardAction(){
        $user = $this->get('security.context')->getToken()->getUser();

        $em = $this->get('doctrine')->getManager();
        $events = $em->getRepository('MainApiBundle:Event')->findByUser($user->getId());
        $notifications = $em->getRepository('MainApiBundle:Notification')->findBy(
            array('user' => $user->getId(), 'isNew' => true)
        );
        $userConnections = $em->getRepository('MainApiBundle:UserConnect')->findBy(
            array('user' => $user)
        );


        return $this->render('MainApiBundle:Main:dashboard.html.twig', array(
            'events' => $events,
            'user' => $user,
            'notifications' => $notifications,
            'userConnections' => $userConnections
            ));
    }
} 
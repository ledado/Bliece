<?php
/**
 * Created by PhpStorm.
 * User: Lednicky
 * Date: 17.10.2014
 * Time: 20:28
 */

namespace Main\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Main\ApiBundle\Entity\Event;
use Symfony\Component\HttpFoundation\Session\Session;

class EventController extends Controller {
    public function createEventAction(Request $request){

        $user = $this->get('security.context')->getToken()->getUser();

        $em = $this->get('doctrine')->getManager();
        $userId = $em->getRepository('MainApiBundle:User')->findOneById($user->getId());

        $form = $this->createFormBuilder()
            ->add('eventName', 'text')
            ->add('eventDescription', 'textarea')
            ->add('eventDate', 'date')
            ->add('save', 'submit', array('label' => 'Create'))
            ->getForm();

        $form->handleRequest($request);



        $error = "";



        if ($form->isValid()) {

            $data = $form->getData();

            $event = new Event();
            $event->setName($data['eventName']);
            $event->setDescription($data['eventDescription']);
            $event->setUser($userId);
            $event->setDate(new \DateTime('now'));
            $event->setEventDate($data['eventDate']);

            $em->persist($event);
            $em->flush();
            $error = 'Event was created';
        }



        return $this->render('MainApiBundle:Event:create_event.html.twig', array(
            'form' => $form->createView(),
            'error' => $error,
        ));



    }
    public function getEventAction($eventName){

        $user = $this->get('security.context')->getToken()->getUser();

        $em = $this->get('doctrine')->getManager();
        $event = $em->getRepository('MainApiBundle:Event')->findOneByName($eventName);

        $verification = false;
        foreach($event->getUser()->getUserConnections() as $userConnection){
            if($userConnection->getConnect()->getUser()->getId() == $user->getId() && $userConnection->getConnect()->getIsActive() == true ){
                $verification = true;
            }
        }

        if($event->getUser()->getId() != $user->getId() && $verification == false){
            throw new \Exception('You do not have access ');
        }

        $error = '';
        if(!$event){
            $error = 'Event not found';
        }

        return $this->render('MainApiBundle:Event:view.html.twig', array(
            'event' => $event,
            'error' => $error,
        ));
    }

} 
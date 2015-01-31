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
        $notifications = $em->getRepository('MainApiBundle:Notification')->findBy(
            array('user' => $user->getId(), 'isNew' => true)
        );




        return $this->render('MainApiBundle:Main:index.html.twig', array(
            'events' => $events,
            'user' => $user,
            'notifications' => $notifications
            ));
    }
} 
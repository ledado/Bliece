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
        $session = new Session();

        if($session->get('authenticate') == null){
            return $this->redirect($this->generateUrl('main_api_login'));
        }


        $userId = $session->get('userId');
        $em = $this->get('doctrine')->getManager();
        $events = $em->getRepository('MainApiBundle:Event')->findByUser($userId);


        $eventsArray = array();
        foreach($events as $event){
            $eventsArray[] = $event;
        }


        return $this->render('MainApiBundle:Main:index.html.twig',
            array('events' => $eventsArray));
    }
} 
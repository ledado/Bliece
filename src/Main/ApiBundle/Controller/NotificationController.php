<?php
/**
 * Created by PhpStorm.
 * User: Lednicky
 * Date: 14.12.2014
 * Time: 18:34
 */

namespace Main\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificationController extends Controller {
    public function ajaxCallAction(Request $request){
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->get('doctrine')->getManager();


        $notificationId = $request->query->get('notificationId');
        $response = $request->query->get('response'); //odpoved o priajati alebo odmietnuti


        $notification = $em->getRepository('MainApiBundle:Notification')->findOneById($notificationId);

        $notification->setIsNew(false);

        $participant = $em->getRepository('MainApiBundle:Participant')->findOneBy(
            array(
                'event' => $notification->getEventUserNotification()->getEvent(),
                'user' => $notification->getEventUserNotification()->getUser(),
                'userUnder' => $notification->getUser()
            )
        );

        if($response == "true"){
            $participant->setIsActive(1);
        }else{
            $participant->setIsActive(0);
        }

        $em->flush();



        $response = array(
            "code" => 100,

        );
        return new Response(json_encode($response));
    }
} 
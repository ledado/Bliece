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
    public function confirmNotificationAction(Request $request){
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->get('doctrine')->getManager();


        $notificationId = $request->query->get('notificationId');
        $response = $request->query->get('response'); //odpoved o priajati alebo odmietnuti


        $notification = $em->getRepository('MainApiBundle:Notification')->findOneById($notificationId);

        $notification->setIsNew(false);

        $eventId = $notification->getEventUserNotification()->getEvent()->getId();
        $userId = $notification->getEventUserNotification()->getUser()->getId();
        $participantId = $notification->getUser()->getId();

        $participant = $em->getRepository('MainApiBundle:Participant')->findParticipant($userId, $eventId, $participantId);

        if($response == "true"){
            $participant->setIsActive(1);
            $title = 'accepted';
            $this->get('notification_service')->createFeedbackNotification($participant->getUser(),20,$eventId,$userId,$title);
        }else{
            $participant->setIsActive(0);
            $title = 'rejected';
            $this->get('notification_service')->createFeedbackNotification($participant->getUser(),20,$eventId,$userId,$title);
        }
        $em->flush();

        $response = array(
            "code" => 100,

        );
        return new Response(json_encode($response));
    }
} 
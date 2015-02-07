<?php
/**
 * Created by PhpStorm.
 * User: Lednicky
 * Date: 14.12.2014
 * Time: 18:34
 */

namespace Main\ApiBundle\Controller;

use Main\ApiBundle\Entity\Connect;
use Main\ApiBundle\Entity\UserConnect;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificationController extends Controller {
    public function confirmParticipantNotificationAction(Request $request){
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
    public function confirmConnectNotificationAction(Request $request){
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->get('doctrine')->getManager();

        $notificationId = $request->query->get('notificationId');
        $response = $request->query->get('response'); //odpoved o priajati alebo odmietnuti

        $notification = $em->getRepository('MainApiBundle:Notification')->findOneById($notificationId);
        $notification->setIsNew(false);

        $userId = $notification->getEventUserNotification()->getUser()->getId();
        $connectUserId = $notification->getUser()->getId();

        $connect = $em->getRepository('MainApiBundle:Connect')->findConnect($userId, $connectUserId);


        if($response == "true"){
            $connect->setIsActive(1);
            $title = 'accepted';
            $this->get('notification_service')->createFeedbackNotification($connect->getUser(),10,2,$userId,$title);

            $connect = new Connect();
            $connect->setUser($user); //user ktoremu bude odoslane potvrdenie
            $connect->setIsActive(false);
            $em->persist($connect);
            $em->flush();

            $userConnect = new UserConnect();
            $userConnect->setUser($connect->getUser()); //uzivatel ktory poziadal o spojenie
            $userConnect->setConnect($connect);
            $em->persist($userConnect);
            $em->flush();

        }else{
            $connect->setIsActive(0);
            $title = 'rejected';
            $this->get('notification_service')->createFeedbackNotification($connect->getUser(),10,2,$userId,$title);
        }
        $em->flush();

        $response = array(
            "code" => 100,

        );
        return new Response(json_encode($response));
    }
} 
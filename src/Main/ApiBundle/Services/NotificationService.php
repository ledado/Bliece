<?php
/**
 * Created by PhpStorm.
 * User: Lednicky
 * Date: 1.2.2015
 * Time: 12:42
 */

namespace Main\ApiBundle\Services;


use Main\ApiBundle\Entity\EventUserNotification;
use Main\ApiBundle\Entity\Notification;

class NotificationService {
    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {

        $this->em = $em;

    }
    function createNotification($toUser,$type,$event_id,$userId){
        $user = $this->em->getRepository('MainApiBundle:User')->findOneById($userId);
        $event = $this->em->getRepository('MainApiBundle:Event')->findOneById($event_id);

        $notification = new Notification();
        $notification->setType($type);
        $notification->setUser($toUser); //pre koho je urcena
        $notification->setTitle('asd');
        $notification->setDate(new \DateTime('now'));
        $notification->setIsNew(true);
        $this->em->persist($notification);
        $this->em->flush();

        $eventUserNotification = new EventUserNotification();
        $eventUserNotification->setEvent($event);
        $eventUserNotification->setUser($user); //od koho je urcena
        $eventUserNotification->setNotification($notification);

        $this->em->persist($eventUserNotification);
        $this->em->flush();

        return null;
    }
} 
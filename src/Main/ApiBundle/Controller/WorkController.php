<?php
/**
 * Created by PhpStorm.
 * User: Lednicky
 * Date: 19.10.2014
 * Time: 15:11
 */

namespace Main\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Main\ApiBundle\Entity\Work;
use Main\ApiBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Session\Session;


class WorkController extends Controller {
    public function getWorkAction($event_id, $participant_id){
        $session = new Session();
        $em = $this->get('doctrine')->getManager();

        $userId = $em->getRepository('MainApiBundle:User')->findOneById($session->get('userId'));
        $eventId = $em->getRepository('MainApiBundle:Event')->findOneById($event_id);
        $participantId = $em->getRepository('MainApiBundle:Participant')->findOneById($participant_id);

        $work = new Work();
        $work->setEvent($eventId);
        $work->setUser($userId);
        $work->setUserTo($participantId->getUserUnder());

        $em->persist($work);
        $em->flush();
        $error = 'Work was created';

        return $this->render('MainApiBundle:Work:get_work.html.twig', array(
            'error' => $error,
            'workId' => $work->getId(),

        ));
    }
    public function createTaskAction($work_id){
        $em = $this->get('doctrine')->getManager();
        $workId = $em->getRepository('MainApiBundle:Work')->findOneById($work_id);


    }

} 
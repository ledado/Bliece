<?php
/**
 * Created by PhpStorm.
 * User: Lednicky
 * Date: 2.11.2014
 * Time: 21:02
 */

namespace Main\ApiBundle\Controller;

use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Main\ApiBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller {
    public function createTaskAction(Request $request){
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->get('doctrine')->getManager();

        $eventId = $request->query->get('eventId');
        $title = $request->query->get('title');
        $description = $request->query->get('description');
        $participantsId = $request->query->get('participantId');

        $event = $em->getRepository('MainApiBundle:Event')->findOneById($eventId);

        $verification = false;
        foreach($event->getUser()->getUserConnections() as $userConnection){
            if($userConnection->getConnect()->getUser()->getId() == $user->getId() && $userConnection->getConnect()->getIsActive() == true ){
                $verification = true;
            }
        }

        if($event->getUser()->getId() != $user->getId() && $verification == false){
            throw new \Exception('You do not have access ');
        }

        $task = new Task();
        $task->setTitle($title);
        $task->setDescription($description);
        $task->setDate(new \DateTime('now'));
        $task->setDonePercentage(0);

        foreach($participantsId as $participantId){
            $task->addUser(
                $em->getRepository('MainApiBundle:User')->findOneById($participantId)
            );

        }
        $em->persist($task);
        $em->flush();



        $response = array(
            "code" => 100,
        );
        return new Response(json_encode($response));

    }
} 
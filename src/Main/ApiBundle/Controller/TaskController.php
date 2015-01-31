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
    public function createTaskAction(Request $request, $event_id){
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->get('doctrine')->getManager();
        $userId = $em->getRepository('MainApiBundle:User')->findOneById($user->getId());

        $event = $em->getRepository('MainApiBundle:Event')->findOneById($event_id);
        if($userId != $event->getUser()){ //osetrenie ak by chcel iny ako zakladatel pridat task k eventu
            throw $this->createAccessDeniedException('You cannot access this page!');
        }


        $participants = $em->getRepository('MainApiBundle:Participant')->findBy(
            array('event' => $event_id, 'user' => $userId)

        );

        $form = $this->createFormBuilder()
            ->add('title', 'text')
            ->add('description', 'textarea')
            ->add('date', 'date')

            ->getForm();


        foreach($participants as $key => $participant){
            $form->add($key,'checkbox', array(
                    'label'     => $participant->getUserUnder(),
                    'required'  => false,
                    'value'     => $participant->getUserUnder()->getId(),
                ));
        }
        $form->add('save', 'submit', array('label' => 'Create'));
        $error = "";

        $form->handleRequest($request);

        if ($form->isValid()) {

            $data = $form->getData();

            $task = new Task();
            $task->setTitle($data['title']);
            $task->setDescription($data['description']);
            $task->setDate(new \DateTime('now'));
            $task->setDonePercentage(0);

            $requestData = $request->get('form');
            $a = 0;
            for($i = 0; $i == $a; $i++) //pridavanie checknutych userov
            if(!empty($requestData[$i])){

                $task->addUser(
                    $em->getRepository('MainApiBundle:User')->findOneById($requestData[$i])

                );
                $a++;
            }else{
                $a--;
            }

            $em->persist($task);
            $em->flush();
            $error = 'Task was created';
        }



        return $this->render('MainApiBundle:Work:create_task.html.twig', array(
            'form' => $form->createView(),
            'error' => $error,
        ));
    }
} 
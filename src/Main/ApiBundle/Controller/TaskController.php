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

            $event = new Task();
            $event->setTitle($data['title']);
            $event->setDescription($data['description']);
            $event->setDate(new \DateTime('now'));
            $event->setDonePercentage(0);

            $requestData = $request->get('form');
            $a = 0;
            for($i = 0; $i == $a; $i++)
            if(!empty($requestData[$i])){

                $event->addUser(
                    $em->getRepository('MainApiBundle:User')->findOneById($requestData[$i])

                );
                $a++;
            }else{
                $a--;
            }

            $em->persist($event);
            $em->flush();
            $error = 'Task was created';
        }



        return $this->render('MainApiBundle:Event:create_event.html.twig', array(
            'form' => $form->createView(),
            'error' => $error,
        ));
    }
} 
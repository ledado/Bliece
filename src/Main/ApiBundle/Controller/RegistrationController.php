<?php
/**
 * Created by PhpStorm.
 * User: Lednicky
 * Date: 15.10.2014
 * Time: 21:06
 */

namespace Main\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Main\ApiBundle\Entity\User;
use Symfony\Component\HttpFoundation\Session\Session;
use Main\ApiBundle\Form\RegistrationForm;

class RegistrationController extends Controller {
    public function registrationAction(Request $request){

        $em = $this->get('doctrine')->getManager();
        $form = $this->createForm(new RegistrationForm(), new User());
        $form->handleRequest($request);


        $error = '';
        if ($form->isValid()) {
            $registration = $form->getData();

            //Handle encoding here...
            $encoderFactory = $this->get('security.encoder_factory');
            $encoder = $encoderFactory->getEncoder($registration);
            $password = $encoder->encodePassword($registration->getPassword(), $registration->getSalt());
            $registration->setPassword($password);


            $em->persist($registration);
            $em->flush();


            return $this->redirect($this->generateUrl('main_api_homepage'));
        }

        return $this->render('MainApiBundle:Registration:index.html.twig', array(
            'form' => $form->createView(),
            'error' => $error,
        ));

    }

}
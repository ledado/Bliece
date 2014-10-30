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

class RegistrationController extends Controller {
    public function indexAction(Request $request){

        $form = $this->createFormBuilder()
            ->add('firsName', 'text')
            ->add('lastName', 'text')
            ->add('email', 'email')
            ->add('password', 'password')
            ->add('save', 'submit', array('label' => 'Create account'))
            ->getForm();





        $em = $this->get('doctrine')->getManager();
        $users = $em->getRepository('MainApiBundle:User')->findAll();

        $usedEmail = array();

        foreach($users as $user){
            $usedEmail[] = $user->getEmail(); //Emaily ktore sa uz vyskytuju v DB
        }
        $error = '';

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();

            $useEmail = false;
            for($i = 0; $i < count($usedEmail); $i++){
                if($data['email'] == $usedEmail[$i]){
                    $useEmail = true;
                    $error = 'Užívateľ s týmto emailom už existuje';
                }
            }



            if($useEmail == true){ //Ked email alebo meno uz existuje uzivatel sa nezaregistruje
                return $this->render('WeciApiBundle:FrontEnd:registration.html.twig', array(
                    'form' => $form->createView(),
                    'error' => $error,
                ));
            }

            //Vytvorenie noveho uzivatela
            $user = new User();
            $user->setFirstName($data['firsName']);
            $user->setLastName($data['lastName']);
            $user->setEmail($data['email']);
            $user->setPassword(sha1($data['password']));
            $user->setDate(new \DateTime("now"));

            $em->persist($user);
            $em->flush();

            //Nastavenie sessionov
            $session = new Session();
            $session->set('authenticate', true);
            $session->set('userName', $data['firsName']);

            return $this->redirect($this->generateUrl('main_api_homepage'));

        }
        return $this->render('MainApiBundle:Registration:index.html.twig', array(
            'form' => $form->createView(),
            'error' => $error,
        ));
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Lednicky
 * Date: 16.10.2014
 * Time: 21:03
 */

namespace Main\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller {

    public function indexAction(Request $request){
        $form = $this->createFormBuilder()
            ->add('name', 'text')
            ->add('password', 'password')
            ->add('save', 'submit', array('label' => 'Login'))
            ->getForm();

        $form->handleRequest($request);

        $em = $this->get('doctrine')->getManager();

        $error = "";

        $session = new Session();

        if ($form->isValid()) {

            $data = $form->getData();
            $user = $em->getRepository('MainApiBundle:User')->findOneByFirstName($data['name']);



            if($user == NULL){

                $error = 'Uzivatel s tymto menom neexistuje';

            }elseif($user->getPassword() == sha1($data['password'])){

                $session->set('authenticate', true);
                $session->set('userId', $user->getId());
                $session->set('userName', $user->getFirstName());

                return $this->redirect($this->generateUrl('main_api_homepage'));

            }else{
                $error = 'Zle zadane meno alebo heslo';
            }


        }



        return $this->render('MainApiBundle:Login:index.html.twig', array(
            'form' => $form->createView(),
            'error' => $error,
        ));

    }
    public function logoutAction(){
        $session = new Session();
        $session->set('authenticate', false);
        $session->set('userId', null);
        $session->set('userName', null);

        return $this->redirect($this->generateUrl('main_api_login'));
    }

} 
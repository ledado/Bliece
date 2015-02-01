<?php
/**
 * Created by PhpStorm.
 * User: Lednicky
 * Date: 1.2.2015
 * Time: 7:55
 */

namespace Main\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller{
    function viewAction($userId){
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->get('doctrine')->getManager();

        $userProfile = $em->getRepository('MainApiBundle:User')->findOneById($userId);

        if(!$userProfile){
            $userProfile = null;
        }
        return $this->render('MainApiBundle:User:view.html.twig', array(
            'user' => $user,
            'userProfile' => $userProfile
        ));
    }
} 
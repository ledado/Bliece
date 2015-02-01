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

        $userConnects = $em->getRepository('MainApiBundle:UserConnect')->findBy(
            array('user' => $user)
        );

//        \Doctrine\Common\Util\Debug::dump($userConnect);
        $isConnect = false;
        foreach($userConnects as $userConnect){
            if($userConnect->getConnect()->getUser()->getId() == $userId){ //v pripade ze zobrazis profil uziv ktoreho mas uz v spojeniach
                $isConnect = true;
            }

        }

        if(!$userProfile){
            $userProfile = null;
        }
        return $this->render('MainApiBundle:User:view.html.twig', array(
            'user' => $user,
            'userProfile' => $userProfile,
            'isConnect' => $isConnect
        ));
    }
} 
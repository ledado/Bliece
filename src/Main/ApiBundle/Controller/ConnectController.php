<?php
/**
 * Created by PhpStorm.
 * User: Lednicky
 * Date: 1.2.2015
 * Time: 8:39
 */

namespace Main\ApiBundle\Controller;

use Main\ApiBundle\Entity\Connect;
use Main\ApiBundle\Entity\UserConnect;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ConnectController extends Controller {
    function connectAction(Request $request){
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->get('doctrine')->getManager();

        $toUserId = $request->query->get('toUserId');
        $toUser = $em->getRepository('MainApiBundle:User')->findOneById($toUserId);

        $connect = new Connect();
        $connect->setUser($toUser); //user ktoremu bude odoslane potvrdenie
        $connect->setIsActive(false);
        $em->persist($connect);
        $em->flush();

        $userConnect = new UserConnect();
        $userConnect->setUser($user); //uzivatel ktory poziadal o spojenie
        $userConnect->setConnect($connect);
        $em->persist($userConnect);
        $em->flush();

        $response = array(
            "code" => 100,

        );
        return new Response(json_encode($response));
    }
} 
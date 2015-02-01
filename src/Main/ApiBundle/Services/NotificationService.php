<?php
/**
 * Created by PhpStorm.
 * User: Lednicky
 * Date: 1.2.2015
 * Time: 12:42
 */

namespace Main\ApiBundle\Services;


class NotificationService {
    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {

        $this->em = $em;

    }
} 
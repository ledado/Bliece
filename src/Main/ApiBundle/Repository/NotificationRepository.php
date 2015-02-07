<?php

namespace Main\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * NotificationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NotificationRepository extends EntityRepository
{
    public function getBackNotification($userId){
        return $this->getEntityManager()
            ->createQuery('SELECT n FROM MainApiBundle:Notification n WHERE n.type > 9 AND n.user = :userId ORDER BY n.date DESC')
            ->setParameter('userId', $userId)
            ->execute();
    }
    public function isNewNotification($userId){
        return $this->getEntityManager()
            ->createQuery('SELECT n FROM MainApiBundle:Notification n WHERE n.isNew = 1 AND n.user = :userId AND n.isFeedback = 0')
            ->setParameter('userId', $userId)
            ->getScalarResult();
    }

}

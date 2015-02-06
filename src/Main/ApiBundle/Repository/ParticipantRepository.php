<?php

namespace Main\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ParticipantRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ParticipantRepository extends EntityRepository
{
    public function findParticipant($userId, $eventId, $participantId){
        return $this->getEntityManager()
            ->createQuery('SELECT p FROM MainApiBundle:Participant p JOIN p.eventUserParticipant e WHERE e.event = :eventId AND e.user = :userId AND p.user = :participantId')
            ->setParameter('userId', $userId)
            ->setParameter('eventId', $eventId)
            ->setParameter('participantId', $participantId)
            ->getOneOrNullResult();
    }

}

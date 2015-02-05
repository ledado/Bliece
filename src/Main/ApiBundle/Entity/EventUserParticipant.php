<?php

namespace Main\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventUserParticipant
 */
class EventUserParticipant
{
    /**
     * @var \Main\ApiBundle\Entity\Participant
     */
    private $participant;

    /**
     * @var \Main\ApiBundle\Entity\Event
     */
    private $event;

    /**
     * @var \Main\ApiBundle\Entity\User
     */
    private $user;


    /**
     * Set participant
     *
     * @param \Main\ApiBundle\Entity\Participant $participant
     * @return EventUserParticipant
     */
    public function setParticipant(\Main\ApiBundle\Entity\Participant $participant)
    {
        $this->participant = $participant;

        return $this;
    }

    /**
     * Get participant
     *
     * @return \Main\ApiBundle\Entity\Participant 
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    /**
     * Set event
     *
     * @param \Main\ApiBundle\Entity\Event $event
     * @return EventUserParticipant
     */
    public function setEvent(\Main\ApiBundle\Entity\Event $event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Main\ApiBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set user
     *
     * @param \Main\ApiBundle\Entity\User $user
     * @return EventUserParticipant
     */
    public function setUser(\Main\ApiBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Main\ApiBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}

<?php

namespace Main\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participant
 */
class Participant
{
    /**
     * @var boolean
     */
    private $isActive;

    /**
     * @var \Main\ApiBundle\Entity\User
     */
    private $user;

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Participant
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set user
     *
     * @param \Main\ApiBundle\Entity\User $user
     * @return Participant
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

    private $id;

    /**
     * @var \Main\ApiBundle\Entity\EventUserParticipant
     */
    private $eventUserParticipant;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set eventUserParticipant
     *
     * @param \Main\ApiBundle\Entity\EventUserParticipant $eventUserParticipant
     * @return Participant
     */
    public function setEventUserParticipant(\Main\ApiBundle\Entity\EventUserParticipant $eventUserParticipant = null)
    {
        $this->eventUserParticipant = $eventUserParticipant;

        return $this;
    }

    /**
     * Get eventUserParticipant
     *
     * @return \Main\ApiBundle\Entity\EventUserParticipant 
     */
    public function getEventUserParticipant()
    {
        return $this->eventUserParticipant;
    }
}

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
     * @var \Main\ApiBundle\Entity\Event
     */
    private $event;

    /**
     * @var \Main\ApiBundle\Entity\User
     */
    private $user;

    /**
     * @var \Main\ApiBundle\Entity\User
     */
    private $userUnder;


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
     * Set event
     *
     * @param \Main\ApiBundle\Entity\Event $event
     * @return Participant
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

    /**
     * Set userUnder
     *
     * @param \Main\ApiBundle\Entity\User $userUnder
     * @return Participant
     */
    public function setUserUnder(\Main\ApiBundle\Entity\User $userUnder)
    {
        $this->userUnder = $userUnder;

        return $this;
    }

    /**
     * Get userUnder
     *
     * @return \Main\ApiBundle\Entity\User 
     */
    public function getUserUnder()
    {
        return $this->userUnder;
    }
}

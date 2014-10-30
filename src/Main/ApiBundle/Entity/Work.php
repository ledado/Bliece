<?php

namespace Main\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Work
 */
class Work
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tasks;

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
    private $userTo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tasks = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Add tasks
     *
     * @param \Main\ApiBundle\Entity\Task $tasks
     * @return Work
     */
    public function addTask(\Main\ApiBundle\Entity\Task $tasks)
    {
        $this->tasks[] = $tasks;

        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \Main\ApiBundle\Entity\Task $tasks
     */
    public function removeTask(\Main\ApiBundle\Entity\Task $tasks)
    {
        $this->tasks->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Set event
     *
     * @param \Main\ApiBundle\Entity\Event $event
     * @return Work
     */
    public function setEvent(\Main\ApiBundle\Entity\Event $event = null)
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
     * @return Work
     */
    public function setUser(\Main\ApiBundle\Entity\User $user = null)
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
     * Set userTo
     *
     * @param \Main\ApiBundle\Entity\User $userTo
     * @return Work
     */
    public function setUserTo(\Main\ApiBundle\Entity\User $userTo = null)
    {
        $this->userTo = $userTo;

        return $this;
    }

    /**
     * Get userTo
     *
     * @return \Main\ApiBundle\Entity\User 
     */
    public function getUserTo()
    {
        return $this->userTo;
    }
}

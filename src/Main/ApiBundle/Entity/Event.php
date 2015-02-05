<?php

namespace Main\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 */
class Event
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var \DateTime
     */
    private $eventDate;

    
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $participans;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $eventUserNotifications;

    /**
     * @var \Main\ApiBundle\Entity\User
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->participans = new \Doctrine\Common\Collections\ArrayCollection();
        $this->eventUserNotifications = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Event
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Event
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set eventDate
     *
     * @param \DateTime $eventDate
     * @return Event
     */
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;

        return $this;
    }

    /**
     * Get eventDate
     *
     * @return \DateTime 
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }
    /**
     * Add eventUserNotifications
     *
     * @param \Main\ApiBundle\Entity\EventUserNotification $eventUserNotifications
     * @return Event
     */
    public function addEventUserNotification(\Main\ApiBundle\Entity\EventUserNotification $eventUserNotifications)
    {
        $this->eventUserNotifications[] = $eventUserNotifications;

        return $this;
    }

    /**
     * Remove eventUserNotifications
     *
     * @param \Main\ApiBundle\Entity\EventUserNotification $eventUserNotifications
     */
    public function removeEventUserNotification(\Main\ApiBundle\Entity\EventUserNotification $eventUserNotifications)
    {
        $this->eventUserNotifications->removeElement($eventUserNotifications);
    }

    /**
     * Get eventUserNotifications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEventUserNotifications()
    {
        return $this->eventUserNotifications;
    }

    /**
     * Set user
     *
     * @param \Main\ApiBundle\Entity\User $user
     * @return Event
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
    public function __toString(){
        return $this->name;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $eventUserParticipans;


    /**
     * Add eventUserParticipans
     *
     * @param \Main\ApiBundle\Entity\EventUserParticipant $eventUserParticipans
     * @return Event
     */
    public function addEventUserParticipan(\Main\ApiBundle\Entity\EventUserParticipant $eventUserParticipans)
    {
        $this->eventUserParticipans[] = $eventUserParticipans;

        return $this;
    }

    /**
     * Remove eventUserParticipans
     *
     * @param \Main\ApiBundle\Entity\EventUserParticipant $eventUserParticipans
     */
    public function removeEventUserParticipan(\Main\ApiBundle\Entity\EventUserParticipant $eventUserParticipans)
    {
        $this->eventUserParticipans->removeElement($eventUserParticipans);
    }

    /**
     * Get eventUserParticipans
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEventUserParticipans()
    {
        return $this->eventUserParticipans;
    }
}

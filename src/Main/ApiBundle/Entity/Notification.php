<?php

namespace Main\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 */
class Notification
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var integer
     */
    private $type;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var boolean
     */
    private $isNew;

    /**
     * @var \Main\ApiBundle\Entity\EventUserNotification
     */
    private $eventUserNotification;

    /**
     * @var \Main\ApiBundle\Entity\User
     */
    private $user;


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
     * Set title
     *
     * @param string $title
     * @return Notification
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Notification
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Notification
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
     * Set isNew
     *
     * @param boolean $isNew
     * @return Notification
     */
    public function setIsNew($isNew)
    {
        $this->isNew = $isNew;

        return $this;
    }

    /**
     * Get isNew
     *
     * @return boolean 
     */
    public function getIsNew()
    {
        return $this->isNew;
    }

    /**
     * Set eventUserNotification
     *
     * @param \Main\ApiBundle\Entity\EventUserNotification $eventUserNotification
     * @return Notification
     */
    public function setEventUserNotification(\Main\ApiBundle\Entity\EventUserNotification $eventUserNotification = null)
    {
        $this->eventUserNotification = $eventUserNotification;

        return $this;
    }

    /**
     * Get eventUserNotification
     *
     * @return \Main\ApiBundle\Entity\EventUserNotification 
     */
    public function getEventUserNotification()
    {
        return $this->eventUserNotification;
    }

    /**
     * Set user
     *
     * @param \Main\ApiBundle\Entity\User $user
     * @return Notification
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
     * @var boolean
     */
    private $isFeedback;


    /**
     * Set isFeedback
     *
     * @param boolean $isFeedback
     * @return Notification
     */
    public function setIsFeedback($isFeedback)
    {
        $this->isFeedback = $isFeedback;

        return $this;
    }

    /**
     * Get isFeedback
     *
     * @return boolean 
     */
    public function getIsFeedback()
    {
        return $this->isFeedback;
    }
}

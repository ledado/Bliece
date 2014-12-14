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
     * @var \Main\ApiBundle\Entity\User
     */
    private $to_user;

    /**
     * @var \Main\ApiBundle\Entity\User
     */
    private $from_user;


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
     * Set to_user
     *
     * @param \Main\ApiBundle\Entity\User $toUser
     * @return Notification
     */
    public function setToUser(\Main\ApiBundle\Entity\User $toUser = null)
    {
        $this->to_user = $toUser;

        return $this;
    }

    /**
     * Get to_user
     *
     * @return \Main\ApiBundle\Entity\User 
     */
    public function getToUser()
    {
        return $this->to_user;
    }

    /**
     * Set from_user
     *
     * @param \Main\ApiBundle\Entity\User $fromUser
     * @return Notification
     */
    public function setFromUser(\Main\ApiBundle\Entity\User $fromUser = null)
    {
        $this->from_user = $fromUser;

        return $this;
    }

    /**
     * Get from_user
     *
     * @return \Main\ApiBundle\Entity\User 
     */
    public function getFromUser()
    {
        return $this->from_user;
    }
    /**
     * @var \Main\ApiBundle\Entity\Event
     */
    private $event;


    /**
     * Set event
     *
     * @param \Main\ApiBundle\Entity\Event $event
     * @return Notification
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
}

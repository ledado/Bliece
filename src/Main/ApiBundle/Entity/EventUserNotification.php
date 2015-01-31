<?php

namespace Main\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventUserNotification
 */
class EventUserNotification
{
    /**
     * @var \Main\ApiBundle\Entity\Notification
     */
    private $notification;

    /**
     * @var \Main\ApiBundle\Entity\Event
     */
    private $event;

    /**
     * @var \Main\ApiBundle\Entity\User
     */
    private $user;


    /**
     * Set notification
     *
     * @param \Main\ApiBundle\Entity\Notification $notification
     * @return EventUserNotification
     */
    public function setNotification(\Main\ApiBundle\Entity\Notification $notification)
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * Get notification
     *
     * @return \Main\ApiBundle\Entity\Notification 
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * Set event
     *
     * @param \Main\ApiBundle\Entity\Event $event
     * @return EventUserNotification
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
     * @return EventUserNotification
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

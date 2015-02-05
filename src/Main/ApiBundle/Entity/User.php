<?php
namespace Main\ApiBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * User
 */
class User implements AdvancedUserInterface, \Serializable
{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $lastName;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $password;
    /**
     * @var \DateTime
     */
    private $date;
    /**
     * @var boolean
     */
    private $isActive;
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $events;
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $participans;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->events = new \Doctrine\Common\Collections\ArrayCollection();
        $this->participans = new \Doctrine\Common\Collections\ArrayCollection();

        $this->date = new \DateTime('now');
        $this->isActive = true;
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }
    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }
    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * Set date
     *
     * @param \DateTime $date
     * @return User
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
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
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
     * Add events
     *
     * @param \Main\ApiBundle\Entity\Event $events
     * @return User
     */
    public function addEvent(\Main\ApiBundle\Entity\Event $events)
    {
        $this->events[] = $events;
        return $this;
    }
    /**
     * Remove events
     *
     * @param \Main\ApiBundle\Entity\Event $events
     */
    public function removeEvent(\Main\ApiBundle\Entity\Event $events)
    {
        $this->events->removeElement($events);
    }
    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvents()
    {
        return $this->events;
    }
    /**
     * Add participans
     *
     * @param \Main\ApiBundle\Entity\Participant $participans
     * @return User
     */
    public function addParticipan(\Main\ApiBundle\Entity\Participant $participans)
    {
        $this->participans[] = $participans;
        return $this;
    }
    /**
     * Remove participans
     *
     * @param \Main\ApiBundle\Entity\Participant $participans
     */
    public function removeParticipan(\Main\ApiBundle\Entity\Participant $participans)
    {
        $this->participans->removeElement($participans);
    }
    /**
     * Get participans
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipans()
    {
        return $this->participans;
    }
    
    public function __toString(){
        return $this->username.' '.$this->lastName;
    }
    /**
     * Security
     */
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    public function getRoles()
    {
        return array('ROLE_USER');
    }
    public function eraseCredentials()
    {
    }
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }
    public function isAccountNonExpired()
    {
        return true;
    }
    public function isAccountNonLocked()
    {
        return true;
    }
    public function isCredentialsNonExpired()
    {
        return true;
    }
    public function isEnabled()
    {
        return $this->isActive;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tasks;


    /**
     * Add tasks
     *
     * @param \Main\ApiBundle\Entity\Task $tasks
     * @return User
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $notifications;


    /**
     * Add notifications
     *
     * @param \Main\ApiBundle\Entity\Notification $notifications
     * @return User
     */
    public function addNotification(\Main\ApiBundle\Entity\Notification $notifications)
    {
        $this->notifications[] = $notifications;

        return $this;
    }

    /**
     * Remove notifications
     *
     * @param \Main\ApiBundle\Entity\Notification $notifications
     */
    public function removeNotification(\Main\ApiBundle\Entity\Notification $notifications)
    {
        $this->notifications->removeElement($notifications);
    }

    /**
     * Get notifications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNotifications()
    {
        return $this->notifications;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $eventUserNotifications;


    /**
     * Add eventUserNotifications
     *
     * @param \Main\ApiBundle\Entity\EventUserNotification $eventUserNotifications
     * @return User
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $connections;


    /**
     * Add connections
     *
     * @param \Main\ApiBundle\Entity\Connect $connections
     * @return User
     */
    public function addConnection(\Main\ApiBundle\Entity\Connect $connections)
    {
        $this->connections[] = $connections;

        return $this;
    }

    /**
     * Remove connections
     *
     * @param \Main\ApiBundle\Entity\Connect $connections
     */
    public function removeConnection(\Main\ApiBundle\Entity\Connect $connections)
    {
        $this->connections->removeElement($connections);
    }

    /**
     * Get connections
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConnections()
    {
        return $this->connections;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $userConnections;


    /**
     * Add userConnections
     *
     * @param \Main\ApiBundle\Entity\UserConnect $userConnections
     * @return User
     */
    public function addUserConnection(\Main\ApiBundle\Entity\UserConnect $userConnections)
    {
        $this->userConnections[] = $userConnections;

        return $this;
    }

    /**
     * Remove userConnections
     *
     * @param \Main\ApiBundle\Entity\UserConnect $userConnections
     */
    public function removeUserConnection(\Main\ApiBundle\Entity\UserConnect $userConnections)
    {
        $this->userConnections->removeElement($userConnections);
    }

    /**
     * Get userConnections
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserConnections()
    {
        return $this->userConnections;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $eventUserParticipans;


    /**
     * Add eventUserParticipans
     *
     * @param \Main\ApiBundle\Entity\EventUserParticipant $eventUserParticipans
     * @return User
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

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $works;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->events = new \Doctrine\Common\Collections\ArrayCollection();
        $this->participans = new \Doctrine\Common\Collections\ArrayCollection();
        $this->works = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Add works
     *
     * @param \Main\ApiBundle\Entity\Work $works
     * @return User
     */
    public function addWork(\Main\ApiBundle\Entity\Work $works)
    {
        $this->works[] = $works;

        return $this;
    }

    /**
     * Remove works
     *
     * @param \Main\ApiBundle\Entity\Work $works
     */
    public function removeWork(\Main\ApiBundle\Entity\Work $works)
    {
        $this->works->removeElement($works);
    }

    /**
     * Get works
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWorks()
    {
        return $this->works;
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



}

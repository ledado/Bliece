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
     * @var \Main\ApiBundle\Entity\User
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->participans = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add participans
     *
     * @param \Main\ApiBundle\Entity\Participant $participans
     * @return Event
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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $works;


    /**
     * Add works
     *
     * @param \Main\ApiBundle\Entity\Work $works
     * @return Event
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
}

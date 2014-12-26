<?php

namespace Main\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 */
class Task
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
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $donePercentage;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var \Main\ApiBundle\Entity\Participant
     */
    private $participant;

    /**
     * @var \Main\ApiBundle\Entity\User
     */
    private $chef;


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
     * @return Task
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
     * Set description
     *
     * @param string $description
     * @return Task
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
     * Set donePercentage
     *
     * @param integer $donePercentage
     * @return Task
     */
    public function setDonePercentage($donePercentage)
    {
        $this->donePercentage = $donePercentage;

        return $this;
    }

    /**
     * Get donePercentage
     *
     * @return integer 
     */
    public function getDonePercentage()
    {
        return $this->donePercentage;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Task
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
     * Set participant
     *
     * @param \Main\ApiBundle\Entity\Participant $participant
     * @return Task
     */
    public function setParticipant(\Main\ApiBundle\Entity\Participant $participant = null)
    {
        $this->participant = $participant;

        return $this;
    }

    /**
     * Get participant
     *
     * @return \Main\ApiBundle\Entity\Participant 
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    /**
     * Set chef
     *
     * @param \Main\ApiBundle\Entity\User $chef
     * @return Task
     */
    public function setChef(\Main\ApiBundle\Entity\User $chef = null)
    {
        $this->chef = $chef;

        return $this;
    }

    /**
     * Get chef
     *
     * @return \Main\ApiBundle\Entity\User 
     */
    public function getChef()
    {
        return $this->chef;
    }
}

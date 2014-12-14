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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add users
     *
     * @param \Main\ApiBundle\Entity\user $users
     * @return Task
     */
    public function addUser(\Main\ApiBundle\Entity\user $users)
    {
        $users->addTask($this);
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Main\ApiBundle\Entity\user $users
     */
    public function removeUser(\Main\ApiBundle\Entity\user $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}

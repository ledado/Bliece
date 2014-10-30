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
     * @var \Main\ApiBundle\Entity\Work
     */
    private $work;


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
     * Set work
     *
     * @param \Main\ApiBundle\Entity\Work $work
     * @return Task
     */
    public function setWork(\Main\ApiBundle\Entity\Work $work = null)
    {
        $this->work = $work;

        return $this;
    }

    /**
     * Get work
     *
     * @return \Main\ApiBundle\Entity\Work 
     */
    public function getWork()
    {
        return $this->work;
    }
}

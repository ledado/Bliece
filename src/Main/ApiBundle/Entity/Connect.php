<?php

namespace Main\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Connect
 */
class Connect
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $isActive;

    /**
     * @var \Main\ApiBundle\Entity\UserConnect
     */
    private $userConnect;

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
     * Set isActive
     *
     * @param boolean $isActive
     * @return Connect
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
     * Set userConnect
     *
     * @param \Main\ApiBundle\Entity\UserConnect $userConnect
     * @return Connect
     */
    public function setUserConnect(\Main\ApiBundle\Entity\UserConnect $userConnect = null)
    {
        $this->userConnect = $userConnect;

        return $this;
    }

    /**
     * Get userConnect
     *
     * @return \Main\ApiBundle\Entity\UserConnect 
     */
    public function getUserConnect()
    {
        return $this->userConnect;
    }

    /**
     * Set user
     *
     * @param \Main\ApiBundle\Entity\User $user
     * @return Connect
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
}

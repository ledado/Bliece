<?php

namespace Main\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserConnect
 */
class UserConnect
{
    /**
     * @var \Main\ApiBundle\Entity\Connect
     */
    private $connect;

    /**
     * @var \Main\ApiBundle\Entity\User
     */
    private $user;


    /**
     * Set connect
     *
     * @param \Main\ApiBundle\Entity\Connect $connect
     * @return UserConnect
     */
    public function setConnect(\Main\ApiBundle\Entity\Connect $connect)
    {
        $this->connect = $connect;

        return $this;
    }

    /**
     * Get connect
     *
     * @return \Main\ApiBundle\Entity\Connect 
     */
    public function getConnect()
    {
        return $this->connect;
    }

    /**
     * Set user
     *
     * @param \Main\ApiBundle\Entity\User $user
     * @return UserConnect
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

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\usersRepository")
 */
class Users
{
    /**
     * @var int 
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="user_nick", type="string", length=100)
     */
    private $userNick;

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=100)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="user_email", type="string", length=50)
     */
    private $userEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="user_password", type="string", length=50)
     */
    private $userPassword;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userNick
     *
     * @param string $userNick
     *
     * @return users
     */
    public function setUserNick($userNick)
    {
        $this->userNick = $userNick;

        return $this;
    }

    /**
     * Get userNick
     *
     * @return string
     */
    public function getUserNick()
    {
        return $this->userNick;
    }

    /**
     * Set userName
     *
     * @param string $userName
     *
     * @return users
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set userEmail
     *
     * @param string $userEmail
     *
     * @return users
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * Set userPassword
     *
     * @param string $userPassword
     *
     * @return users
     */
    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;

        return $this;
    }

    /**
     * Get userPassword
     *
     * @return string
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }
}


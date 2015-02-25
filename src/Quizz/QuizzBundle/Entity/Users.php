<?php

namespace Quizz\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

class Users implements UserInterface , \Serializable{

    private $id;

    private $idclass;

    private $username;

    private $salt;

    private $password;

    private $email;

    private $isActive;

    private $roles;

    private $name;

    private $lastname;



    public function __construct()
    {
        $this->isActive = true;
        //$this->salt = md5(uniqid(null, true));
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
     * @return Users
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
     *
     *  Set idclass
     *
     * @param mixed $idclass
     */
    public function setIdclass($idclass)
    {
        $this->idclass = $idclass;
    }

    /**
     * Get Idclass
     *
     *
     * @return mixed
     */
    public function getIdclass()
    {
        return $this->idclass;
    }


    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Users
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
     * Set email
     *
     * @param string $email
     * @return Users
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
     * Set isActive
     *
     * @param boolean $isActive
     * @return Users
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
     * Set roles
     *
     * @param string $roles
     * @return Users
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return string
     */
    public function getRoles()
    {
        return array($this->roles);
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Users
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
     * Set lastname
     *
     * @param string $lastname
     * @return Users
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }


    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            //$this->salt,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            //$this->salt
            ) = unserialize($serialized);
    }
    /**
     * @var \Quizz\QuizzBundle\Entity\Classroom
     */
    private $fk_idclass;


    /**
     * Set fk_idclass
     *
     * @param \Quizz\QuizzBundle\Entity\Classroom $fkIdclass
     * @return Users
     */
    public function setFkIdclass(Classroom $fkIdclass = null)
    {
        $this->fk_idclass = $fkIdclass;

        return $this;
    }

    /**
     * Get fk_idclass
     *
     * @return \Quizz\QuizzBundle\Entity\Classroom 
     */
    public function getFkIdclass()
    {
        return $this->fk_idclass;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $array_autors;


    /**
     * Add array_autors
     *
     * @param \Quizz\QuizzBundle\Entity\Themes $arrayAutors
     * @return Users
     */
    public function addArrayAutor(\Quizz\QuizzBundle\Entity\Themes $arrayAutors)
    {
        $this->array_autors[] = $arrayAutors;

        return $this;
    }

    /**
     * Remove array_autors
     *
     * @param \Quizz\QuizzBundle\Entity\Themes $arrayAutors
     */
    public function removeArrayAutor(\Quizz\QuizzBundle\Entity\Themes $arrayAutors)
    {
        $this->array_autors->removeElement($arrayAutors);
    }

    /**
     * Get array_autors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArrayAutors()
    {
        return $this->array_autors;
    }
}

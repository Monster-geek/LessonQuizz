<?php

namespace Quizz\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

class Classroom {

    private $id;

    private $name;

    protected $Users;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Classroom
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
     * Add Users
     *
     * @param \Quizz\QuizzBundle\Entity\Users $users
     * @return Classroom
     */
    public function addUser(\Quizz\QuizzBundle\Entity\Users $users)
    {
        $this->Users[] = $users;

        return $this;
    }

    /**
     * Remove Users
     *
     * @param \Quizz\QuizzBundle\Entity\Users $users
     */
    public function removeUser(\Quizz\QuizzBundle\Entity\Users $users)
    {
        $this->Users->removeElement($users);
    }

    /**
     * Get Users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->Users;
    }
}

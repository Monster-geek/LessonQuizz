<?php

namespace Quizz\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

class Classroom {

    private $id;

    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $array_users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->array_users = new ArrayCollection();
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
     * Add array_users
     *
     * @param \Quizz\QuizzBundle\Entity\Users $arrayUsers
     * @return Classroom
     */
    public function addArrayUser(Users $arrayUsers)
    {
        $this->array_users[] = $arrayUsers;

        return $this;
    }

    /**
     * Remove array_users
     *
     * @param \Quizz\QuizzBundle\Entity\Users $arrayUsers
     */
    public function removeArrayUser(Users $arrayUsers)
    {
        $this->array_users->removeElement($arrayUsers);
    }

    /**
     * Get array_users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArrayUsers()
    {
        return $this->array_users;
    }


    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $classrooms;


    /**
     * Add classrooms
     *
     * @param \Quizz\QuizzBundle\Entity\Themes $classrooms
     * @return Classroom
     */
    public function addClassroom(\Quizz\QuizzBundle\Entity\Themes $classrooms)
    {
        $this->classrooms[] = $classrooms;

        return $this;
    }

    /**
     * Remove classrooms
     *
     * @param \Quizz\QuizzBundle\Entity\Themes $classrooms
     */
    public function removeClassroom(\Quizz\QuizzBundle\Entity\Themes $classrooms)
    {
        $this->classrooms->removeElement($classrooms);
    }

    /**
     * Get classrooms
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClassrooms()
    {
        return $this->classrooms;
    }
}

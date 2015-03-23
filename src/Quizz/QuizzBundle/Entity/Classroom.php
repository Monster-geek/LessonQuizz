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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $classrooms_array;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->array_users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->classrooms_array = new \Doctrine\Common\Collections\ArrayCollection();
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
    public function addArrayUser(\Quizz\QuizzBundle\Entity\Users $arrayUsers)
    {
        $this->array_users[] = $arrayUsers;

        return $this;
    }

    /**
     * Remove array_users
     *
     * @param \Quizz\QuizzBundle\Entity\Users $arrayUsers
     */
    public function removeArrayUser(\Quizz\QuizzBundle\Entity\Users $arrayUsers)
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
     * Add classrooms_array
     *
     * @param \Quizz\QuizzBundle\Entity\Themes $classroomsArray
     * @return Classroom
     */
    public function addClassroomsArray(\Quizz\QuizzBundle\Entity\Themes $classroomsArray)
    {
        $this->classrooms_array[] = $classroomsArray;

        return $this;
    }

    /**
     * Remove classrooms_array
     *
     * @param \Quizz\QuizzBundle\Entity\Themes $classroomsArray
     */
    public function removeClassroomsArray(\Quizz\QuizzBundle\Entity\Themes $classroomsArray)
    {
        $this->classrooms_array->removeElement($classroomsArray);
    }

    /**
     * Get classrooms_array
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClassroomsArray()
    {
        return $this->classrooms_array;
    }
}

<?php

namespace Quizz\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Themes {

    private $id;

    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $classHasQuizz;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->classHasQuizz = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Themes
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
     * Add classHasQuizz
     *
     * @param \Quizz\QuizzBundle\Entity\classHasQuizz $classHasQuizz
     * @return Themes
     */
    public function addClassHasQuizz(\Quizz\QuizzBundle\Entity\classHasQuizz $classHasQuizz)
    {
        $this->classHasQuizz[] = $classHasQuizz;

        return $this;
    }

    /**
     * Remove classHasQuizz
     *
     * @param \Quizz\QuizzBundle\Entity\classHasQuizz $classHasQuizz
     */
    public function removeClassHasQuizz(\Quizz\QuizzBundle\Entity\classHasQuizz $classHasQuizz)
    {
        $this->classHasQuizz->removeElement($classHasQuizz);
    }

    /**
     * Get classHasQuizz
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClassHasQuizz()
    {
        return $this->classHasQuizz;
    }
}

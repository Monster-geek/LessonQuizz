<?php

namespace Quizz\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

class Themes {

    private $id;

    private $name;

    private $desc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $classHasQuizz;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->classHasQuizz = new ArrayCollection();
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
    public function addClassHasQuizz(classHasQuizz $classHasQuizz)
    {
        $this->classHasQuizz[] = $classHasQuizz;

        return $this;
    }

    /**
     * Remove classHasQuizz
     *
     * @param \Quizz\QuizzBundle\Entity\classHasQuizz $classHasQuizz
     */
    public function removeClassHasQuizz(classHasQuizz $classHasQuizz)
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

    /**
     * Set desc
     *
     * @param string $desc
     * @return Themes
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get desc
     *
     * @return string 
     */
    public function getDesc()
    {
        return $this->desc;
    }
}

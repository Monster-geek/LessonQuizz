<?php

namespace Quizz\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

class Themes {

    private $id;

    private $name;

    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $array_quizz;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $groups;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->array_quizz = new ArrayCollection();
        $this->groups = new ArrayCollection();
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
     * Set description
     *
     * @param string $description
     * @return Themes
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
     * Add array_quizz
     *
     * @param \Quizz\QuizzBundle\Entity\Quizz $arrayQuizz
     * @return Themes
     */
    public function addArrayQuizz(Quizz $arrayQuizz)
    {
        $this->array_quizz[] = $arrayQuizz;

        return $this;
    }

    /**
     * Remove array_quizz
     *
     * @param \Quizz\QuizzBundle\Entity\Quizz $arrayQuizz
     */
    public function removeArrayQuizz(Quizz $arrayQuizz)
    {
        $this->array_quizz->removeElement($arrayQuizz);
    }

    /**
     * Get array_quizz
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArrayQuizz()
    {
        return $this->array_quizz;
    }

    /**
     * Add groups
     *
     * @param \Quizz\QuizzBundle\Entity\Classroom $groups
     * @return Themes
     */
    public function addGroup(Classroom $groups)
    {
        $this->groups[] = $groups;

        return $this;
    }

    /**
     * Remove groups
     *
     * @param \Quizz\QuizzBundle\Entity\Classroom $groups
     */
    public function removeGroup(Classroom $groups)
    {
        $this->groups->removeElement($groups);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroups()
    {
        return $this->groups;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $array_theme;


    /**
     * Add array_theme
     *
     * @param \Quizz\QuizzBundle\Entity\Levels $arrayTheme
     * @return Themes
     */
    public function addArrayTheme(\Quizz\QuizzBundle\Entity\Levels $arrayTheme)
    {
        $this->array_theme[] = $arrayTheme;

        return $this;
    }

    /**
     * Remove array_theme
     *
     * @param \Quizz\QuizzBundle\Entity\Levels $arrayTheme
     */
    public function removeArrayTheme(\Quizz\QuizzBundle\Entity\Levels $arrayTheme)
    {
        $this->array_theme->removeElement($arrayTheme);
    }

    /**
     * Get array_theme
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArrayTheme()
    {
        return $this->array_theme;
    }
    /**
     * @var \Quizz\QuizzBundle\Entity\Users
     */
    private $fk_autorid;


    /**
     * Set fk_autorid
     *
     * @param \Quizz\QuizzBundle\Entity\Users $fkAutorid
     * @return Themes
     */
    public function setFkAutorid(\Quizz\QuizzBundle\Entity\Users $fkAutorid = null)
    {
        $this->fk_autorid = $fkAutorid;

        return $this;
    }

    /**
     * Get fk_autorid
     *
     * @return \Quizz\QuizzBundle\Entity\Users 
     */
    public function getFkAutorid()
    {
        return $this->fk_autorid;
    }
}

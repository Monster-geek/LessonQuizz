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
    private $array_theme;

    /**
     * @var \Quizz\QuizzBundle\Entity\Users
     */
    private $fk_autorid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $themes_array;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->array_theme = new ArrayCollection();
        $this->themes_array = new ArrayCollection();
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
    public function removeArrayTheme(Levels $arrayTheme)
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
     * Set fk_autorid
     *
     * @param \Quizz\QuizzBundle\Entity\Users $fkAutorid
     * @return Themes
     */
    public function setFkAutorid(Users $fkAutorid = null)
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

    /**
     * Add themes_array
     *
     * @param \Quizz\QuizzBundle\Entity\Classroom $themesArray
     * @return Themes
     */
    public function addThemesArray(Classroom $themesArray)
    {
        $this->themes_array[] = $themesArray;

        return $this;
    }

    /**
     * Remove themes_array
     *
     * @param \Quizz\QuizzBundle\Entity\Classroom $themesArray
     */
    public function removeThemesArray(Classroom $themesArray)
    {
        $this->themes_array->removeElement($themesArray);
    }

    /**
     * Get themes_array
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getThemesArray()
    {
        return $this->themes_array;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $array_levels;


    /**
     * Add array_levels
     *
     * @param \Quizz\QuizzBundle\Entity\Levels $arrayLevels
     * @return Themes
     */
    public function addArrayLevel(Levels $arrayLevels)
    {
        $this->array_levels[] = $arrayLevels;

        return $this;
    }

    /**
     * Remove array_levels
     *
     * @param \Quizz\QuizzBundle\Entity\Levels $arrayLevels
     */
    public function removeArrayLevel(Levels $arrayLevels)
    {
        $this->array_levels->removeElement($arrayLevels);
    }

    /**
     * Get array_levels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArrayLevels()
    {
        return $this->array_levels;
    }
}

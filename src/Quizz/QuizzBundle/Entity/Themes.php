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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $array_theme;


    /**
     * Add array_theme
     *
     * @param \Quizz\QuizzBundle\Entity\classHasQuizz $arrayTheme
     * @return Themes
     */
    public function addArrayTheme(\Quizz\QuizzBundle\Entity\classHasQuizz $arrayTheme)
    {
        $this->array_theme[] = $arrayTheme;

        return $this;
    }

    /**
     * Remove array_theme
     *
     * @param \Quizz\QuizzBundle\Entity\classHasQuizz $arrayTheme
     */
    public function removeArrayTheme(\Quizz\QuizzBundle\Entity\classHasQuizz $arrayTheme)
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Quizz;


    /**
     * Add Quizz
     *
     * @param \Quizz\QuizzBundle\Entity\Quizz $quizz
     * @return Themes
     */
    public function addQuizz(\Quizz\QuizzBundle\Entity\Quizz $quizz)
    {
        $this->Quizz[] = $quizz;

        return $this;
    }

    /**
     * Remove Quizz
     *
     * @param \Quizz\QuizzBundle\Entity\Quizz $quizz
     */
    public function removeQuizz(\Quizz\QuizzBundle\Entity\Quizz $quizz)
    {
        $this->Quizz->removeElement($quizz);
    }

    /**
     * Get Quizz
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuizz()
    {
        return $this->Quizz;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $array_quizz;


    /**
     * Add array_quizz
     *
     * @param \Quizz\QuizzBundle\Entity\Quizz $arrayQuizz
     * @return Themes
     */
    public function addArrayQuizz(\Quizz\QuizzBundle\Entity\Quizz $arrayQuizz)
    {
        $this->array_quizz[] = $arrayQuizz;

        return $this;
    }

    /**
     * Remove array_quizz
     *
     * @param \Quizz\QuizzBundle\Entity\Quizz $arrayQuizz
     */
    public function removeArrayQuizz(\Quizz\QuizzBundle\Entity\Quizz $arrayQuizz)
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
}

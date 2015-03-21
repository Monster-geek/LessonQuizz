<?php

namespace Quizz\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Levels {

    private $id;

    private $name;

    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $array_quizz;

    /**
     * @var \Quizz\QuizzBundle\Entity\Themes
     */
    private $fk_idtheme;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->array_quizz = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Levels
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
     * @return Levels
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
     * @return Levels
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

    /**
     * Set fk_idtheme
     *
     * @param \Quizz\QuizzBundle\Entity\Themes $fkIdtheme
     * @return Levels
     */
    public function setFkIdtheme(\Quizz\QuizzBundle\Entity\Themes $fkIdtheme = null)
    {
        $this->fk_idtheme = $fkIdtheme;

        return $this;
    }

    /**
     * Get fk_idtheme
     *
     * @return \Quizz\QuizzBundle\Entity\Themes 
     */
    public function getFkIdtheme()
    {
        return $this->fk_idtheme;
    }
}

<?php

namespace Quizz\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Quizz {

    private $id;

    private $title;

    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Questions;

    /**
     * @var \Quizz\QuizzBundle\Entity\Levels
     */
    private $fk_idlevel;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Questions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Quizz
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Quizz
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
     * Set level
     *
     * @param integer $level
     * @return Quizz
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Add Questions
     *
     * @param \Quizz\QuizzBundle\Entity\Questions $questions
     * @return Quizz
     */
    public function addQuestion(\Quizz\QuizzBundle\Entity\Questions $questions)
    {
        $this->Questions[] = $questions;

        return $this;
    }

    /**
     * Remove Questions
     *
     * @param \Quizz\QuizzBundle\Entity\Questions $questions
     */
    public function removeQuestion(\Quizz\QuizzBundle\Entity\Questions $questions)
    {
        $this->Questions->removeElement($questions);
    }

    /**
     * Get Questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->Questions;
    }

    /**
     * Set fk_idlevel
     *
     * @param \Quizz\QuizzBundle\Entity\Levels $fkIdlevel
     * @return Quizz
     */
    public function setFkIdlevel(\Quizz\QuizzBundle\Entity\Levels $fkIdlevel = null)
    {
        $this->fk_idlevel = $fkIdlevel;

        return $this;
    }

    /**
     * Get fk_idlevel
     *
     * @return \Quizz\QuizzBundle\Entity\Levels 
     */
    public function getFkIdlevel()
    {
        return $this->fk_idlevel;
    }
    /**
     * @var integer
     */
    private $level;


    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $fk_questions;


    /**
     * Add fk_questions
     *
     * @param \Quizz\QuizzBundle\Entity\Questions $fkQuestions
     * @return Quizz
     */
    public function addFkQuestion(\Quizz\QuizzBundle\Entity\Questions $fkQuestions)
    {
        $this->fk_questions[] = $fkQuestions;

        return $this;
    }

    /**
     * Remove fk_questions
     *
     * @param \Quizz\QuizzBundle\Entity\Questions $fkQuestions
     */
    public function removeFkQuestion(\Quizz\QuizzBundle\Entity\Questions $fkQuestions)
    {
        $this->fk_questions->removeElement($fkQuestions);
    }

    /**
     * Get fk_questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFkQuestions()
    {
        return $this->fk_questions;
    }
}

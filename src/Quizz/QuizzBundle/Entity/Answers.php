<?php

namespace Quizz\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Answers {

    private $id;

    private $style;

    private $value;

    /**
     * @var \Quizz\QuizzBundle\Entity\Questions
     */
    private $idquestion;


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
     * Set value
     *
     * @param string $value
     * @return Answers
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set style
     *
     * @param string $style
     * @return Answers
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return string 
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Set idquestion
     *
     * @param \Quizz\QuizzBundle\Entity\Questions $idquestion
     * @return Answers
     */
    public function setIdquestion(\Quizz\QuizzBundle\Entity\Questions $idquestion = null)
    {
        $this->idquestion = $idquestion;

        return $this;
    }

    /**
     * Get idquestion
     *
     * @return \Quizz\QuizzBundle\Entity\Questions 
     */
    public function getIdquestion()
    {
        return $this->idquestion;
    }
}

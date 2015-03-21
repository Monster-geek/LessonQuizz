<?php

namespace Quizz\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Questions {

    private $id;

    private $enunciated;

    private $style;


    /**
     * @var \Quizz\QuizzBundle\Entity\Answers
     */
    private $idanswer;

    /**
     * @var \Quizz\QuizzBundle\Entity\Quizz
     */
    private $Quizz;


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
     * Set enunciated
     *
     * @param string $enunciated
     * @return Questions
     */
    public function setEnunciated($enunciated)
    {
        $this->enunciated = $enunciated;

        return $this;
    }

    /**
     * Get enunciated
     *
     * @return string 
     */
    public function getEnunciated()
    {
        return $this->enunciated;
    }

    /**
     * Set style
     *
     * @param string $style
     * @return Questions
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
     * Set idanswer
     *
     * @param \Quizz\QuizzBundle\Entity\Answers $idanswer
     * @return Questions
     */
    public function setIdanswer(\Quizz\QuizzBundle\Entity\Answers $idanswer = null)
    {
        $this->idanswer = $idanswer;

        return $this;
    }

    /**
     * Get idanswer
     *
     * @return \Quizz\QuizzBundle\Entity\Answers 
     */
    public function getIdanswer()
    {
        return $this->idanswer;
    }

    /**
     * Set Quizz
     *
     * @param \Quizz\QuizzBundle\Entity\Quizz $quizz
     * @return Questions
     */
    public function setQuizz(\Quizz\QuizzBundle\Entity\Quizz $quizz = null)
    {
        $this->Quizz = $quizz;

        return $this;
    }

    /**
     * Get Quizz
     *
     * @return \Quizz\QuizzBundle\Entity\Quizz 
     */
    public function getQuizz()
    {
        return $this->Quizz;
    }
}

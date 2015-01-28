<?php

namespace Quizz\QuizzBundle\Entity;


class QuizzQuestion {

    protected $id_question_quizz;

    protected $key_quizz;

    protected $type_question;

    protected $fk_id_answer;

    protected $fk_id_quizz;


    /**
     * Get id_question_quizz
     *
     * @return integer 
     */
    public function getIdQuestionQuizz()
    {
        return $this->id_question_quizz;
    }

    /**
     * Set key_quizz
     *
     * @param string $keyQuizz
     * @return QuizzQuestion
     */
    public function setKeyQuizz($keyQuizz)
    {
        $this->key_quizz = $keyQuizz;

        return $this;
    }

    /**
     * Get key_quizz
     *
     * @return string 
     */
    public function getKeyQuizz()
    {
        return $this->key_quizz;
    }

    /**
     * Set type_question
     *
     * @param string $typeQuestion
     * @return QuizzQuestion
     */
    public function setTypeQuestion($typeQuestion)
    {
        $this->type_question = $typeQuestion;

        return $this;
    }

    /**
     * Get type_question
     *
     * @return string 
     */
    public function getTypeQuestion()
    {
        return $this->type_question;
    }

    /**
     * Set fk_id_answer
     *
     * @param integer $fkIdAnswer
     * @return QuizzQuestion
     */
    public function setFkIdAnswer($fkIdAnswer)
    {
        $this->fk_id_answer = $fkIdAnswer;

        return $this;
    }

    /**
     * Get fk_id_answer
     *
     * @return integer 
     */
    public function getFkIdAnswer()
    {
        return $this->fk_id_answer;
    }

    /**
     * Set fk_id_quizz
     *
     * @param integer $fkIdQuizz
     * @return QuizzQuestion
     */
    public function setFkIdQuizz($fkIdQuizz)
    {
        $this->fk_id_quizz = $fkIdQuizz;

        return $this;
    }

    /**
     * Get fk_id_quizz
     *
     * @return integer 
     */
    public function getFkIdQuizz()
    {
        return $this->fk_id_quizz;
    }
}

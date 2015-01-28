<?php

namespace Quizz\QuizzBundle\Entity;


class QuizzAnswer {

    protected $id_answer;

    protected $fk_id_quizz_question;

    protected $fk_id_quizz;

    protected $type_answer;

    protected $answer_value;

    /**
     * @var integer
     */
    private $level_quizz;


    /**
     * Get id_answer
     *
     * @return integer 
     */
    public function getIdAnswer()
    {
        return $this->id_answer;
    }

    /**
     * Set fk_id_quizz_question
     *
     * @param integer $fkIdQuizzQuestion
     * @return QuizzAnswer
     */
    public function setFkIdQuizzQuestion($fkIdQuizzQuestion)
    {
        $this->fk_id_quizz_question = $fkIdQuizzQuestion;

        return $this;
    }

    /**
     * Get fk_id_quizz_question
     *
     * @return integer 
     */
    public function getFkIdQuizzQuestion()
    {
        return $this->fk_id_quizz_question;
    }

    /**
     * Set fk_id_quizz
     *
     * @param integer $fkIdQuizz
     * @return QuizzAnswer
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

    /**
     * Set type_answer
     *
     * @param string $typeAnswer
     * @return QuizzAnswer
     */
    public function setTypeAnswer($typeAnswer)
    {
        $this->type_answer = $typeAnswer;

        return $this;
    }

    /**
     * Get type_answer
     *
     * @return string 
     */
    public function getTypeAnswer()
    {
        return $this->type_answer;
    }

    /**
     * Set level_quizz
     *
     * @param integer $levelQuizz
     * @return QuizzAnswer
     */
    public function setLevelQuizz($levelQuizz)
    {
        $this->level_quizz = $levelQuizz;

        return $this;
    }

    /**
     * Get level_quizz
     *
     * @return integer 
     */
    public function getLevelQuizz()
    {
        return $this->level_quizz;
    }

    /**
     * Set answer_value
     *
     * @param string $answerValue
     * @return QuizzAnswer
     */
    public function setAnswerValue($answerValue)
    {
        $this->answer_value = $answerValue;

        return $this;
    }

    /**
     * Get answer_value
     *
     * @return string 
     */
    public function getAnswerValue()
    {
        return $this->answer_value;
    }
}

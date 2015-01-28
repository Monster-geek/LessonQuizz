<?php

namespace Quizz\QuizzBundle\Entity;


class Achievements {

    protected $fk_id_quizz;

    protected $fk_id_student;


    /**
     * Set fk_id_quizz
     *
     * @param integer $fkIdQuizz
     * @return Achievements
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
     * Set fk_id_student
     *
     * @param integer $fkIdStudent
     * @return Achievements
     */
    public function setFkIdStudent($fkIdStudent)
    {
        $this->fk_id_student = $fkIdStudent;

        return $this;
    }

    /**
     * Get fk_id_student
     *
     * @return integer 
     */
    public function getFkIdStudent()
    {
        return $this->fk_id_student;
    }
}

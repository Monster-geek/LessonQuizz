<?php

namespace Quizz\QuizzBundle\Entity;


class ClassroomHasQuizz {

    protected $fk_id_classroom;

    protected $fk_id_quizz;


    /**
     * Set fk_id_classroom
     *
     * @param integer $fkIdClassroom
     * @return ClassroomHasQuizz
     */
    public function setFkIdClassroom($fkIdClassroom)
    {
        $this->fk_id_classroom = $fkIdClassroom;

        return $this;
    }

    /**
     * Get fk_id_classroom
     *
     * @return integer 
     */
    public function getFkIdClassroom()
    {
        return $this->fk_id_classroom;
    }

    /**
     * Set fk_id_quizz
     *
     * @param integer $fkIdQuizz
     * @return ClassroomHasQuizz
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

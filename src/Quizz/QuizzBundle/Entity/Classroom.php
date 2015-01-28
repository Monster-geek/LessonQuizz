<?php

namespace Quizz\QuizzBundle\Entity;


class Classroom {

    protected $id_classroom;

    protected $name_classroom;

    protected $key_classroom;

    protected $fk_id_teacher;


    /**
     * Get id_classroom
     *
     * @return integer 
     */
    public function getIdClassroom()
    {
        return $this->id_classroom;
    }

    /**
     * Set name_classroom
     *
     * @param string $nameClassroom
     * @return Classroom
     */
    public function setNameClassroom($nameClassroom)
    {
        $this->name_classroom = $nameClassroom;

        return $this;
    }

    /**
     * Get name_classroom
     *
     * @return string 
     */
    public function getNameClassroom()
    {
        return $this->name_classroom;
    }

    /**
     * Set key_classroom
     *
     * @param string $keyClassroom
     * @return Classroom
     */
    public function setKeyClassroom($keyClassroom)
    {
        $this->key_classroom = $keyClassroom;

        return $this;
    }

    /**
     * Get key_classroom
     *
     * @return string 
     */
    public function getKeyClassroom()
    {
        return $this->key_classroom;
    }

    /**
     * Set fk_id_teacher
     *
     * @param integer $fkIdTeacher
     * @return Classroom
     */
    public function setFkIdTeacher($fkIdTeacher)
    {
        $this->fk_id_teacher = $fkIdTeacher;

        return $this;
    }

    /**
     * Get fk_id_teacher
     *
     * @return integer 
     */
    public function getFkIdTeacher()
    {
        return $this->fk_id_teacher;
    }
}

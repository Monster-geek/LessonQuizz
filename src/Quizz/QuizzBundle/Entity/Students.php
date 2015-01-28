<?php

namespace Quizz\QuizzBundle\Entity;


class Students {

    protected $id_student;

    protected $login_student;

    protected $name_students;

    protected $surname_students;

    protected $mail_student;

    protected $pwd_student;

    protected $key_student;

    protected $fk_id_classroom;

    /**
     * @var string
     */
    private $name_student;

    /**
     * @var string
     */
    private $surname_student;


    /**
     * Get id_student
     *
     * @return integer 
     */
    public function getIdStudent()
    {
        return $this->id_student;
    }

    /**
     * Set login_student
     *
     * @param string $loginStudent
     * @return Students
     */
    public function setLoginStudent($loginStudent)
    {
        $this->login_student = $loginStudent;

        return $this;
    }

    /**
     * Get login_student
     *
     * @return string 
     */
    public function getLoginStudent()
    {
        return $this->login_student;
    }

    /**
     * Set name_student
     *
     * @param string $nameStudent
     * @return Students
     */
    public function setNameStudent($nameStudent)
    {
        $this->name_student = $nameStudent;

        return $this;
    }

    /**
     * Get name_student
     *
     * @return string 
     */
    public function getNameStudent()
    {
        return $this->name_student;
    }

    /**
     * Set surname_student
     *
     * @param string $surnameStudent
     * @return Students
     */
    public function setSurnameStudent($surnameStudent)
    {
        $this->surname_student = $surnameStudent;

        return $this;
    }

    /**
     * Get surname_student
     *
     * @return string 
     */
    public function getSurnameStudent()
    {
        return $this->surname_student;
    }

    /**
     * Set mail_student
     *
     * @param string $mailStudent
     * @return Students
     */
    public function setMailStudent($mailStudent)
    {
        $this->mail_student = $mailStudent;

        return $this;
    }

    /**
     * Get mail_student
     *
     * @return string 
     */
    public function getMailStudent()
    {
        return $this->mail_student;
    }

    /**
     * Set pwd_student
     *
     * @param string $pwdStudent
     * @return Students
     */
    public function setPwdStudent($pwdStudent)
    {
        $this->pwd_student = $pwdStudent;

        return $this;
    }

    /**
     * Get pwd_student
     *
     * @return string 
     */
    public function getPwdStudent()
    {
        return $this->pwd_student;
    }

    /**
     * Set key_student
     *
     * @param string $keyStudent
     * @return Students
     */
    public function setKeyStudent($keyStudent)
    {
        $this->key_student = $keyStudent;

        return $this;
    }

    /**
     * Get key_student
     *
     * @return string 
     */
    public function getKeyStudent()
    {
        return $this->key_student;
    }

    /**
     * Set fk_id_classroom
     *
     * @param integer $fkIdClassroom
     * @return Students
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
}

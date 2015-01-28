<?php

namespace Quizz\QuizzBundle\Entity;


class Teachers {

    protected $id_teacher;

    protected $login_teacher;

    protected $name_teacher;

    protected $surname_teacher;

    protected $mail_teacher;

    protected $pwd_teacher;

    protected $key_teacher;


    /**
     * Get id_teacher
     *
     * @return integer 
     */
    public function getIdTeacher()
    {
        return $this->id_teacher;
    }

    /**
     * Set login_teacher
     *
     * @param string $loginTeacher
     * @return Teachers
     */
    public function setLoginTeacher($loginTeacher)
    {
        $this->login_teacher = $loginTeacher;

        return $this;
    }

    /**
     * Get login_teacher
     *
     * @return string 
     */
    public function getLoginTeacher()
    {
        return $this->login_teacher;
    }

    /**
     * Set name_teacher
     *
     * @param string $nameTeacher
     * @return Teachers
     */
    public function setNameTeacher($nameTeacher)
    {
        $this->name_teacher = $nameTeacher;

        return $this;
    }

    /**
     * Get name_teacher
     *
     * @return string 
     */
    public function getNameTeacher()
    {
        return $this->name_teacher;
    }

    /**
     * Set surname_teacher
     *
     * @param string $surnameTeacher
     * @return Teachers
     */
    public function setSurnameTeacher($surnameTeacher)
    {
        $this->surname_teacher = $surnameTeacher;

        return $this;
    }

    /**
     * Get surname_teacher
     *
     * @return string 
     */
    public function getSurnameTeacher()
    {
        return $this->surname_teacher;
    }

    /**
     * Set mail_teacher
     *
     * @param string $mailTeacher
     * @return Teachers
     */
    public function setMailTeacher($mailTeacher)
    {
        $this->mail_teacher = $mailTeacher;

        return $this;
    }

    /**
     * Get mail_teacher
     *
     * @return string 
     */
    public function getMailTeacher()
    {
        return $this->mail_teacher;
    }

    /**
     * Set pwd_teacher
     *
     * @param string $pwdTeacher
     * @return Teachers
     */
    public function setPwdTeacher($pwdTeacher)
    {
        $this->pwd_teacher = $pwdTeacher;

        return $this;
    }

    /**
     * Get pwd_teacher
     *
     * @return string 
     */
    public function getPwdTeacher()
    {
        return $this->pwd_teacher;
    }

    /**
     * Set key_teacher
     *
     * @param string $keyTeacher
     * @return Teachers
     */
    public function setKeyTeacher($keyTeacher)
    {
        $this->key_teacher = $keyTeacher;

        return $this;
    }

    /**
     * Get key_teacher
     *
     * @return string 
     */
    public function getKeyTeacher()
    {
        return $this->key_teacher;
    }
}

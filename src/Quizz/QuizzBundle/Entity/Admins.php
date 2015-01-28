<?php

namespace Quizz\QuizzBundle\Entity;


class Admins {

    protected $id_admin;

    protected $login_admin;

    protected $name_admin;

    protected $surname_admin;

    protected $mail_admin;

    protected $pwd_admin;

    protected $key_admin;


    /**
     * Get id_admin
     *
     * @return integer 
     */
    public function getIdAdmin()
    {
        return $this->id_admin;
    }

    /**
     * Set login_admin
     *
     * @param string $loginAdmin
     * @return Admins
     */
    public function setLoginAdmin($loginAdmin)
    {
        $this->login_admin = $loginAdmin;

        return $this;
    }

    /**
     * Get login_admin
     *
     * @return string 
     */
    public function getLoginAdmin()
    {
        return $this->login_admin;
    }

    /**
     * Set name_admin
     *
     * @param string $nameAdmin
     * @return Admins
     */
    public function setNameAdmin($nameAdmin)
    {
        $this->name_admin = $nameAdmin;

        return $this;
    }

    /**
     * Get name_admin
     *
     * @return string 
     */
    public function getNameAdmin()
    {
        return $this->name_admin;
    }

    /**
     * Set surname_admin
     *
     * @param string $surnameAdmin
     * @return Admins
     */
    public function setSurnameAdmin($surnameAdmin)
    {
        $this->surname_admin = $surnameAdmin;

        return $this;
    }

    /**
     * Get surname_admin
     *
     * @return string 
     */
    public function getSurnameAdmin()
    {
        return $this->surname_admin;
    }

    /**
     * Set mail_admin
     *
     * @param string $mailAdmin
     * @return Admins
     */
    public function setMailAdmin($mailAdmin)
    {
        $this->mail_admin = $mailAdmin;

        return $this;
    }

    /**
     * Get mail_admin
     *
     * @return string 
     */
    public function getMailAdmin()
    {
        return $this->mail_admin;
    }

    /**
     * Set pwd_admin
     *
     * @param string $pwdAdmin
     * @return Admins
     */
    public function setPwdAdmin($pwdAdmin)
    {
        $this->pwd_admin = $pwdAdmin;

        return $this;
    }

    /**
     * Get pwd_admin
     *
     * @return string 
     */
    public function getPwdAdmin()
    {
        return $this->pwd_admin;
    }

    /**
     * Set key_admin
     *
     * @param string $keyAdmin
     * @return Admins
     */
    public function setKeyAdmin($keyAdmin)
    {
        $this->key_admin = $keyAdmin;

        return $this;
    }

    /**
     * Get key_admin
     *
     * @return string 
     */
    public function getKeyAdmin()
    {
        return $this->key_admin;
    }
}

<?php

namespace Quizz\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class classHasQuizz {

    private $idclass;

    private $idtheme;


    /**
     * Set idtheme
     *
     * @param integer $idtheme
     * @return classHasQuizz
     */
    public function setIdtheme($idtheme)
    {
        $this->idtheme = $idtheme;

        return $this;
    }

    /**
     * Get idtheme
     *
     * @return integer
     */
    public function getIdtheme()
    {
        return $this->idtheme;
    }

    /**
     * Set idclass
     *
     * @param integer $idclass
     * @return classHasQuizz
     */
    public function setIdclass($idclass)
    {
        $this->idclass = $idclass;

        return $this;
    }

    /**
     * Get idclass
     *
     * @return integer
     */
    public function getIdclass()
    {
        return $this->idclass;
    }
    /**
     * @var \Quizz\QuizzBundle\Entity\Classroom
     */
    private $fk_idclass;


    /**
     * Set fk_idclass
     *
     * @param \Quizz\QuizzBundle\Entity\Classroom $fkIdclass
     * @return classHasQuizz
     */
    public function setFkIdclass(Classroom $fkIdclass = null)
    {
        $this->fk_idclass = $fkIdclass;

        return $this;
    }

    /**
     * Get fk_idclass
     *
     * @return \Quizz\QuizzBundle\Entity\Classroom 
     */
    public function getFkIdclass()
    {
        return $this->fk_idclass;
    }
    /**
     * @var \Quizz\QuizzBundle\Entity\Themes
     */
    private $fk_idtheme;


    /**
     * Set fk_idtheme
     *
     * @param \Quizz\QuizzBundle\Entity\Themes $fkIdtheme
     * @return classHasQuizz
     */
    public function setFkIdtheme(\Quizz\QuizzBundle\Entity\Themes $fkIdtheme = null)
    {
        $this->fk_idtheme = $fkIdtheme;

        return $this;
    }

    /**
     * Get fk_idtheme
     *
     * @return \Quizz\QuizzBundle\Entity\Themes 
     */
    public function getFkIdtheme()
    {
        return $this->fk_idtheme;
    }
}

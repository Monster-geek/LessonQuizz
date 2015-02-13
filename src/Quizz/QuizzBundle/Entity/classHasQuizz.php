<?php

namespace Quizz\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class classHasQuizz {

    private $idclass;

    private $idtheme;

    /**
     * @var \Quizz\QuizzBundle\Entity\Classroom
     */
    private $idclassroom;


    /**
     * Set idclassroom
     *
     * @param \Quizz\QuizzBundle\Entity\Classroom $idclassroom
     * @return classHasQuizz
     */
    public function setIdclassroom(\Quizz\QuizzBundle\Entity\Classroom $idclassroom = null)
    {
        $this->idclassroom = $idclassroom;

        return $this;
    }

    /**
     * Get idclassroom
     *
     * @return \Quizz\QuizzBundle\Entity\Classroom 
     */
    public function getIdclassroom()
    {
        return $this->idclassroom;
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
}

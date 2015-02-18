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
}

<?php

namespace Quizz\QuizzBundle\Entity;


class Quizz {

    protected $id_quizz;

    protected $title_quizz;

    protected $description_quizz;

    protected $level_quizz;

    protected $key_quizz;


    /**
     * Get id_quizz
     *
     * @return integer 
     */
    public function getIdQuizz()
    {
        return $this->id_quizz;
    }

    /**
     * Set title_quizz
     *
     * @param string $titleQuizz
     * @return Quizz
     */
    public function setTitleQuizz($titleQuizz)
    {
        $this->title_quizz = $titleQuizz;

        return $this;
    }

    /**
     * Get title_quizz
     *
     * @return string 
     */
    public function getTitleQuizz()
    {
        return $this->title_quizz;
    }

    /**
     * Set description_quizz
     *
     * @param string $descriptionQuizz
     * @return Quizz
     */
    public function setDescriptionQuizz($descriptionQuizz)
    {
        $this->description_quizz = $descriptionQuizz;

        return $this;
    }

    /**
     * Get description_quizz
     *
     * @return string 
     */
    public function getDescriptionQuizz()
    {
        return $this->description_quizz;
    }

    /**
     * Set level_quizz
     *
     * @param integer $levelQuizz
     * @return Quizz
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
     * Set key_quizz
     *
     * @param string $keyQuizz
     * @return Quizz
     */
    public function setKeyQuizz($keyQuizz)
    {
        $this->key_quizz = $keyQuizz;

        return $this;
    }

    /**
     * Get key_quizz
     *
     * @return string 
     */
    public function getKeyQuizz()
    {
        return $this->key_quizz;
    }
}

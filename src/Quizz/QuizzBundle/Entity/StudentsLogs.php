<?php

namespace Quizz\QuizzBundle\Entity;


class StudentsLogs {

    protected $id_log;

    protected $time_log;

    protected $successed_quizz;

    protected $failed_quizz;

    protected $fk_id_eleve;


    /**
     * Get id_log
     *
     * @return integer 
     */
    public function getIdLog()
    {
        return $this->id_log;
    }

    /**
     * Set time_log
     *
     * @param \DateTime $timeLog
     * @return StudentsLogs
     */
    public function setTimeLog($timeLog)
    {
        $this->time_log = $timeLog;

        return $this;
    }

    /**
     * Get time_log
     *
     * @return \DateTime 
     */
    public function getTimeLog()
    {
        return $this->time_log;
    }

    /**
     * Set successed_quizz
     *
     * @param boolean $successedQuizz
     * @return StudentsLogs
     */
    public function setSuccessedQuizz($successedQuizz)
    {
        $this->successed_quizz = $successedQuizz;

        return $this;
    }

    /**
     * Get successed_quizz
     *
     * @return boolean 
     */
    public function getSuccessedQuizz()
    {
        return $this->successed_quizz;
    }

    /**
     * Set failed_quizz
     *
     * @param boolean $failedQuizz
     * @return StudentsLogs
     */
    public function setFailedQuizz($failedQuizz)
    {
        $this->failed_quizz = $failedQuizz;

        return $this;
    }

    /**
     * Get failed_quizz
     *
     * @return boolean 
     */
    public function getFailedQuizz()
    {
        return $this->failed_quizz;
    }

    /**
     * Set fk_id_eleve
     *
     * @param integer $fkIdEleve
     * @return StudentsLogs
     */
    public function setFkIdEleve($fkIdEleve)
    {
        $this->fk_id_eleve = $fkIdEleve;

        return $this;
    }

    /**
     * Get fk_id_eleve
     *
     * @return integer 
     */
    public function getFkIdEleve()
    {
        return $this->fk_id_eleve;
    }
}

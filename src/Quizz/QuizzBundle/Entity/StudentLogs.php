<?php

namespace Quizz\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class StudentLogs {

    private $id_logs;

    private $id_student;

    private $type_log;

    private $heure_log;

    private $id_quizz;

    private $id_theme;

    private $id_level;


    /**
     * Get id_logs
     *
     * @return integer 
     */
    public function getIdLogs()
    {
        return $this->id_logs;
    }

    /**
     * Set type_log
     *
     * @param string $typeLog
     * @return StudentLogs
     */
    public function setTypeLog($typeLog)
    {
        $this->type_log = $typeLog;

        return $this;
    }

    /**
     * Get type_log
     *
     * @return string 
     */
    public function getTypeLog()
    {
        return $this->type_log;
    }
}

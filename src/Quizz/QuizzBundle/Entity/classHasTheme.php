<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 22/02/15
 * Time: 18:33
 */

namespace Quizz\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class classHasTheme {

    private $class_id;

    private $theme_id;


    /**
     * Set class_id
     *
     * @param integer $classId
     * @return classHasTheme
     */
    public function setClassId($classId)
    {
        $this->class_id = $classId;

        return $this;
    }

    /**
     * Get class_id
     *
     * @return integer 
     */
    public function getClassId()
    {
        return $this->class_id;
    }

    /**
     * Set theme_id
     *
     * @param integer $themeId
     * @return classHasTheme
     */
    public function setThemeId($themeId)
    {
        $this->theme_id = $themeId;

        return $this;
    }

    /**
     * Get theme_id
     *
     * @return integer 
     */
    public function getThemeId()
    {
        return $this->theme_id;
    }
}

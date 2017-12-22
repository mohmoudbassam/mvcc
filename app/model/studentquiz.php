<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 12/8/2017
 * Time: 12:29 AM
 */

namespace PHPMVC\Model;


class StudentQuiz extends abstactModel
{
    public $id;
    public $quiz_id;
    public $issolve;
    public $student_id;
    public $grade;


    public static $tbale_name='student_quiz';

    public static $table_schema=array(
        'student_id'=>self::DATA_TYPE_INT,
        'quiz_id'=>self::DATA_TYPE_INT,
        'issolve'=>self::DATA_TYPE_INT,
        'grade'=>self::DATA_TYPE_INT
    );

    public static $primaryKey='id';

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getQuizId()
    {
        return $this->quiz_id;
    }

    /**
     * @param mixed $quiz_id
     */
    public function setQuizId($quiz_id)
    {
        $this->quiz_id = $quiz_id;
    }

    /**
     * @return mixed
     */
    public function getIssolve()
    {
        return $this->issolve;
    }

    /**
     * @param mixed $issolve
     */
    public function setIssolve($issolve)
    {
        $this->issolve = $issolve;
    }

    /**
     * @return mixed
     */
    public function getStudnetId()
    {
        return $this->student_id;
    }

    /**
     * @param mixed $studnet_id
     */
    public function setStudnetId($studnet_id)
    {
        $this->student_id = $studnet_id;
    }

    /**
     * @return mixed
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param mixed $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

}
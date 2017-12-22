<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 12/7/2017
 * Time: 2:17 PM
 */

namespace PHPMVC\Model;

use PHPMVC\LIB\database\connection;
class QuizModel extends abstactModel
{
    public $id;
    public $course_id;
    public $avilablity;
    public $number_of_qustion;
    public $name;
    public static $primaryKey='id';
    public static $tbale_name='quiz';

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public static $table_schema=array(
        'course_id'       =>self::DATA_TYPE_INT,
        'avilablity' =>self::DATA_TYPE_INT,
        'number_of_qustion'=>self::DATA_TYPE_INT,
        'name'=>self::DATA_TYPE_STR
    );

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
    public function getCourseId()
    {
        return $this->course_id;
    }

    /**
     * @param mixed $course_id
     */
    public function setCourseId($course_id)
    {
        $this->course_id = $course_id;
    }

    /**
     * @return mixed
     */
    public function getAvilablity()
    {
        return $this->avilablity;
    }

    /**
     * @param mixed $avilablity
     */
    public function setAvilablity($avilablity)
    {
        $this->avilablity = $avilablity;
    }

    /**
     * @return mixed
     */
    public function getNumberOfQustion()
    {
        return $this->number_of_qustion;
    }

    /**
     * @param mixed $number_of_qustion
     */
    public function setNumberOfQustion($number_of_qustion)
    {
        $this->number_of_qustion = $number_of_qustion;
    }
    public static function getAllQuiz($course_id){
        $connect =$Connection = connection::getInstance()->getConnection();
        $query="select * from quiz where course_id= $course_id";
        $connect =$Connection = connection::getInstance()->getConnection();
        $stmt = $Connection->prepare($query);
        $stmt->execute();
        $array=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }
    public static function getAllQuizFromUser($course_id){
        $course_id=(int)$course_id;
        $stdid=$_SESSION['id'];
        $connect =$Connection = connection::getInstance()->getConnection();
        $query=" select * from quiz  where quiz.course_id=$course_id and quiz.id
                 NOT in(select quiz_id from student_quiz where issolve=1 and student_id =$stdid);";
        $connect =$Connection = connection::getInstance()->getConnection();
        $stmt = $Connection->prepare($query);
        $stmt->execute();
        $array=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }




}
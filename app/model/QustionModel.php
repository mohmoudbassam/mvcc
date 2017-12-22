<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 12/7/2017
 * Time: 3:36 PM
 */

namespace PHPMVC\Model;
use PHPMVC\LIB\database\connection;

class QustionModel extends abstactModel
{
    public $id;
    public $quiz_id;
    public $qus;
    public $ans;
    public static $primaryKey='id';
    public static $tbale_name='qustion';

    public static $table_schema=array(
        'quiz_id'       =>self::DATA_TYPE_INT,
        'ans' =>self::DATA_TYPE_INT,
        'qus'=>self::DATA_TYPE_STR
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
    public function getQus()
    {
        return $this->qus;
    }

    /**
     * @param mixed $qus
     */
    public function setQus($qus)
    {
        $this->qus = $qus;
    }

    /**
     * @return mixed
     */
    public function getAns()
    {
        return $this->ans;
    }

    /**
     * @param mixed $ans
     */
    public function setAns($ans)
    {
        $this->ans = $ans;
    }
    public static function getAllqustionToQuiz($quiz){
        $course_id=(int)$quiz;
        $connect =$Connection = connection::getInstance()->getConnection();
        $query="select * from qustion where quiz_id = $course_id ";
        $connect =$Connection = connection::getInstance()->getConnection();
        $stmt = $Connection->prepare($query);
        $stmt->execute();
        $array=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }

}
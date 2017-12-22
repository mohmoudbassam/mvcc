<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 12/7/2017
 * Time: 1:06 AM
 */

namespace PHPMVC\Model;
use PHPMVC\LIB\database\connection;

class AssigmentModel extends abstactModel
{
    public $id;
    public $file_name;
    public $description;
    public $course_id;

    /**
     * @return mixed
     */
    public function getAvilabilty()
    {
        return $this->avilabilty;
    }

    /**
     * @param mixed $avilabilty
     */
    public function setAvilabilty($avilabilty)
    {
        $this->avilabilty = $avilabilty;
    }
    public $avilabilty;

    public static $tbale_name='assigment';

    public static $table_schema=array(
        'file_name'       =>self::DATA_TYPE_STR,
        'description' =>self::DATA_TYPE_STR,
        'course_id'=>self::DATA_TYPE_INT,
        'avilabilty'=>self::DATA_TYPE_INT
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
    public function getFileName()
    {
        return $this->file_name;
    }

    /**
     * @param mixed $file_name
     */
    public function setFileName($file_name)
    {
        $this->file_name = $file_name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public static function getAllAssigment($course_id){
        $connect =$Connection = connection::getInstance()->getConnection();
        $query="select * from assigment where course_id= $course_id";
        $connect =$Connection = connection::getInstance()->getConnection();
        $stmt = $Connection->prepare($query);
        $stmt->execute();
        $array=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $array;

    }

}
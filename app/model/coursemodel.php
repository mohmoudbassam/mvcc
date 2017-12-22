<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 12/6/2017
 * Time: 12:28 PM
 */

namespace PHPMVC\Model;
use PHPMVC\LIB\database\connection;


class CourseModel extends abstactModel
{
    public $id;
    public $course_name;
    public $hours;
    public $teacher_id;
    public $collage_id;

    public static $tbale_name='course';

    public static $table_schema=array(
        'course_name'=>self::DATA_TYPE_STR,
         'hours' =>self::DATA_TYPE_INT,
        'teacher_id'=>self::DATA_TYPE_INT,
        'collage_id'=>self::DATA_TYPE_INT
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
    public function getCourseName()
    {
        return $this->course_name;
    }

    /**
     * @param mixed $course_name
     */
    public function setCourseName($course_name)
    {
        $this->course_name = $course_name;
    }


    /**
     * @return mixed
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * @param mixed $hours
     */
    public function setHours($hours)
    {
        $this->hours = $hours;
    }

    /**
     * @return mixed
     */
    public function getTeacherId()
    {
        return $this->teacher_id;
    }

    /**
     * @param mixed $teacher_id
     */
    public function setTeacherId($teacher_id)
    {
        $this->teacher_id = $teacher_id;
    }

    /**
     * @return mixed
     */
    public function getCollageId()
    {
        return $this->collage_id;
    }

    /**
     * @param mixed $collage_id
     */
    public function setCollageId($collage_id)
    {
        $this->collage_id = $collage_id;
    }
    public static function getCourse($teacher_id){

        $connect =$Connection = connection::getInstance()->getConnection();
        $query="select * from course where teacher_id= $teacher_id";
        $connect =$Connection = connection::getInstance()->getConnection();
        $stmt = $Connection->prepare($query);
        $stmt->execute();
        $array=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $array;

    }


}
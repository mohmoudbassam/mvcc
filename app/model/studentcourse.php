<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 12/6/2017
 * Time: 5:54 PM
 */

namespace PHPMVC\Model;

use  PHPMVC\LIB\database\connection;
class StudentCourse extends abstactModel
{
    public $id;
    public $Student_id;
    public $course_id;

    public static $tbale_name='student_course';

    public static $table_schema=array(
        'Student_id'       =>self::DATA_TYPE_INT,
        'course_id' =>self::DATA_TYPE_INT
    );

    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->Student_id;
    }

    /**
     * @param mixed $Student_id
     */
    public function setStudentId($Student_id)
    {
        $this->Student_id = $Student_id;
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
    public static $primaryKey='id';

    public static function getAllCourse(){
        $connect =$Connection = connection::getInstance()->getConnection();
        $id=$_SESSION['id'];
        $query="select * from student_course JOIN course 
                 on course.id =student_course.course_id where student_id =$id";
        $stmt=$connect->prepare($query);
        $stmt->execute();
        $ar=$stmt->FetchAll(\PDO::FETCH_ASSOC);
        return $ar;

    }
}
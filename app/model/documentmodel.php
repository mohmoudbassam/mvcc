<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 12/7/2017
 * Time: 12:51 PM
 */

namespace PHPMVC\Model;
use PHPMVC\LIB\database\connection;

class DocumentModel extends abstactModel
{
    public $id;
    public $course_id;
    public $file_name;

    public static $tbale_name='document';

    public static $table_schema=array(
        'course_id'       =>self::DATA_TYPE_INT,
        'file_name' =>self::DATA_TYPE_STR
    );

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
    public static function getdocument($id){

        $connect =$Connection = connection::getInstance()->getConnection();
        $query="select * from document where course_id= $id";
        $connect =$Connection = connection::getInstance()->getConnection();
        $stmt = $Connection->prepare($query);
        $stmt->execute();
        $array=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 12/4/2017
 * Time: 9:51 PM
 */

namespace PHPMVC\Model;
use PHPMVC\LIB\database\connection;


class CollageModel extends abstactModel
{
    public $id;
    public $name;
    public $descreption;

    public static $tbale_name='collage';

    public static $table_schema=array(
        'name'       =>self::DATA_TYPE_STR,
        'descreption' =>self::DATA_TYPE_STR
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

    /**
     * @return mixed
     */
    public function getDescreption()
    {
        return $this->descreption;
    }

    /**
     * @param mixed $descreption
     */
    public function setDescreption($descreption)
    {
        $this->descreption = $descreption;
    }
    public static function getTeacherInCollage($collage_id){
        $connect =$Connection = connection::getInstance()->getConnection();
        $query="select DISTINCT users.id,users.name from  users 
              JOIN collage on  $collage_id =users.collage_id where role=2 ";
        $connect =$Connection = connection::getInstance()->getConnection();
        $stmt=$connect->prepare($query);
        $stmt->execute();
        $ar=$stmt->FetchAll(\PDO::FETCH_ASSOC);
        return $ar;



    }


}
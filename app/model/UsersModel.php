<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 12/2/2017
 * Time: 1:13 PM
 */

namespace PHPMVC\Model;
use PHPMVC\LIB\database\connection;


class UsersModel extends abstactModel
{
     public $id;
    public $name;
     public $role;
     public $email;
     public $password;
     public $address;
     public $last_name;
    public $collage_id;

      public static $tbale_name='users';

       public static $table_schema=array(
        'name'       =>self::DATA_TYPE_STR,
        'role'        =>self::DATA_TYPE_INT,
        'email'     =>self::DATA_TYPE_STR,
        'password'    =>self::DATA_TYPE_STR,
        'last_name'   =>self::DATA_TYPE_STR,
           'address' =>self::DATA_TYPE_STR,
           'collage_id'=>self::DATA_TYPE_INT
    );

    public static $primaryKey='id';

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
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function inCollage($CollageID,$studentID){
        $ojectConnection=connection::getInstance();
        $connect=$ojectConnection->getConnection();
        $CollageID=(int)$CollageID;
        $studentID=(int)$studentID;
        $query="select * from users where id = $studentID and collage_id =$CollageID and role=3";
        $stmt=$connect->prepare($query);
        $stmt->execute();
        $ar=$stmt->fetchAll(\PDO::FETCH_ASSOC);
       return empty($ar)? false :true;
    }


}
<?php
 namespace PHPMVC\Model;
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 8/12/2017
 * Time: 3:28 PM
 */
require 'abstactModel.php';
require APP_PATH.DS."LIB".DS."database".DS.'connection.php';
class EmployeeModel extends abstactModel
{


public $id;
public $name;
public $age;
public $address;
public $tax;
public $salary;
public static $tbale_name='emp';
public static $table_schema=array(
   'name'       =>self::DATA_TYPE_STR,
   'age'        =>self::DATA_TYPE_INT,
   'salary'     =>self::DATA_TYPE_DEC,
   'address'    =>self::DATA_TYPE_STR

);
public static $primaryKey='id';

public function setName($name){
    $this->name=$name;
}
public function __get($name)
{
    return $this->$name;
}
public  static function autoload($c){
    echo $c;
}

    public function alSalary(){
    return $this->salary- $this->salary *$this->tax;
}

}

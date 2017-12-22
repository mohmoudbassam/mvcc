<?php
namespace PHPMVC\Model;
use PHPMVC\LIB\database\connection;

class abstactModel
{
    

    const  DATA_TYPE_BOOl = \PDO::PARAM_BOOL;
    const  DATA_TYPE_STR = \PDO::PARAM_STR;
    const  DATA_TYPE_DEC = 4;
    const  DATA_TYPE_INT = \PDO::PARAM_INT;

    public  $ojectConnection ;
    public $connect;
public function getConnection(){
    $this->ojectConnection=connection::getInstance();
    $this->connect=$this->ojectConnection->getConnection();
}
    private function prepareVales(\PDOStatement $stmt)
    {

        foreach (static::$table_schema as $coulmn => $type) {

            if ($type == 4) {
                $sanitizeValue = filter_var($this->$coulmn, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(":{$coulmn}", $sanitizeValue);
            } else {
                $stmt->bindValue(":{$coulmn}", $this->$coulmn, $type);

            }


        }
    }

    private static function bultParm()
    {
        $nameParm = '';

        foreach (static::$table_schema as $coulmn => $type) {
            $nameParm .= $coulmn . ' = :' . $coulmn . ' , ';

        }

        return trim($nameParm, ', ');
    }

    public function save()
    {
        $primarykey = static::$primaryKey;
        $c=$this->$primarykey === null ? $this->create() : $this->update();

        return $c;
    }

    private function create()
    {

        $ojectConnection=connection::getInstance();
        $connect=$ojectConnection->getConnection();

        $sql = 'INSERT INTO ' . static::$tbale_name . ' SET ' . self::bultParm();
        $stmt = $connect->prepare($sql);
        self::prepareVales($stmt);

        if($stmt->execute()){
          if(static::$tbale_name == 'quiz'){
              return $connect->lastInsertId();
          }else{
                return true;
            }

        }
        var_dump($stmt->errorInfo());
        return false;

    }


    private function update()
    {
        $ojectConnection=connection::getInstance();
        $connect=$ojectConnection->getConnection();
        $primarykey = static::$primaryKey;
        $sql = 'update ' . static::$tbale_name . ' SET  ' . self::bultParm() . ' WHERE  ' . $primarykey . ' = ' . $this->$primarykey;
        $stmt = $connect->prepare($sql);
        self::prepareVales($stmt);
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function delete()
    {
        global $connect;
        $primarykey = static::$primaryKey;


        $sql = 'DELETE FROM ' . static::$tbale_name . ' WHERE  ' . $primarykey . ' = ' . $this->$primarykey;

        $stmt = $connect->prepare($sql);

        $stmt->execute();

    }

    public static function getAll()
    {
        $ojectConnection=connection::getInstance();
        $connect=$ojectConnection->getConnection();
        $sql = 'SELECT * FROM ' . static::$tbale_name;
        $stmt = $connect->prepare($sql);
        if(method_exists(get_called_class(),'__construct')){
             $A=$stmt->execute() === true ? $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$table_schema)): false;
            return new \ArrayIterator($A);
        }else{
            $manyRow=$stmt->execute();
            $A=$stmt->fetchAll(\PDO::FETCH_CLASS,get_called_class());
            return new \ArrayIterator($A);
        }

    }

    public static function gatByPk($Pk)
    {
        $ojectConnection=connection::getInstance();
        $connect=$ojectConnection->getConnection();

        $sql = 'SELECT * FROM ' . static::$tbale_name . ' WHERE ' . static::$primaryKey . ' = ' . $Pk;

        $stmt = $connect->prepare($sql);

        if(method_exists(get_called_class(),'__construct')){
            $A=$stmt->execute() === true ? $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$table_schema)): false;
           if($A){
               return  array_shift($A);
           }else{
               return false;
           }
        }else{
            $manyRow=$stmt->execute();
            $A=$stmt->fetchAll(\PDO::FETCH_CLASS , get_called_class());
            if($A){
                return  array_shift($A);
            }else{
                return false;
            }
        }


    }

    public static function find($array)
    {
        $email = "email";
        $password = "password";
        $query = "select * from users where email = " . "'$array[$email]'" . " and password = " . "'$array[$password]'";
        $Connection = connection::getInstance()->getConnection();
        $stmt = $Connection->prepare($query);

        if (method_exists(get_called_class(), '__construct')) {
            $A = $stmt->execute() === true ? $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, FactoryModel::getClass(get_called_class()), array_keys(static::$table_schema)) : false;
            if ($A) {
                return array_shift($A);
            } else {

                return false;
            }

        }else{
            $manyRow=$stmt->execute();

            $A=$stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
            if($A){
                return  array_shift($A);
            }else{
                return false;
            }
        }
    }
}

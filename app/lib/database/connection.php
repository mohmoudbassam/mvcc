<?php
namespace PHPMVC\LIB\database;
class connection{
  private static  $connc;
  private function __construct()
  {

  }

  public static function getInstance(){
     if(self::$connc == null){
         self::$connc= new connection();
     }
     return self::$connc;
}

public function getConnection(){
    try{
        $PDO=new \PDO('mysql://hostname=localhost;dbname=project','root','');
        return $PDO;

    }catch (\PDOException $e){
        echo 'error in connection';
    }


  return 0;
}
}
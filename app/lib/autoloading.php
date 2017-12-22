<?php
namespace PHPMVC\LIB;
class autoloading{
    public static function autoload($className){

        $className=str_replace('PHPMVC','',$className);
        $className=strtolower($className);
        $className .='.php' ;
        if(!file_exists(APP_PATH.DS.$className)){

        }else{
           require_once APP_PATH.DS.$className;
        }
    }
}
spl_autoload_register(__NAMESPACE__."\autoloading::autoload");
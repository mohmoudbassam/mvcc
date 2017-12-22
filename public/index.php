<?php
namespace PHPMVC;
use PHPMVC\LIB\frontconroller;
if(!defined('DS')){
    define('DS',DIRECTORY_SEPARATOR);
}
require_once '..' . DS . 'app'  . DS . 'conf.php';
require_once  APP_PATH.DS.'lib'.DS.'autoloading.php';
require_once APP_PATH.DS."lib".DS."database".DS."connection.php";
$frontController=new FrontConroller();
$frontController->dispatch();
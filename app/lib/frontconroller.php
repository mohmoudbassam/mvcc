<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 9/6/2017
 * Time: 4:56 PM
 */

namespace PHPMVC\LIB;


class FrontConroller
{
    const Not_Found_Controller="PHPMVC\Controller\\" . "NotFoundController";
    const Not_Fonnd_Action="NotFound"."Action";

    private $_controller = 'index';
    private $_action = 'defult';
    private $_parm = array();

    public function __construct()
    {
        $this->_pasreUrl();
    }

    public function _pasreUrl()
    {

        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


        $url = explode('/', trim($url, '/'), 3);


        if (isset($url[0]) && $url[0] != '') {
            $this->_controller = $url[0];

        }
        if (isset($url[1]) && $url[1] != '') {
            $this->_action = $url[1];
        }
        if (isset($url[2]) && $url[2] != '') {
            $parm = explode('/', $url[2]);
            $this->_parm = $parm;
        }
    }

    public function dispatch()
    {


        $controllerName = "PHPMVC\Controller\\" . ucfirst($this->_controller) . "Controller";
        $actionName = $this->_action . "Action";

        if (!(class_exists($controllerName))) {

            $this->_controller=$controllerName=self::Not_Found_Controller;
        }


        $controller=new $controllerName;


        if (!(method_exists($controller, $actionName))) {
            $this->_action=$actionName=self::Not_Fonnd_Action;
        }

        $controller->_controller=$this->_controller;
        $controller->_action=$this->_action;
        $controller->_parm=$this->_parm;
        $controller->$actionName();

    }


}
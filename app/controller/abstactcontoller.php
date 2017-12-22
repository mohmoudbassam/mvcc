<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 9/7/2017
 * Time: 12:34 PM
 */

namespace PHPMVC\Controller;


use PHPMVC\LIB\FrontConroller;

class AbstactContoller
{

    public $_controller ;
    public $_action;
    public $_parm;
    public $data=[];
    public function NotFoundAction(){
       $this->_view();
    }

    public function _view(){


       if($this->_action===FrontConroller::Not_Fonnd_Action){
           require_once VIEW_PATH.DS."notfound".DS."notfound.view.php";
       }else{

           $view=VIEW_PATH.DS.$this->_controller.DS.$this->_action.".view.php";

           if(!file_exists($view)){
               require_once VIEW_PATH.DS."notfound".DS."noview.view.php";
           }else{
               extract($this->data);
               require TEMPLATE_PATH."header.php";
               require_once $view;
               require TEMPLATE_PATH."footer.php";
           }
       }
    }

}
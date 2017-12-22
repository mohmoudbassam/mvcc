<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 9/10/2017
 * Time: 4:08 PM
 */
namespace PHPMVC\LIB;
trait Helper
{

    public function redirect($path){
         header('location:'.$path);
    }

    public static function dangerMsg($msg){
        return "<div class=\"alert alert-danger\">".
            "<strong>".$msg."</strong>
</div>";
    }
    public static function successMsg($msg){
        return "<div class=\"alert alert-success center-block\">".
  "<strong>".$msg."</strong>
</div>";
    }

    public function CheckRole($role){
          global $_SESSION;
        $classCalled=str_replace("PHPMVC\\Controller\\",'',get_called_class());
        $array=[
            1=>"AdminController",
            2=>"TeacherController",
            3=>"StudentController"

        ];
        if(!array_key_exists($role,$array)){
            $this->redirect("/index/defult");
        }else{
             if($role == $_SESSION['role'] && $classCalled == $array[$role]){
                 return true;
             }
        }
        return false;
    }
}
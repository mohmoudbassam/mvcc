<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 11/30/2017
 * Time: 6:16 PM
 */

namespace PHPMVC\Controller;
use PHPMVC\Model\UsersModel;
session_start();
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\Input_Filter;
class AuthController
{
    use Input_Filter;
    use helper;

public function loginAction(){

    $model=new UsersModel();
    if(isset($_POST)&&isset($_POST["login"]) && $_POST["password"]){

        $result=$model->find(array(
            'email'=>$_POST['email'],
            'password'=>$_POST['password']
        ));

        if($result === false  ){
            $_SESSION['msg']=$this->dangerMsg("your email and password not correct");
            $this->redirect("/index/defult");

        }else{
            $_SESSION['id']=$result->id;
            $_SESSION['name']=$result->name;
            $_SESSION['role']=$result->role;
            $_SESSION['collage_id']=$result->collage_id;

            if($result->role ==1){

                $this->redirect("/admin/defult");
            }elseif($result->role == 2){
                $this->redirect("/teacher/defult");
            }elseif($result->role== 3){
                $this->redirect("/student/defult");
            }
        }

    }else{
        $_SESSION['msg']="pleas enter the password and email";
        $this->redirect("/index/defult");
    }

}
}
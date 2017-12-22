<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 12/2/2017
 * Time: 10:54 PM
 */

namespace PHPMVC\Controller;
use PHPMVC\LIB\helper;
use PHPMVC\Model\FacadeModel;

session_start();
class StudentController extends  AbstactContoller
{
use helper;
    public function defultAction(){
        $check= $this->CheckRole(3);
        if($check == false){

            $_SESSION=[];
            $this->redirect("/index/defult");
        }
        $this->_view();
    }
    public function mycourseAction(){
       $ar =FacadeModel::getAllCourse();
       $this->data['courses']=$ar;
        $this->_view();
    }
    public function quizAction(){
        $check= $this->CheckRole(3);
        if($check == false){

            $_SESSION=[];
            $this->redirect("/index/defult");
        }
   $array=FacadeModel::getAllQuizFromUser($this->_parm[0]);
        $this->data['quiz']=$array;
        $this->_view();
    }
    public function solvequizAction(){
        $ar=FacadeModel::getAllqustionToQuiz($this->_parm[0]);
        $this->data['qustion']=$ar;

if(isset($_POST['save'])){
    $i=0;
    foreach ($ar as $b){
        if($_POST[$b['id']] == $b['ans']){
            $i++;
        }
    }

    $doc=FacadeModel::getClass("PHPMVC\Model\StudentQuiz");
    $doc->setGrade($i);
    $doc->setQuizId($this->_parm[0]);
    $doc->setIssolve(1);
    $doc->setStudnetId((int)$_SESSION['id']);
    $doc->save();
    $this->redirect('/student/mycourse');
}
        $this->_view();
    }

    public function assigmentAction(){
        $check= $this->CheckRole(3);
        if($check == false){

            $_SESSION=[];
            $this->redirect("/index/defult");
        }
        $this->_view();
    }
}
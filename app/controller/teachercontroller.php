<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 12/2/2017
 * Time: 11:16 PM
 */

namespace PHPMVC\Controller;
use PHPMVC\LIB\helper;
use PHPMVC\Model\FacadeModel;
use PHPMVC\LIB\input_filter;

session_start();
class TeacherController extends AbstactContoller
{
    use input_filter;
    use helper;
public function defultAction(){
    $check= $this->CheckRole(2);
    global $_SESSION;
    if($check == false){
        $_SESSION=[];
        $this->redirect("/index/defult");
    }
    $this->_view();
}
    public function mycourseAction(){
        $check= $this->CheckRole(2);
        global $_SESSION;
        if($check == false){
            $_SESSION=[];
            $this->redirect("/index/defult");
        }
      $courses=FacadeModel::getCourse($_SESSION['id']);
        $this->data['courses']=$courses;
        $this->_view();
    }
    public function addstudentAction(){
        $check= $this->CheckRole(2);
        global $_SESSION;
        if($check == false){
            $_SESSION=[];
            $this->redirect("/index/defult");
        }
        if (isset($_POST['id']) && isset($_POST['reg'])) {

            if(FacadeModel::inCollage($_SESSION['collage_id'],$_POST['id'])){
                $StdCourse=FacadeModel::getClass("PHPMVC\Model\StudentCourse");
                $StdCourse->setStudentId($_POST['id']);
                $StdCourse->setCourseId($this->_parm[0]);
                if($StdCourse->save()){
                    $this->data['response']=$this->successMsg('sucssefully')   ;
                }else{
                    $this->data['response']=$this->dangerMsg('errore ')   ;
                }


            }else{
                $this->data['response']=$this->dangerMsg('this student not regest in collage');
            }


        }

        $this->_view();
    }
    public function addassigmentAction(){
        $check= $this->CheckRole(2);
        global $_SESSION;
        if($check == false){
            $_SESSION=[];
            $this->redirect("/index/defult");
        }
        if(isset($_POST['save'])){
            $validate=$this->validateForm([
               'string|min:6'=>$_POST['desc'],
            ]);
            if (!empty($validate)) {
                $this->data['error']= $validate;
                $this->_view();
            }
            if($_FILES['file']['error']==0){
                move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$_FILES['file']['name']);
                $assigment=FacadeModel::getClass("PHPMVC\Model\AssigmentModel");
                $assigment->setFileName($_FILES['file']['name']);
                $assigment->setDescription($_POST['desc']);
                $assigment->setCourseId(($this->_parm[0]));
                $assigment->setAvilabilty(1);
                $assigment->save();
            }

            switch ($_FILES['file']['error']){
                case 0: $this->data['uploade']=$this->successMsg(' uploade sucsseflly');
                break;
                case 1:$this->data['uploade']='file is too big to uplade';
                break;
                case 2: $this->data['uploade']='no file sellected';
                break;
                default :$this->data['uploade']='sorry there was problem in uplade';
                break;
            }


        }
        $this->_view();
    }
    public function adddocumentAction(){
        $check= $this->CheckRole(2);
        global $_SESSION;
        if($check == false){
            $_SESSION=[];
            $this->redirect("/index/defult");
        }
        if(isset($_POST['save'])){

            if (!empty($validate)) {
                $this->data['error']= $validate;
                $this->_view();
            }
            if($_FILES['file']['error']==0){
                move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$_FILES['file']['name']);
                $doc=FacadeModel::getClass("PHPMVC\Model\DocumentModel");
                $doc->setFileName($_FILES['file']['name']);
                $doc->setCourseId(($this->_parm[0]));
                $doc->save();
            }

            switch ($_FILES['file']['error']){
                case 0: $this->data['uploade']=$this->successMsg(' uploade sucsseflly');
                    break;
                case 1:$this->data['uploade']='file is too big to uplade';
                    break;
                case 2: $this->data['uploade']='no file sellected';
                    break;
                default :$this->data['uploade']='sorry there was problem in uplade';
                    break;
            }


        }
        $this->_view();

    }

    public function addquizAction(){
        $check= $this->CheckRole(2);
        global $_SESSION;
        if($check == false){
            $_SESSION=[];
            $this->redirect("/index/defult");
        }
if(isset($_POST['save'])){
    $doc=FacadeModel::getClass("PHPMVC\Model\QuizModel");
    $doc->setCourseId($this->_parm[0]);
    $doc->setAvilablity(1);
    $doc->setNumberOfQustion($_POST['numquiz']);
    $doc->setName($_POST['name']);
    $id=$doc->save();
    $this->redirect('/teacher/addqustion/'.$id);

}

        $this->_view();
    }
    public function addqustionAction(){
        $doc=FacadeModel::getClass("PHPMVC\Model\QuizModel");
        $quiz=$doc->gatByPk((int)$this->_parm[0]);

        $this->data['number_of_qustion']=$quiz->number_of_qustion;
        if(isset($_POST['save'])){
          for ($i =0 ; $i<$quiz->number_of_qustion ; $i++){
              $doc=FacadeModel::getClass("PHPMVC\Model\QustionModel");
              $doc->setQuizId($this->_parm[0]) ;
              $doc->setQus($_POST['q'.$i]);
              $doc->setAns($_POST['a'.$i]);
              $doc->save();

          }
        }

        $this->_view();
    }
    public function coursedetAction(){
        $check= $this->CheckRole(2);
        global $_SESSION;
        if($check == false){
            $_SESSION=[];
            $this->redirect("/index/defult");
        }
         if(isset($_POST['quiz'])){
             $array=FacadeModel::getAllQuiz($this->_parm[0]);
             $this->data['quiz']=$array;
             $this->_view();
         }elseif(isset($_POST['assigment'])){
             $array=FacadeModel::getAllAssigment($this->_parm[0]);
             $this->data['assigment']=$array;
             $this->_view();
         }elseif(isset($_POST['document'])){
             $array=FacadeModel::getdocument($this->_parm[0]);
             $this->data['document']=$array;
             $this->_view();
         }elseif(isset($_POST['avl'])){
             $doc=FacadeModel::getClass("PHPMVC\\Model\\AssigmentModel");
             $ass=$doc->gatByPk($_POST['ass_id']);
             $ass->setAvilabilty(!$_POST['Avilabilty']);
             $ass->save();
             $this->_view();
         }elseif (isset($_POST['avlqu'])){
             $doc=FacadeModel::getClass("PHPMVC\\Model\\QuizModel");
             $ass=$doc->gatByPk($_POST['ass_id']);
             $ass->setAvilablity(!$_POST['Avilabilty']);
             $ass->save();
             $this->_view();
         }
        $this->_view();
    }
}
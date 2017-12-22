<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 12/2/2017
 * Time: 10:09 PM
 */

namespace PHPMVC\Controller;
use PHPMVC\LIB\helper;
use PHPMVC\LIB\Input_Filter;
use PHPMVC\Model\FacadeModel;
use PHPMVC\Model\FactoryModel;
use PHPMVC\LIB\database\connection;

session_start();
class AdminController extends AbstactContoller
{
    use Input_Filter;
    use helper;

    public function defultAction()
    {
        $check = $this->CheckRole(1);
        global $_SESSION;
        if ($check == false) {
            $_SESSION = [];
            $this->redirect("/index/defult");
        }
        $this->_view();
    }

    public function regesterAction()
    {
        $check = $this->CheckRole(1);
        global $_SESSION;
        if ($check == false) {
            $_SESSION = [];
            $this->redirect("/index/defult");
        }
        if (isset($_POST) && isset($_POST['Regester'])) {
            $validate = $this->validateForm([
                "string|min:4" => $_POST['name'],
                "email" => $_POST['email'],
                "string|min:5" => $_POST['last_name'],
                "string|min:6" => $_POST['password']
            ]);

            if (!empty($validate)) {
                $collage = $collage = FactoryModel::getClass('PHPMVC\\Model\\CollageModel');
                $allCollage = FacadeModel::getAll($collage);
                $this->data['collages'] = $allCollage;
                $this->data["error"] = $validate;
                $this->_view();
            }
            $first_name = $this->filterString($_POST['name']);
            $last_name = $this->filterString($_POST['last_name']);
            $email = $_POST['email'];
            $address = $_POST['address'];
            $password = $_POST['password'];
            $role = $this->filterInt($_POST['role']);
            $user = FacadeModel::getClass("PHPMVC\\Model\\UsersModel");
            $user->setName($first_name);
            $user->setRole($role);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setLastName($last_name);
            $user->setAddress($address);
            $user->setCollageId($_POST['collage_id']);
            if ($user->save()) {
                $this->data['create_msg'] = $this->successMsg("create successfully");
            } else {
                $this->data['create_msg'] = $this->successMsg("create falied");
            }


        }
        $collage = $collage = FactoryModel::getClass('PHPMVC\\Model\\CollageModel');
        $allCollage = FacadeModel::getAll($collage);
        $this->data['collages'] = $allCollage;
        $this->_view();
    }

    public function collageAction()
    {
        $check = $this->CheckRole(1);
        if ($check == false) {
            $_SESSION = [];
            $this->redirect("/index/defult");
        }

        $collage = FacadeModel::getClass('PHPMVC\\Model\\CollageModel');
        $collages = FacadeModel::getAll($collage);
        $this->data['collages'] = $collages;
        $this->_view();
    }

    ///This function to add collage
    public function addcollageAction()
    {
        $check = $this->CheckRole(1);
        if ($check == false) {
            $_SESSION = [];
            $this->redirect("/index/defult");
        }
        if (isset($_POST) && isset($_POST['Regester'])) {
            $validate = $this->validateForm([
                "string|min:4" => $_POST['name'],
            ]);
            if (!empty($validate)) {
                $this->data['error'] = $validate;
                $this->_view();
            } else {
                $name = $this->filterString($_POST['name']);
                $desc = $this->filterString($_POST['desc']);
                $collage = FactoryModel::getClass('PHPMVC\\Model\\CollageModel');
                $collage->setName($name);
                $collage->setDescreption($desc);
                if ($collage->save()) {
                    $this->data['create_msg'] = $this->successMsg("create successfully");
                } else {
                    $this->data['create_msg'] = $this->successMsg("create falied");
                }

            }
        }


        $this->_view();
    }

    public function collageeditAction()
    {
        $check = $this->CheckRole(1);
        if ($check == false) {
            $_SESSION = [];
            $this->redirect("/index/defult");
        }
        $id = $this->_parm[0];
        $collage = FactoryModel::getClass('PHPMVC\\Model\\CollageModel');
        $collage = $collage->gatByPk($id);
        $this->data['collage'] = $collage;
        $this->_view();
    }

    public function courseAction()
    {
        $check = $this->CheckRole(1);
        if ($check == false) {
            $_SESSION = [];
            $this->redirect("/index/defult");
        }
        $query = "SELECT *
                 FROM users 
                 JOIN course ON users.id=course.teacher_id where course.collage_id=" . $this->_parm[0];
        $connect = $Connection = connection::getInstance()->getConnection();
        $stmt = $Connection->prepare($query);
        $stmt->execute();

        $array = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $this->data['array'] = $array;
        $this->data['collage_id']=$this->_parm[0];
        $this->_view();
    }

    public function addStudentCourseAction()
    {

        $check = $this->CheckRole(1);
        if ($check == false) {
            $_SESSION = [];
            $this->redirect("/index/defult");
        }
        if (isset($_POST['id']) && isset($_POST['reg'])) {
            if(FacadeModel::inCollage($this->_parm[1],$_POST['id'])){
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

        public function addCourseAction(){
            $check = $this->CheckRole(1);
            if ($check == false) {
                $_SESSION = [];
                $this->redirect("/index/defult");
            }
            if(isset($_POST['reg'])){
                $val=$this->validateForm([
                   "string|min:4"=>$_POST['name'],
                ]);
                if(!empty($val)){
                    $ar=FacadeModel::getTeacherInCollage($this->_parm[0]);
                    $this->data['teacher']=$ar;
                    $this->data['error'] = $val;
                    $this->_view();
                }else{
                    var_dump($_POST);
                    $course=FacadeModel::getClass("PHPMVC\\Model\\CourseModel");
                    $course->setCourseName($_POST['name']);
                     $course->setHours($_POST['hours']);
                        $course->setTeacherId($_POST['teacher_id']);
                        $course->setCollageId($this->_parm[0]);
                        if($course->save()){
                            $this->data['response']=$this->successMsg('sucssefully')   ;
                        }else{
                            $this->data['response']=$this->dangerMsg('this student not regest in collage');
                        }

                }
            }

         $ar=FacadeModel::getTeacherInCollage($this->_parm[0]);
          $this->data['teacher']=$ar;
              $this->_view();

        }


}
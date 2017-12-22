<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 9/7/2017
 * Time: 4:41 PM
 */

namespace PHPMVC\Controller;


use PHPMVC\LIB\Helper;
use PHPMVC\LIB\Input_Filter;
use PHPMVC\Model\EmployeeModel;

class EmployeeController extends AbstactContoller
{
    use Helper;
    use Input_Filter;
    public function defultAction()
    {
        $this->data['employees']=EmployeeModel::getAll();
        $this->_view();
    }
    public function addAction()
    {
               if(isset($_POST['add'])){
            $emp=new EmployeeModel();
            $emp->address=$this->filterString($_POST['address']);
            $emp->name=$this->filterString($_POST['name']);
            $emp->age=$this->filterInt($_POST['age']);
            $emp->salary=$this->filterFloat($_POST['salary']);
            $emp->save();
            $this->redirect('/employee');

        }


        $this->_view();
    }

    public function editAction(){
        $id=$this->filterInt($this->_parm[0]);
        $emp=EmployeeModel::gatByPk($id);
        if(isset($_POST['edit'])){
            $emp->address=$this->filterString($_POST['address']);
            $emp->name=$this->filterString($_POST['name']);
            $emp->age=$this->filterInt($_POST['age']);
            $emp->salary=$this->filterFloat($_POST['salary']);
            $emp->save();
           $this->redirect('/employee');
        }
       var_dump($emp);
        $this->data['employee']=$emp;

        if($emp ===false){
            $this->redirect("/employee");
        }

        $this->_view();
    }

    public function deleteAction(){
        $id=$this->filterInt($this->_parm[0]);
        $emp=EmployeeModel::gatByPk($id);
        $emp->delete();

        if($emp ===false){
            $this->redirect("/employee");
        }
        $this->redirect("/employee");

    }




}
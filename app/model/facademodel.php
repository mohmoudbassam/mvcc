<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 12/3/2017
 * Time: 11:51 AM
 */

namespace PHPMVC\Model;


class FacadeModel
{
    public static function find($array){
        abstactModel::find($array);
    }
    public Static function getClass($String){
       return FactoryModel::getClass($String);
    }

    public static function getAll(&$object){
        return $object->getAll();
    }
    public static function getCourse($id){
        $course=FactoryModel::getClass('PHPMVC\\Model\\CourseModel');
       return  $course->getCourse($id);
    }
    public static function gatByPk($id){
        $user=FactoryModel::getClass('PHPMVC\\Model\\UsersModel');
        return $user->gatByPk($id);
    }
    public static function inCollage($collageID,$studentID){
        return $user=FactoryModel::getClass('PHPMVC\\Model\\UsersModel')->inCollage($collageID,$studentID);
    }
    public static function get_Collage_ID($id){
        $course=FactoryModel::getClass('PHPMVC\\Model\\CourseModel');
        return  $course->get_Collage_ID($id);
    }
    public static function getTeacherInCollage($collage_id){
        $Collage=FactoryModel::getClass('PHPMVC\\Model\\CollageModel');
        return $Collage->getTeacherInCollage($collage_id);
    }

    public static function getAllAssigment($id){
       return AssigmentModel::getAllAssigment($id);
    }
    public static function getAllQuiz($id){
        return QuizModel::getAllQuiz($id);
    }
    public  static function getdocument($id){
        return DocumentModel::getdocument($id);
    }
    public static function getAllCourse(){
        return StudentCourse::getAllCourse();
}
public static function getAllQuizFromUser($id){
        return QuizModel::getAllQuizFromUser($id);
}
public static function getAllqustionToQuiz($id){
    return QustionModel::getAllqustionToQuiz($id);
}


}
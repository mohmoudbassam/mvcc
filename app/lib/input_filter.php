<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 9/10/2017
 * Time: 1:08 PM
 */

namespace PHPMVC\LIB;


trait Input_Filter
{

 public function filterInt($input){
      return filter_var($input,FILTER_SANITIZE_NUMBER_INT);
 }
 public function filterString($input){
     return filter_var($input,FILTER_SANITIZE_STRING);
 }
 public function filterFloat($input){
     return filter_var($input,FILTER_SANITIZE_NUMBER_FLOAT);
 }
 public function filterEmail($email){
     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         return false;
     }
     return true;
 }

 public function validate($array){
     foreach ($array as $key=>$value){

     }
 }


  public   function validateForm($array){
      $error=[];
        foreach ($array as $key => $value){
            if($key === "email"){
                if($this->filterEmail($value) == false){
                    $error['email']=$this->dangerMsg("error in email");
                }
            }else{
                if(strchr($key,"string")){
                    if(strchr($key,"|")){
                        $ar=explode("|",$key);
                        foreach ($ar as $kk=>$vv){
                            if(strchr($vv,":")){
                                $a=explode(":",$vv);
                                if($a[0] == "max"){
                                    if(strlen($value)>(int)$a[1]){
                                        $error['max']=$this->dangerMsg("the max length is $a[1]");
                                    }
                                }
                                elseif ($a[0] == "min"){
                                    if(strlen($value)<(int)$a[1]){
                                        $error['max']=$this->dangerMsg("the min length is $a[1]");
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $error;
    }
}
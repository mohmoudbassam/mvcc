<?php
/**
 * Created by PhpStorm.
 * User: mhmod
 * Date: 12/3/2017
 * Time: 11:46 AM
 */

namespace PHPMVC\Model;


class FactoryModel
{

    public Static function getClass($String){
        return new $String();
    }
}
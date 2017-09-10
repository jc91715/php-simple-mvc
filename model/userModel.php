<?php

class userModel extends baseModel
{
    public $table='users';


    public function getName($val)
    {

        return $val.'getsuccess';
    }


    public function setName($val)
    {


        return $val.'setsuccess';
    }


    public function beforeCreate()
    {

    }

    public function afterCreate()
    {

    }


    public function beforUpdate()
    {

    }

    public function afterUpdate()
    {

    }
}
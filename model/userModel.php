<?php

class userModel extends baseModel
{
    public $table='backend_users';


    public function getName($val)
    {

        return $val.'getsuccess';
    }


    public function setName($val)
    {


        return $val.'setsuccess';
    }


    public function post()
    {
        return $this->hasMany('postModel','user_id');
    }
}
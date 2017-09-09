<?php

class indexController extends basicController
{

    public function index()
    {

//        $user=new userModel();

        $title='index done';


        view('index',compact('title'));




    }

    public function create(){

//        $user=new userModel(); 使用的话请先配置数据库

        $title='crated done';
        view('create',compact('title','user'));

    }
    public function show(){

        $title='show down 自定义模板';
        view('show',compact('title'));
    }
}
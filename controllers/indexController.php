<?php

class indexController extends basicController
{

    public function index()
    {


        $user=new userModel();// 使用的话请先配置数据库
$use=$user->find(1);


        $title='index.view.php 原生模板加载成功';

        view('index',compact('title'));

    }

    public function create(){

//        $user=new userModel();

        $title='create.view.php 加载成功';
        view('create',compact('title'));

    }
    public function show(){

        $title='show.html 自定义模板加载成功';
        view('show',compact('title'));
    }
}
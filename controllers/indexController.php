<?php

class indexController extends basicController
{

    public function index()
    {


        $user=new userModel();// 使用的话请先配置数据库
        $user=$user->find(1);
        var_dump($user->toArray());
//        var_dump($user->create(['name'=>'setdsd','email'=>'sdsds@qq.com','password'=>'444444']));

//        $abc->name='dsafds';
//        var_dump($abc->name);
//        var_dump($abc->attribute);
//        var_dump($abc->model);
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
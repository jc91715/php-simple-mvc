<?php

class indexController extends basicController
{

    public function index()
    {

        $user=new userModel();

        $title='index done';


        view('index',compact('data','title','user'));




    }

    public function create(){

        $user=new userModel();

        $title='crated done';
        view('create',compact('title','user'));

    }
    public function show(){
        $title='show down 自定义模板';
        view('show',compact('title'));
    }
}
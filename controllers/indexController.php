<?php

class indexController extends basicController
{

    public function index()
    {

        $user=new userModel();
        $user->all();
        $arr=['ab','cd','ef'];
        $val='index done';


        view('index',compact('arr','val'));




    }

    public function create(){

        $val='crated done';
        view('create',compact('val'));

    }
    public function show(){
        $val='show down';
        view('show',compact('val'));
    }
}
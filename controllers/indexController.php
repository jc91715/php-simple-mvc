<?php

class indexController extends basicController
{

    public function index()
    {

//        $user=new userModel();// 使用的话请先配置数据库
//      foreach($user->find(1)->post() as $post)
//      {
//          echo $post->title.'<br>';
//          echo PHP_EOL;
//      }
//        $post=new postModel();
        $title='最新文章';
        $post=new postModel();
        $post=$post->superUpdateOne();

        view('index',compact('title','post'));

    }

}
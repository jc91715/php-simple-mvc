<?php

class postController extends basicController
{


    public function posts(){

        $post=new postModel();
        $number=3;
        $posts=$post->painate($number);
        $count=$post->count($posts);
        $pageAll=ceil($count/$number);
        if(isset($_GET['page'])){
            $currPage=$_GET['page'];
        }else{
            $currPage=1;
        }
        $title='文章列表';
        view('post/index',compact('title','posts','pageAll','currPage'));

    }
    public function show($id){
        $post=new postModel();
        $post=$post->find($id);
        view('post/show',compact('title','post'));
    }

    public function create()
    {
        if(isset($_POST['content'])){

            $post=new postModel();
            $_POST['slug']=rand();
            $_POST['published']='1';
            $post->create($_POST);
            $this->redirect('/  ');
        }

        view('post/create');

    }
}
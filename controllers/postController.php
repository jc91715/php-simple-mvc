<?php

class postController extends basicController
{


    public function posts(){

        $post=new postModel();
        $posts=$post->get();
        $title='文章列表';
        view('post/index',compact('title','posts'));

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
        }

        view('post/create');

    }
}
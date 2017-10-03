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
            $post=$post->create($_POST);
            var_dump($post);
//            $this->redirect('/');
        }

        view('post/create');

    }
}
<?php

class xcxController extends basicController
{


    public function posts(){

        $post=new postModel();
        $number=10;
        $posts=$post->painate($number,true);
//        $count=$post->count($posts);
//        $pageAll=ceil($count/$number);
//        if(isset($_GET['page'])){
//            $currPage=$_GET['page'];
//        }else{
//            $currPage=1;
//        }

        echo json_encode(['posts'=>$posts]);

    }
    public function show($id){
        $post=new postModel();
        $post=$post->find($id);
        echo json_encode(['post'=>$post->toArray()]);
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
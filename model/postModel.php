<?php

class postModel extends baseModel
{

    public $table='rainlab_blog_posts';






    public function user()
    {
       return $this->belongsTo('userModel','user_id');
    }


    public function categories()
    {
        return $this->belongsToMany('categoryModel','rainlab_blog_posts_categories','category_id','post_id');
    }


    public function extendQuery($query)
    {
        $query->where('published','<>','0')->orderBy('id');
    }

    public function setContent($val){
        $parser=new Parser();
        $content =$parser->makeHtml($val);

        return $content;

    }
}
<?php

class categoryModel extends baseModel
{
    public $table='rainlab_blog_categories';


    public function posts()
    {
        return $this->belongsToMany('postModel','rainlab_blog_posts_categories','post_id','category_id');
    }
}
<?php

class postModel extends baseModel
{

    public $table='rainlab_blog_posts';






    public function user()
    {
       return $this->belongsTo('userModel','user_id');
    }

}
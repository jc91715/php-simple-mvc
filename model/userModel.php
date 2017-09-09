<?php

class userModel extends baseModel
{
    public function __construct()
    {
        parent::__construct();

        $this->model='users';
    }
}
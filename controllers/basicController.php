<?php

class basicController
{
    public $app;

    public function __construct()
    {
        $this->app=new Container();
    }

    public function redirect($url)
    {
        header("Location:{$url}");
    }
}
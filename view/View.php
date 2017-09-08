<?php

abstract class View
{
    protected $rootPath;
    protected static $instance;
    private function __construct()
    {
        $this->rootPath=ROOT_PATH;

        $this->init();
    }

    public function init(){}

    public static function instance(){
        return isset(static::$instance)
            ? static::$instance
            : static::$instance = new static;
    }


}
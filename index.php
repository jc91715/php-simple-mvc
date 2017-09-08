<?php

include 'autoload.php';

define('ROOT_PATH',dirname(__FILE__));
$arrUrl=explode('/',$_SERVER['REQUEST_URI']);


unset($arrUrl[0]);
if(!isset($arrUrl[1])|empty($arrUrl[1])){
    $arrUrl[1]='index';
}
$c=$arrUrl[1].'Controller';
unset($arrUrl[1]);
if(!isset($arrUrl[2])|empty($arrUrl[2])){
    $arrUrl[2]='index';
}
$a=$arrUrl[2];
unset($arrUrl[2]);


$controller=new $c();

$controller->$a();

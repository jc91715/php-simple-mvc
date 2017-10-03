<?php

include 'autoload.php';

define('ROOT_PATH',dirname(__FILE__));
$url=$_SERVER['REQUEST_URI'];
if(strpos($_SERVER['REQUEST_URI'],'?')){
$url=substr($url,0,strpos($_SERVER['REQUEST_URI'],'?'));
};

$arrUrl=explode('/',$url);


unset($arrUrl[0]);
//控制器
if(!isset($arrUrl[1])|empty($arrUrl[1])){
    $arrUrl[1]='index';
}
$c=$arrUrl[1].'Controller';
unset($arrUrl[1]);

//方法名
if(!isset($arrUrl[2])|empty($arrUrl[2])){
    $arrUrl[2]='index';
}

$a=$arrUrl[2];
unset($arrUrl[2]);

//参数

if(!isset($arrUrl[3])|empty($arrUrl[3])){
    $args=[];
}else{
    $args[]=$arrUrl[3];
    unset($arrUrl[3]);
}




$controller=new $c();

try{
    call_user_func_array(array($controller,$a),$args);

}catch (Exception $e){
    echo '页面不存在';
}


<?php
function my_autoloader($class) {


    switch ($class){
        case substr($class,-10)=='Controller':
            include 'controllers/'.$class.'.php';
            break;
        case substr($class,-5)=='Model':
            include 'model/'.$class.'.php';
            break;
        case substr($class,-7)=='Compile':
            include 'view/html/'.$class.'.View'.'.php';
            break;
        case substr($class,-4)=='View':
            include 'view/html/'.$class.'.php';
            break;
        default:
            include 'controllers/indexContrpller.php';

    }
}
spl_autoload_register('my_autoloader');


function view($path,$paras=[]){
    extract($paras);

    if(file_exists('view/php/'.$path.'.view'.'.php')){
        $path='view/php/'.$path.'.view'.'.php';
    }else{
        $path=Compile::instance()->display($path);

    }
    include $path;
}
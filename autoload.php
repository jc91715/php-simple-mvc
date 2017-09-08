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



class Container
{
    protected $binds;

    protected $instances;

    public function bind($abstract, $concrete)
    {
        //Todo: 向 container 添加一种对象的的生产方式

        //$abstract: 第一个参数 $abstract, 一般为一个字符串(有时候也会是一个接口), 当你需要 make 这个类的对象的时候, 传入这个字符串(或者接口), 这样make 就知道制造什么样的对象了
        //$concrete: 第二个参数 $concrete, 一般为一个 Closure 或者 一个单例对象, 用于说明制造这个对象的方式

        if ($concrete instanceof Closure) {
            $this->binds[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }

    public function make($abstract, $parameters = [])
    {
        //Todo: 生产一种对象

        //$abstract: 在bind方法中已经介绍过
        //$parameters: 生产这种对象所需要的参数

        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }

        array_unshift($parameters, $this);

        return call_user_func_array($this->binds[$abstract], $parameters);
    }
}
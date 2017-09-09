
# 一个简单粗糙的MVC(提供基本的功能)

ps: 写的第一个，不足之处，欢迎拍砖


### 快速开始

    git clone  https://github.com/jc91715/php-simple-mvc.git project
    
 
### 访问 your.domain.app/


### 路由 /xxxx/xxxxx


eg

    /index/index  映射到 controllers/indexController 下的 index 方法
    

### controller 

  在controllers文件下 继承自 basicController

eg

    //controllers/indexController.php
    <?php
    
    class indexController extends basicController
    
    {
        public function index()
        {
            
        }
    }
    
### 数据库 配置在 config 文件夹下

eg

    //config/database.php
    
    return [
        'host' =>'localhost',
        'dbname' =>'demo4',
        'username' => 'homestead',
        'password' =>'secret'
    ];
    
  
  
### model
 
 在 model 文件夹下 继承 baseModel 提供 增删改查功能
 
eg
 
    //model/userModel.php
    <?php
    
    class userModel extends baseModel
    {
        public function __construct()
        {
            parent::__construct();
            //映射数据库表
            $this->model='users';
        }
    }
    
    
如何使用 
  
    $user=new userModel()
    
    $user->all()
    
    $user-create($arrayData)
    
    $user->update($arrayData,$id)
    
    $user->find($id)
    
    $user->delete($id)
    
### view  

支持原生 php 模板（默认推荐） 和 自定义 html模板(正则匹配是 是从php核心技术与最佳实践上引用的)
    
    
    ps: 找不到原生模板的情况下会去找 自定义模板
    
    //不推荐使用
    //模板标签
    {$var}
    
    {foreach $arr}
        {$V}
    {/foreach}
    
    {if}
    
    {endif}
    



1 在控制其中使用
    
  eg
  
    //controllers/indexController
    <?php
    
     class indexController extends basicController
        
        {
            public function index()
            {
                $title='index done'
                view('index');//加载 view/php/index.view.php
                
                view('index/index');//加载 view/php/index/index.view.php
                
                view('index',compact('title'));//传递变量 $title 到视图上
                
            }
        }
        
        
2 在视图中使用（为了代码重用  包含header 和 footer等等需要重用的文件）


eg 
    
    // view/php/index.view.php

    <?php view('common/header', compact('title')); ?> //包含 view/php/common/header.view.php 并传递数据（compact('title') 是从控制器传递过来的）

  
    //view/php/common/header.view.php
       
       
     <title>jc91715-php-simple-mvc <?php echo $title;?></title>
     
     
     
### 提供widget 

等等 widget 有什么用 
 
不是有 view 么
 
 
请 瞅一下这里 [@leo](http://leo108.github.io/SinglePHP/doc.html#widget)


使用widget 

必须继承 basicWidget.php 并实现 display 方法


eg

    // widget/indexWidget.php
    
    <?php
    
    class indexWidget extends basicWidget
    {
        public function display($val){
            //$val 是从视图传过来的值
           return  "widget/index/index.widget加载成功(我是从view传过来的经过了widget的处理) ";
        }
    }
    
    
    
在视图中调用

    //view/php/index.widget.php
    
    
    <?php w('index', $title) ?>//加载 widget/index/index.widget.php
    <?php w('index.test', $title) ?>//加载 widget/index/test.widget.php
    
    
    
### END
    
    

    


    
    
    
 

   

    

    



    

    

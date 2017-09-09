<?php

class indexWidget extends basicWidget
{
    public function display($val){
        //$val 是从视图传过来的值
       return  "widget/index/index.widget加载成功(我是从view传过来的经过了widget的处理) ";
    }
}
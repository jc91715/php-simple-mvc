<?php

class indexWidget extends basicWidget
{
    public function display($val){
        //$val 是从视图传过来的值
       return  "index.widget.php widget加载成功";
    }
}
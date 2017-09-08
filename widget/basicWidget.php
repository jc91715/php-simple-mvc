<?php

abstract class basicWidget
{
    public function __construct($path,$val)
    {


        $val=$this->display($val);


        if(count($path)==1){
            $widgetPath='widget/'.$path[0].'/'.$path[0].'.widget.php';
        }else{
            $widgetPath='widget/'.$path[0].'/'.$path[1].'.widget.php';
        }

        view($widgetPath,compact('val'));
    }

    public function display($val){}

}
<?php

class postEvent extends baseEvent
{


    public function handle($data)
    {
       $listen=new postListen($data);

        $listen->postUpdate($data);
    }

}


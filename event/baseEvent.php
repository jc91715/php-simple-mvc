<?php
abstract class baseEvent
{
    public function __construct($data)
    {
        $this->handle($data);
    }

    abstract public function handle($data);
}
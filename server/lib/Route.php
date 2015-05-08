<?php

class Route 
{
    public $class;
    public $params;
    public $extension;

    public function __construct()
    {
        list($null, $a, $b, $c, $api,$this->class,  $param) = explode('/', $_SERVER['REQUEST_URI'] , 7);
        list($this->params,$this->extension) =  explode('.', $param , 2);

    }

}

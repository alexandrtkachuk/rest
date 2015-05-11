<?php

class Route 
{
    public $class;
    public $method;
    public $params;
    public $extension;

    public function __construct()
    {

        $arr=explode('/', $_SERVER['SCRIPT_NAME']);
        $url = $_SERVER['REQUEST_URI'];
        foreach($arr as $item)
        { 
            $url = preg_replace ( '/'.$item.'\//' , '' , $url,1);
        }

        @ list( $api,$this->class,$this->method,$param) = explode('/',$url,4);
        @ list($this->params,$this->extension) =  explode('.', $param , 2);

        if(!isset($this->extension) || strlen($this->extension)<1)
        {
            $this->extension =  EXTENSION;
        }
    }

    public function get()
    {
        return 
            array(
                $this->class,
                $this->method,
                $this->params,
                $this->extension
            );
    }
}

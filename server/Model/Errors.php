<?php

class Errors
{
    protected static  $me;
    protected $errors;
    private function __construct()
    {
        $errors = array();
    }

    private function __clone()
    {

    }

    public static function getMee()
    {   
        
        if(isset(self::$me) ===false )
        {
            self::$me = new self();
            return self::$me;
        }
        
        return self::$me;
    }

    public function set($val)
    {
        $this->errors[]=$val;
        return true;
    }

    public function get()
    {
        return $this->errors;
    }
}

<?php
class cUser extends cController
{    
    protected $user;
    
    public function __construct() 
    { 
        $r = false;
        if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
        {
            $this->user = new User();
            $r=$this->user->login($_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW']);  
        }

        if(!$r)
        {
            throw new Exception(ERROR_4);
        }
    }

    public function getInfo()
    {
        $r=$this->user->info();
        return $r;
    }
}


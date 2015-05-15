<?php
class cUser extends cController
{    
    protected $user;
    
    public function __construct() 
    { 
        $this->user = new User();
    }

    public function getInfo()
    {
        $this->isLogin();
        $r=$this->user->info();
        return $r;
    }

    public function postAdd($params)
    {
        @list( $name,$pass,$email) = explode('/',$params);

        if(!$name || !$pass || !$email)
        {
            Errors::getMee()->set(ERROR_6);
            return false;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            Errors::getMee()->set(ERROR_5);
            return false;
        }
        
        $t = $this->user->registration($email,$pass,$name);
        return array('name'=> $name,'pass'=>$pass, 'email'=>$email,
            'params'=>$params, 'res' => $t  );
    }
     
    
    protected function isLogin()
    {
        $r = false;
        #Errors::getMee()->set($_SERVER['PHP_AUTH_USER'].$_SERVER['PHP_AUTH_PW'] );
        if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
        {
            if(!filter_var($_SERVER['PHP_AUTH_USER'], FILTER_VALIDATE_EMAIL))
            {
                Errors::getMee()->setHeader(HEADERMESS_401);
                throw new Exception(ERROR_5);
            }

            $r=$this->user->login(
                $_SERVER['PHP_AUTH_USER'],
                $_SERVER['PHP_AUTH_PW']
            );  
        }

        if(!$r)
        {
            Errors::getMee()->setHeader(HEADERMESS_401);
            throw new Exception(ERROR_4);
        }

        return 1; 
    }

}


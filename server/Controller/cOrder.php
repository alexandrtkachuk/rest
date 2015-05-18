<?php
class cOrder extends cUser
{
    public function __construct()
    {
        parent::__construct();
        
       $this->isLogin();

    }

    public function  getPayments()
    {    
        
        return  (new Order)->PaymentList();
        
    }
    
    public function postOrder($params)
    {
        $r = explode('?idt=',$params);
        $r['user']= $this->user->info();
        $r['uid']= $r['user']['id'];
       return  (new Order)->addOrder($r['uid'],$r[0],$r[1]);
    
    }
    

}  

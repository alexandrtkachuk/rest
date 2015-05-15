<?php
class cOrder extends cUser
{
    public function __construct()
    {
        parent::__construct();
        
       #$this->isLogin();

    }

    public function  getPayments()
    {    
      return (new Order)->PaymentList(); 
    }
    
    public function postOrder($params)
    {
    
    }
    

}  

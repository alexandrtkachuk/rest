<?php

class Order
{
    public function __construct()
    {
    
    }

    public function PaymentList()
    {
        $sql=Sql::getMee(); 
        $result = $sql->Select(
            'id',            
            'name'      
        )->setTables(TABLE_PAYMENTS)->Result();
        
      return $result;
    }

}

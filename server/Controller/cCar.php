<?php

class cCar extends cController
{  
    function  getInfo($params)
    {
        @ list($id) = explode('/', $params , 1);

        if(is_numeric($id))
        {    
            $result = (new Car)->get($id);
        }
        else
        {
            $result = (new Car)->getAll();
        }
        return $result;

    }

}

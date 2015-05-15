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
    
    function getSearch($params)
    {
        #@ list($year, $volume, $color, $maxspeed, $price) = explode('/', $params );
        @ $arr = explode('/', $params );

        $items = array();

        
           
            for($i=0;$i<count($arr);$i+=2)
            {
                if(count($arr)  <= $i+1)
                {
                    break;
                }
                $k = $arr[$i];
                $items[$k]= $arr[$i+1];
            }
            #*/
            $year = $items['year'];
            $color = $items['color'];
            $volume = $items['volume'];
            $maxspeed = $items['maxspeed'];
            $price = $items['price'];
            
            
            if( !$year || !is_numeric($year) || $year <0 )
            {
                Errors::getMee()->set(ERROR_7);
                return false;
            }

            if($volume &&  !is_numeric($volume))
            {
                Errors::getMee()->set(ERROR_7);
            return false;
        }

        if($maxspeed &&  !is_numeric($maxspeed))
        {
            Errors::getMee()->set(ERROR_7);
            return false;
        }

        if($price &&  !is_numeric($price))
        {
            Errors::getMee()->set(ERROR_7);
            return false;
        } 
        
        $result = (new Car)->serach($year, $volume, $color, $maxspeed, $price);
        return $result;
    }
}

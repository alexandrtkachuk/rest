<?php

class Car 
{  

    function  get($id)
    { 
        $sql=Sql::getMee(); 
        $sql->Select(
            'id',
            'price',
            'title',
            'maxSpeed',
            'year',
            'engineSize',
            'image')->
            setTables(TABLE_GOODS);
        $sql->where('id = ?');
        $result = $sql->Result(array($id) );
        return $result;
    }
    
    public function delete($id)
    {
        $sql=Sql::getMee();
        return $sql->Delete()->setTables(TABLE_GOODS)
            ->where('id = ?')->Result(array($id));
    
    }

    public function getAll()
    {
        $sql=Sql::getMee(); 
        $sql->Select(
            'id',            
            'title',     
            'image', 
            '(SELECT name 
            FROM carshop_manufacturer m 
            WHERE m.id =idManufacturer) as manufacturer'   
        )->setTables(TABLE_GOODS); 
        $result = $sql->Result();
        return $result;
    }

    public function serach($year, $volume=false, $color=false, $maxspeed=false, $price=false)
    {
        #return 'test';
        $sql=Sql::getMee();
        $sql->Select(
            'id',
            'price',
            'color',
            'title',
            'maxSpeed',
            'year',
            'engineSize',
            'image')->
            setTables(TABLE_GOODS);
        $params = array();
        $params[] = $year;
        $sql->where('year = ?');

        if($volume)
        {
            $sql->where('engineSize = ?','AND');
            $params[] = $volume;
        }

        if($color)
        {
            $sql->where('color = ?', 'AND');
            $params[] = $color;
        }

        if($maxspeed)
        {
            $sql->where('maxSpeed = ?', 'AND');
            $params[] = $maxspeed;
        }

        if($price)
        {
            $sql->where('price = ?','AND');
            $params[] = $price;
        }

        $result=$sql->Result($params);
        return $result;
    }
}

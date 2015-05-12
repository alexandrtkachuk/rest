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
        $sql->where('id='.$id);
        $result = $sql->Result();
        return $result;
    }

    public function getAll()
    {
        $sql=Sql::getMee(); 
        $sql->Select(
            'id',            
            'title',     
            'image',
            '(SELECT name FROM carshop_manufacturer m WHERE m.id =idManufacturer) as manufacturer'        
        )->setTables(TABLE_GOODS); 
        $result = $sql->Result();
        return $result;
    }
}

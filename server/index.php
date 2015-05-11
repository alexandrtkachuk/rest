<?php

include('config.php');
include(LIB.'/function.php');

function start()
{
    $temp_err=array(); // array errors
    $content=array(); //
    $extension;
    $err = Errors::getMee();
    try{       

        $rmethod = mb_strtolower($_SERVER['REQUEST_METHOD']);      

        @ list($class,$method, $params, $extension ) = (new Route())->get(); 
        
        $key = array_search($extension,unserialize(EXTENSIONS));
        
        if( !is_numeric($key))
        {
            $err->set(ERROR_3); 
            return array( null, EXTENSION);
        }

        $class = Controller::$class();
        if(!$class)
        {
            $err->set(ERROR_1); 
            return array( null, $extension);
        }
        $call = $rmethod.$method;
        $content = $class->$call($params);
        if(!isset($content))
        {
            $err->set(ERROR_2);
            return array( null,$extension);
        }
    }
    catch(Exception $e )
    {
        $err->set( $e->getMessage()  );
        return array(null,$extension); 
    }
    
    return array($content,$extension);
}

function view($content,$extension)
{
    $view = new View($content,$extension);

}

@ list($content, $extension )= start();
view($content, $extension);


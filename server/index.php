<?php

    include('config.php');
    include(LIB.'/function.php');
    $temp_err=array(); // array errors
    $content=array(); //
    try{
        $route      = new Route();
        $class      = $route->class;
        $params     = $route->params; 
        $extension  = $route->extension;
        print " class= $class params = $params   extension = $extension ";
        print "<pre>";
        #print_r($_SERVER);
        #print_r($arr);
        print "</pre>";


        echo 'me api   eew';

        }
    catch(Exception $e ){
    
      
      $temp_err[]= $e->getMessage();
    
    
    }

        
    #loadTemplate('view',$content,$temp_err );


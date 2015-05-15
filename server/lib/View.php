<?php 

class View
{

    public function __construct($data,$extension)
    {
        
        if($data==null)
        {
            $data = array(
                'errors'=>Errors::getMee()->get()
            );                
        }
        
        if( $h= Errors::getMee()->getHeader())
        {
            header('HTTP/1.1 '.$h);
        }
                
        header('Content-Type: text/'.$extension); 

        if($extension == 'json' )
        {
            print  json_encode (array(
                'result'=>$data
            ));
        }
        elseif('txt'== $extension)
        {   
            print '<pre>';
                print_r($data);
            print '<pre>';
        }    
    }

}


<!DOCTYPE HTML >
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>PHP task2 </title>
 </head>
 <body>

    <div id="err" >
    <?php
        if(count($temp_err)>0)
        {
            echo '<p>Err:</p>';
            foreach($temp_err as $item )
            {   
                echo '<p>'.$item.'</p>';
            }
            
        }       

     ?>
        
    </div>

    <?php
        foreach( $content as $item ){
            echo $item.'<hr />';        
        }
    ?> 
 </body>
</html> 

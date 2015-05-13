<?php
class cController
{    
    public function __call($name,$params)
    {
        Errors::getMee()->set(ERROR_2);
        return null;
    }
}

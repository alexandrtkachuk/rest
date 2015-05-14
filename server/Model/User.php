<?php

class User
{
    protected $name;
    protected $email;
    protected $role;
    protected $id;

    public function  __construct()
    {

    }

    public function login($email,$pass)
    {
        $sql=Sql::getMee(); 
        $result = $sql->Select(
            'id',            
            'name',     
            'email',
            'role'        
        )->setTables(TABLE_USERS)->
        where('email="'.$email.'" AND pass ="'.$pass.'"')->Result();

        if(count($result)>0)
        {
            $this->id = $result[0]->id;
            $this->name = $result[0]->name;
            $this->email = $result[0]->email;
            $this->role = $result[0]->role;
            return true;
        }
        return false;        
    }

    public function registration($email,$pass,$name)
    {
    
    }
    
    public function info()
    {    
        return array(
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'role'=>$this->role);
    } 
}

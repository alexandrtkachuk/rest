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
        where('email= ?  AND pass = ? ')->Result(array($email,$pass));

        if(count($result)>0)
        {
            $this->id = $result[0]->id;
            $this->name = $result[0]->name;
            $this->email = $result[0]->email;
            $this->role = $result[0]->role;
            
            $token = $this->getToken();
            $sql->Update( 'token','"?"' )
                ->setTables(TABLE_USERS)
                ->where('id = ?') 
                ->Result( array($token, $this->id));
            return $token;
        }
        return false;        
    }

    public function registration($email,$pass,$name)
    {

        $sql=Sql::getMee();

        $result = $sql->Select('id')->setTables(TABLE_USERS)->
            where('email= ?  ')->Result(array($email));

        if(count($result)>0)
        {
            return false;
        }

        $result = $sql->Insert(
            'name','?',
            'email','?',
            'pass','?',
            'role',1
            ) -> setTables(TABLE_USERS) -> Result(
                array($name,$email,$pass)
            );
        
        return $result;
    }

    public function info()
    {    
        return array(
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'role'=>$this->role);
    }

    public function isLogin ($token)
    {

        $sql=Sql::getmee(); 
        $result = $sql->Select(
            'id',            
            'name',     
            'email',
            'role'        
        )->setTables(TABLE_USERS)->
        where('token = ? ')->Result(array($token));

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

    public function logout($token)
    {
    
        $sql=Sql::getmee();
 
        $r=$sql->Update('token' , '')
            ->setTables(TABLE_USERS)
            ->where(' token = ? ')
        ->Result( array($token));

        return true;
    }

    protected function  getToken()
    {
        $q = uniqid();
        return md5($q.SKEY);
    }

}

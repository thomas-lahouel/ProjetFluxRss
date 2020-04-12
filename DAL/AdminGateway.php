<?php


class AdminGateway
{
    private $con;
    public function __construct(Connection $con)
    {
        $this->con=$con;
    }

    public function getPass($login){
        $query = "SELECT password FROM util WHERE username='$login'";
        $this->con->executeQuery($query);
        $result=$this->con->getResults();
        if($result != array()){
            return $result[0]['password'];
        }
        return null;
        
    }
}
<?php


class FluxGateway
{
    private $con;
    public function __construct(Connection $con)
    {
        $this->con=$con;
    }

    public function insertFlux($url, $description, $titre, $nbNews){
        
        $query = 'INSERT INTO tflux VALUES (:url, :description, :titre, :nbNews)';

        $this->con->executeQuery($query,
            array(':url' => array($url, PDO::PARAM_STR),
                ':description' => array($description, PDO::PARAM_STR),
                ':titre' => array($titre, PDO::PARAM_STR),
                ':nbNews' => array($nbNews, PDO::PARAM_INT)));
    }

    public function deleteFlux($url){
        $query = 'DELETE FROM tflux WHERE url = :url';
        $this->con->executeQuery($query,array(':url' => array($url,PDO::PARAM_STR)));
    }

    public function selectAllFlux(){
        global $base, $login, $password;
        global $result;
        
        $query = 'SELECT * FROM tflux';
        $this->con ->executeQuery($query);
            $result = $this->con->getResults();
        foreach ($result as $row){
            $tabDeFlux[]=new Flux($row['URL'], $row['description'], $row['titre'],$row['nbNews']);
        }
        if(!isset($tabDeFlux)){
            return null;
        }
        return $tabDeFlux;
    }

}
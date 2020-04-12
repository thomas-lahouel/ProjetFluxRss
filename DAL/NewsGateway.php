<?php


class NewsGateway
{
    private $con;
    public function __construct(Connection $con)
    {
        $this->con=$con;
    }

    public function insertNews($url,$titre,$contenu,$urlFlux,$date){
        $query = 'INSERT INTO tnews VALUES (:url, :titre, :contenu, :urlFlux, :date)';

        $this->con->executeQuery($query,
            array(':url' => array($url, PDO::PARAM_STR),
                ':titre' => array($titre, PDO::PARAM_STR),
                ':contenu' => array($contenu, PDO::PARAM_STR),
                ':urlFlux' => array($urlFlux, PDO::PARAM_STR),
                ':date' => array($date, PDO::PARAM_STR)));
    }

    public function selectNews($numPage){
        
        $numPage = $numPage-1;
        $limite = 5;
        $deb = $numPage * $limite;
        $query = 'SELECT SQL_CALC_FOUND_ROWS * FROM tnews LIMIT :limite OFFSET :deb';
        $this->con->executeQuery($query, array(':limite'=>array($limite, PDO::PARAM_INT),
                                                ':deb' => array($deb, PDO::PARAM_INT)));
        $result = $this->con->getResults();
        foreach ($result as $row){
            $tabDeNews[]=new News($row['URL'], $row['titre'], $row['contenu'], $row['urlFlux'], $row['date']);
        }
        if(isset($tabDeNews)){
         return $tabDeNews;   
        }
       
        
    }

    public function getNbNews(){
        $query = 'SELECT COUNT(*) FROM tnews';
        $this->con->executeQuery($query);
        $nbNews=$this->con->getResults();
        return $nbNews;
    }

    public function deleteNews($urlFlux){
        $query = 'DELETE FROM tnews WHERE urlFlux = :urlFlux';
        $this->con->executeQuery($query,array(':urlFlux' => array($urlFlux,PDO::PARAM_STR)));
        
    }
        
        
        
}
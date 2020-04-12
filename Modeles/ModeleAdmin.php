<?php


class ModeleAdmin
{
    public function connection($log, $passw){
        global $base, $login, $password;
        global $rep, $vues;

        $log = Nettoyer::nettoyer_string($log);
        $passw = Nettoyer::nettoyer_string($passw);

        $g = new AdminGateway(new Connection($base, $login, $password));
        $p2 = $g->getPass($log);
        if (password_verify($passw, $p2)) {
            $_SESSION['login'] = $log;
            $_SESSION['role'] = 'admin';
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deconnexion(){
        $_SESSION=array();
    }

    public static function isAdmin(){
        if(isset($_SESSION['login']) && isset($_SESSION['role'])){
            $login = Nettoyer::nettoyer_string($_SESSION['login']);
            $role = Nettoyer::nettoyer_string($_SESSION['role']);
            return new Admin($login, $role);
        }
        else{
            return null;
        }
    }

    

    public function insererFlux($url,$description,$nomsite,$nbNews){
        global $rep, $vues;
        global $login, $password, $base;
        $con = new Connection($base, $login, $password);
        $xml = simplexml_load_file($url);


        $fg=new FluxGateway($con);
        $ng=new NewsGateway($con);
        $fg->insertFlux($url,$description,$nomsite,$nbNews);
        $i = 0;
        foreach($xml->channel->item as $item){
            if($item->link != null && $item->title != null && $item->description != null && $i < $nbNews){
                $lien = $item->link ;
                $titre = $item->title;
                $description = $item->description;
                $date = $item->pubDate;
                $ng->insertNews($lien, $titre, $description, $url,$date);
            }
            $i++;

        }
    }

    public function suppFlux($url){
        global $login, $password, $base;
        $con = new Connection($base, $login, $password);
        
        $fg = new FluxGateway($con);
        $ng = new NewsGateway($con);
        $fg->deleteFlux($url);
        $ng->deleteNews($url);
    }

    public function ListerFlux(){
        global $base, $login, $password;
        $g=new FluxGateway(new Connection($base, $login, $password));
        $tabDeFlux=$g->selectAllFlux();
        return $tabDeFlux;
        
    }
}
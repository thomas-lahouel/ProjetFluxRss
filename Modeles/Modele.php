<?php


class Modele
{
    public function getNews($page){
        global $base, $login, $password;
        $g=new NewsGateway(new Connection($base, $login, $password));
        $tabDeNews=$g->selectNews($page);
        return $tabDeNews;
    }

    public function NbNews(){
        global $base, $login, $password;
        $g=new NewsGateway(new Connection($base, $login, $password));
        $nb=$g->getNbNews();
        return $nb;
    }

    public function updateNews(){
        global $base, $login, $password;
        $con = new Connection($base, $login, $password);
        $fg=new FluxGateway($con);
        $ng=new NewsGateway($con);

        $tabflux = $fg->selectAllFlux();
        foreach($tabflux as $flux){
            $i = 0;
            $ng->deleteNews($flux->getUrl());
            $xml = simplexml_load_file($flux->getUrl());
            foreach($xml->channel->item as $item){
                if($item->link != null && $item->title != null && $item->description != null && $i < $flux->getNbNews()){
                    $ng->insertNews($item->link, $item->title, $item->description,$flux->getUrl(),$item->pubDate);
                }
                $i++;
            }
        }

    }
}
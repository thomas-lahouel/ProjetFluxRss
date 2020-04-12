<?php


class ControleurUser
{
    function __construct()
    {
        global $rep, $vues;

        $tabErreur = array();
        
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        
        try{
            $action=$_REQUEST['action'];
            switch ($action){
                case NULL:
                    $this->AffPagePrinc($page);
                    break;
                case "sauthentifier":
                    $this->Sauthentifier();
                    break;
                case "afficherForm":
                    $this->AfficherForm();
                    break;
                case "afficherPage":
                    $this->AffPagePrinc($page);
                    break;
                case "rafraichir":
                    $this->updateAllNews();
                    $this->AffPagePrinc($page);
                    break;
                default: //cas d'erreur
                    $page = 1;
                    $this->AffPagePrinc($page);
                    break;
            }
        }
        catch (Exception $e){
            $tabErreur[]="Erreur inattendue";
            require ($rep.$vues['ErrorView']);
        }catch (PDOException $e){
            $tabErreur[]="Erreur base de données";
            require ($rep.$vues['ErrorView']);
        }
        exit(0);
    }

    function Sauthentifier(){
        global $rep, $vues;
        $pseudo=$_POST['txtPseudo'];
        $mdp=$_POST['txtPassword'];
        if(Validation::val_authentification($pseudo,$mdp,$tabErreur)){
            $mdl=new ModeleAdmin();
            if($mdl->connection($pseudo,$mdp)){
                $tabFlux = $mdl->ListerFlux();
                require $rep.$vues['AdminView'];
            }else{
                require $rep.$vues['ConnectionView'];
            }
        }else{
            
            $this->AfficherForm();
        }
        
        
    }

    public function AfficherForm(){
        global $rep, $vues;
        require $rep.$vues['ConnectionView'];
    }

    public function AffPagePrinc($page){
        global $rep, $vues;
        $limite=5;
        $mdl=new Modele();
        $tabNews=$mdl->getNews($page);
        $nbNews=$mdl->NbNews();
        $nbPage=ceil($nbNews[0][0] / $limite); 
        require $rep.$vues['AccueilView'];
    }

    public function updateAllNews(){
        $mdl = new modele();
        $mdl->updateNews();
    }
}
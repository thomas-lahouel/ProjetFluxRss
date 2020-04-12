<?php


class ControleurAdmin
{
    function __construct()
    {
        global $rep,$vues;

        $tabErreur=array();

        try{
            $action=$_REQUEST['action'];
            switch ($action){
                case NULL:
                    $this->ListerFlux();
                    break;
                case "ajouterFlux":
                    $this->AjouterFlux();
                    $this->ListerFlux();
                    break;
                case "supprimerFlux":
                    $this->SupprimerFlux();
                    $this->ListerFlux();
                    break;
                case "sedeconnecter":
                    $this->SeDeconnecter();
                    break;
                default:
                    $tabErreur[]="Erreur d'appel php";
                    require ($rep.$vues['ConnectionView']);
                    break;
            }
        }catch (PDOException $e){
            $tabErreur[]="Erreur de connection à la base de données";
            require ($rep.$vues['ErrorView']);
        }catch (Exception $e){
            $tabErreur[]="Erreur inattendue";
            require ($rep.$vues['ErrorView']);
        }
        exit(0);
    }


    public function SeDeconnecter(){
        $mdl=new ModeleAdmin();
        $mdl->deconnexion();
    }

    function SupprimerFlux(){
        $urlSupp=$_GET['url'];
        $m = new ModeleAdmin();
        $m->suppFlux($urlSupp);
    }


    public function ListerFlux(){
        global $rep, $vues;
        $mdl=new ModeleAdmin();
        $tabFlux=$mdl->ListerFlux();
        require ($rep.$vues['AdminView']);
    }



    function AjouterFlux(){
        $url= Nettoyer::nettoyer_string($_POST['url']);
        $description=Nettoyer::nettoyer_string($_POST['description']);
        $titre=Nettoyer::nettoyer_string($_POST['titre']);
        $nbNews=Nettoyer::nettoyer_int($_POST['nbNews']);

        $mdl=new ModeleAdmin();
        $mdl ->insererFlux($url,$description,$titre, $nbNews);
    }

    
}
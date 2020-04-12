<?php


class Validation
{   
    public static function val_authentification($nom,$mdp,&$tabErreur){
        global $rep, $vues;
        if(!isset($nom)||$nom==""){
            $tabErreur='Vous navez pas rentré de pseudo';
            $rep.$vues['ErrorView'];
            return FALSE;
        }
        elseif(!isset($mdp) || $mdp==""){
            $tabErreur='Vous navez pas rentré de mot de passe';
            $rep.$vues['ErrorView'];
            return FALSE;
        }else{
            return TRUE;
       }
    }
    
    public static function val_action($action){
        $listeActionGlobale=array('ajouterFlux', 'supprimerFlux', 'sedeconnecter','sauthentifier','afficherForm',
            'afficherPage','rafraichir','');
        if(!in_array($action, $listeActionGlobale)){
            return null;
        }
        return $action;
    }
}
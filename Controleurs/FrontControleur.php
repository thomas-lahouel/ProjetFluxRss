<?php


class FrontControleur
{

    /**
     * FrontControleur constructor.
     */
    public function __construct()
    {
        global $rep, $vues;

        $listeAction_Admin=array('ajouterFlux', 'supprimerFlux', 'sedeconnecter');
        try{
            $action = Validation::val_action($_REQUEST['action']);
            if($action === 'sedeconnecter'){
                $_SESSION=array();
            }
            $admin=ModeleAdmin::isAdmin();
            if(in_array($action, $listeAction_Admin)){
                if($admin === null){
                    require $rep.$vues['ConnectionView'];
                }
                else{
                    new ControleurAdmin();
                }
            }
            else{

                new ControleurUser();
            }
        }catch(Exception $e){
            require $rep.$vues['ErrorView'];
        }
    }
}
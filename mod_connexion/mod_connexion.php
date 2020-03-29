<?php
if(!defined ('CONSTANT') )
die ('acces interdit') ;

require_once('mod_connexion/cont_connexion.php');

try{
    $contConnexion = new ContConnexion();

    if(isset($_SESSION['monid'])){
            if (isset($_GET['action']) ) {

                $actionChoisi = htmlspecialchars($_GET['action']);

                switch ($actionChoisi) {
                    
                    case 'formConnexion':
                        $contConnexion->form_connexion();
                    break;

                    case 'deconnexion':
                        $contConnexion->deconnexion();
                    break;

                    case 'formAjoutResp':
                        $contConnexion->form_addResp();
                    break;

                    case 'inscription':
                        $contConnexion->add_responsable();
                    break;

                    case 'formEspaceMembre':
                        $contConnexion->form_espace_membre();
                        break;

                    case 'modifierResp':
                        $contConnexion->modifier_resp();
                        break;

                    default:
                        $contConnexion->form_connexion();
                    break;
                }
            }
            else{
                $contConnexion->form_connexion();
            }
    }
    elseif(isset($_GET['action']) && $_GET['action'] == 'connexionResponsable'){
        $contConnexion->connexion_responsable();
    }
    else{
        $contConnexion->form_connexion();
    }
}catch(formCoException $e){
    $messErreur = $e->getMessage();
    $page = 'formConnexion';
}
catch(formInsException $e){
    $messErreur = $e->getMessage();
    $page = 'formAjoutResp';
}
catch(formModifException $e){
    $messErreur = $e->getMessage();
    $page = 'formEspaceMembre';
}
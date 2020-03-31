<?php
if(!defined ('CONSTANT'))
die('Accès refusé !');

require_once('modules/mod_connexion/cont_connexion.php');

try {
    $contConnexion = new ContConnexion();

    if(isset($_SESSION['monid'])) {
        if (isset($_GET['action'])) {
            $action = htmlspecialchars($_GET['action']);

            switch ($action) {
                // Connexion & Déconnexion
                case 'formConnexion':
                    $contConnexion->form_connexion();
                    break;

                case 'deconnexion':
                    $contConnexion->deconnexion();
                    break;

                // Ajout de responsable
                case 'formAjoutResp':
                    $contConnexion->form_addResp();
                    break;

                case 'inscription':
                    $contConnexion->add_responsable();
                    break;

                // Espace membre
                case 'formEspaceMembre':
                    $contConnexion->form_espace_membre();
                    break;

                case 'formModifierIdResp':
                    $contConnexion->form_modifierId_resp();
                    break;

                case 'modifierIdResp':
                    $contConnexion->modifierId_resp();
                    break;

                case 'formModifierMdpResp':
                    $contConnexion->form_modifierMdp_resp();
                    break;

                case 'modifierMdpResp':
                    $contConnexion->modifierMdp_resp();
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
    elseif (!isset($_SESSION['monid']) && isset($_GET['action']) && $_GET['action'] == 'connexionResponsable') {
        $contConnexion->connexion_responsable();
    }
    else{
        $contConnexion->form_connexion();
    }
} catch(formCoException $e) {
    $messErreur = $e->getMessage();
    $page = 'formConnexion';
} catch(formInsException $e) {
    $messErreur = $e->getMessage();
    $page = 'formAjoutResp';
} catch(formModifException $e) {
    $messErreur = $e->getMessage();
    $page = 'formEspaceMembre';
}
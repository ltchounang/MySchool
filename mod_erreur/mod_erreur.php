<?php
if(!defined ('CONSTANT') )
die ('acces interdit') ;

if(!empty($messErreur)){
    $message = $messErreur;
    if(!empty($page)){
        require_once('mod_connexion/cont_connexion.php');
        $contConnexion = new ContConnexion();
    
        require_once('mod_etudiant/controlleur/cont_etudiant.php');
        $contEtudiant = new ContEtudiant();

        switch($page){

            case 'formConnexion':
                $contConnexion->form_connexion();
            break;

            case 'formAjoutResp':
                $contConnexion->form_addResp();
            break;

            case 'formAjoutEtud':
                $contEtudiant->form_addEtud();
            break;

            case 'formModifEtud':
                $contEtudiant->form_updateEtud();

            case 'formEspaceMembre':
                $contConnexion->form_espace_membre();
                break;

            case 'listeGroupeEtud':
                $contEtudiant->liste_groupe_etud();
                break;
            break;
        }

    }
    require_once('mod_erreur/vue_erreur/popUp.php');
}
<?php
if(!defined ('CONSTANT') )
    die ('acces interdit') ;

if(!empty($messErreur)){
    $message = $messErreur;
    if(!empty($page)){
        require_once('modules/mod_connexion/cont_connexion.php');
        $contConnexion = new ContConnexion();
    
        require_once('modules/mod_etudiant/controlleur/cont_etudiant.php');
        $contEtudiant = new ContEtudiant();

        require_once('modules/mod_etablissement/cont_etablissement.php');
        $contEtablissement = new ContEtablissement();

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
            break;
            
            case 'formEspaceMembre':
                $contConnexion->form_espace_membre();
                break;
            
            case 'form_addEtab':
                $contEtablissement->form_addEtab();
                 break;

             case 'listeGroupeEtud':
                $contEtudiant->liste_groupe_etud();
                break;
            
            case 'importer_fichier':
                $contEtudiant->importer_fichier();
            break;
        }

    }
    require_once('modules/mod_erreur/vue_erreur/popUp.php');
}
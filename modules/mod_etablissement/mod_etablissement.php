<?php
if(!defined ('CONSTANT') )
    die ('acces interdit') ;

require_once('modules/mod_etablissement/cont_etablissement.php');
/*
peut servir si on veut gerer les differents etudiants présent dans les etablissements
*/
try{
        
    $contEtablissement = new ContEtablissement();

    if(isset($_SESSION['monid'])){
        if (isset($_GET['action']) ) {

            $actionChoisi = htmlspecialchars($_GET['action']);

            switch ($actionChoisi) {

                case 'formAjoutEtab':
                    $contEtablissement->form_addEtab();
                break;

                case 'ajouterEtablissement':
                    $contEtablissement->add_etablissement();
                break;

                case 'listeEtablissement':
                    $contEtablissement->liste_Etablissement();
                break;

                case 'detailEtab':
                    $contEtablissement->detail_Etab();
                break;

                case 'formModifEtablissement':
                    $contEtablissement->form_updateEtab();
                break;

                case 'modifierEtab':
                    $contEtablissement->update_EtabBD();
                break;

                case 'suppEtablissement':
                    $contEtablissement->delete_etab();
                break;

                default:
                break;
            }
        }
        else{
        }
    }
}
catch(formAjoutEtabException $e){
    $messErreur = $e->getMessage();
    $page = 'form_addEtab';
}
catch(formModifEtud $e){
    $messErreur = $e->getMessage();
    $page = 'formModifEtud';
}

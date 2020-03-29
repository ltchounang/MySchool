<?php
if(!defined ('CONSTANT') )
    die ('acces interdit') ;

require_once('mod_etudiant/controlleur/cont_etudiant.php');

try{
        
    $contEtudiant = new ContEtudiant();

    if(isset($_SESSION['monid'])){
        if (isset($_GET['action']) ) {

            $actionChoisi = htmlspecialchars($_GET['action']);

            switch ($actionChoisi) {

                case 'formAjoutEtud':
                    $contEtudiant->form_addEtud();
                break;
                
                case 'importer_fichier':
                        
                    $contEtudiant->importer_fichier();
                    break;
    
                case 'validation_fichier':
                    
                    $contEtudiant->validation_fichier();
                    break;
                case 'validation_mail':
                    $contEtudiant->validation_mail();
                    break;
                    
                case 'ajouterEtudiant':
                    
                    $contEtudiant->add_Student();
                break;

                case 'listeEtudiant':
                    $contEtudiant->list_Student();
                break;

                case 'formModifEtud':
                    $contEtudiant->form_updateEtud();
                break;

                case 'modifierEtudiant':
                    $contEtudiant->update_Etud();
                break;

                case 'suppEtudiant':
                    $contEtudiant->delete_student();
                break;

                default:
                    $contEtudiant->list_Student();
                break;
            }
        }
        else{
            $contEtudiant->list_Student();
        }
    }
}catch(formAjoutEtudException $e){
    $messErreur = $e->getMessage();
    $page = 'formAjoutEtud';
}
catch(formModifEtudException $e){
    $messErreur = $e->getMessage();
    $page = 'formModifEtud';
}

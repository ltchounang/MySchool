
<?php
if(!defined ('CONSTANT') )
    die ('acces interdit') ;

require_once('modules/mod_etudiant/controlleur/cont_etudiant.php');

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
                    if (isset($_GET['idGroupe']))
                        $idGroupe = $_GET['idGroupe'];
                    else
                        $idGroupe = 0;
                        
                    $contEtudiant->list_Student($idGroupe);

                break;

                case 'formModifEtud':
                    $contEtudiant->form_updateEtud();
                break;

                case 'modifierEtudiant':
                    $contEtudiant->update_Etud();
                break;

                case 'suppEtabDeEtudiant':
                    $contEtudiant->delete_EtabDeEtudiant();
                break;

                case 'suppEtudiant':
                    if (isset($_GET['idGroupe'])) {
                        $id = $_GET['idGroupe'];
                        $contEtudiant->delete_student($id);
                        }
                break;

                case 'listeGroupeEtud':
                    $contEtudiant->liste_groupe_etud();
                    break;

                case 'creerGroupe':
                    $contEtudiant->creer_groupe();
                    break;

                case 'supprimerGroupe':
                    if (isset($_GET['idGroupe'])) {
                        $contEtudiant->supprimer_groupe($_GET['idGroupe']);
                    }
                    break;
                default:
                    $contEtudiant->list_Student(0);

                break;
            }
        }
        else{
            $contEtudiant->list_Student(0);
        }
    }
}catch(formAjoutEtudException $e){
    $messErreur = $e->getMessage();
    $page = 'formAjoutEtud';
}catch(formImportException $e){
    $messErreur = $e->getMessage();
    $page = 'importer_fichier';
}
catch(formModifEtudException $e){
    $messErreur = $e->getMessage();
    $page = 'formModifEtud';
}
catch(formGroupeException $e){
    $messErreur = $e->getMessage();
    $page = 'listeGroupeEtud';
}
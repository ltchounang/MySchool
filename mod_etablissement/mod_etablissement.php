<?php
if(!defined ('CONSTANT') )
    die ('acces interdit') ;

require_once('mod_etablissement/controlleur/cont_etablissement.php');
/*
peut servir si on veut gerer les differents etudiants présent dans les etablissements
*/
try{
        
    $contEtablissement = new ContEtablissement();

    if(isset($_SESSION['monid'])){
        if (isset($_GET['action']) ) {

            $actionChoisi = htmlspecialchars($_GET['action']);

            switch ($actionChoisi) {

                case '':
                break;

                default:
                break;
            }
        }
        else{
        }
    }
}catch(Exception $e){
    $messErreur = $e->getMessage();
    $page = 'listeEtud';
}

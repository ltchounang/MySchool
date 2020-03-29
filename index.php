<?php
//sécurité : on definie une constante pour bien obliger les utilisateur à passer par l'index
if(!isset($_SESSION['login']) && !defined('CONSTANT')){
    session_start();
    define('CONSTANT',NULL);
}

class formAjoutEtudException extends Exception {};
class formModifEtudException extends Exception {};
class formCoException extends Exception {};
class formInsException extends Exception {};
class formModifException extends Exception {};
class formAjoutEtabException extends Exception {};
class formModifEtudEtabException extends Exception {};

try {
    if(isset($_SESSION['monid'])){
        if(isset($_GET['module']) ){
            if($_GET['module']=='etudiant'){
                require_once('mod_etudiant/mod_etudiant.php');
            }
            elseif($_GET['module']=='etablissement'){
                require_once('mod_etablissement/mod_etablissement.php');
            }
            elseif($_GET['module']=='connexion'){
                require_once('mod_connexion/mod_connexion.php');
            }
            else{
                echo 'module inconnu par où êtes vous passé ?';
            }
        }
        else{
            require_once('mod_connexion/mod_connexion.php');
        }
    }
    else{
        require_once('mod_connexion/mod_connexion.php');
    }
}
catch(Exception $e){
    $messErreur = $e->getMessage();
}
finally {
    require_once('mod_erreur/mod_erreur.php');
}
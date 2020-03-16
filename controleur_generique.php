<?php
require_once 'modele_generique.php';
require_once 'vue_generique.php';

class ContGenerique {// cette classe possède toutes les méthodes de controleur communes à plusieurs modules

    protected $v;
    protected $m;

    public function __construct () {
       
        $this->v = new VueGenerique();
        $this->m = new ModGenerique();//require toujours obligatoire
    }

    //compare les valeurs de jetons les unes aux autres lorsque le formulaire est soumis
    public function verifyFormToken($form) {
    
    // vérifie si une session est démarrée et qu'un jeton est transmis, sinon renvoie une erreur
    if(!isset($_SESSION[$form.'_token'])) { 
        return false;
        }
    
    // vérifie si le formulaire est envoyé avec un jeton dedans
    if(!isset($_POST['token'])) {
        return false;
        }
    
    // compare les jetons les uns part rapport aux autres si se sont toujours les mêmes
    if ($_SESSION[$form.'_token'] !== $_POST['token']) {
        return false;
        }
    
    return true;
    }
    
   
}
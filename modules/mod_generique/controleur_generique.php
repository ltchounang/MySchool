<?php
require_once 'modules/mod_generique/modele_generique.php';

class ContGenerique {// cette classe possède toutes les méthodes communes à tous les controleurs

    protected $m;

    public function __construct () {
       
        $this->m = new ModeleGenerique();
    }

    public function generateFormToken($form) {
    
        // génère un token d'une valeur unique 
        $token = md5(uniqid(microtime(), true));  
        
        // Ecrit le jeton généré dans la variable de session pour le comparer au champ caché lors de l'envoi du formulaire
        $_SESSION[$form.'_token'] = $token; 
        
        return $token;
      
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
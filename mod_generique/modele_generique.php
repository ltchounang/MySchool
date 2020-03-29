<?php

class ModeleGenerique {

    static protected $bdd;

    public function __construct(){
        self::initConnexion();
    }
    
    public static function initConnexion(){
       require('connexionBD.php');
       self::$bdd=$bdG;
    }

    public function generateFormToken($form) {
    
        // génère un token d'une valeur unique 
        $token = md5(uniqid(microtime(), true));  
       
       // Ecrit le jeton généré dans la variable de session pour le comparer au champ caché lors de l'envoi du formulaire
       $_SESSION[$form.'_token'] = $token; 
       
       return $token;
      
      }

}

?>
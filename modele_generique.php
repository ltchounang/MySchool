<?php
require_once('modules/mod_connexion/modele_connexion.php');

class ModGenerique extends ModeleConnexion{
    
    public function __construct(){
        
    }
    
    public static function recupBD(){
        return self::$bdd ;
    }

}
?>
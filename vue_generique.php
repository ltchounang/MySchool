<?php

class VueGenerique {
    
    public function __construct(){
        ob_start();
    }
    public static function getAffichage(){
        //return ob_get_contents() ;
        return ob_get_clean() ;//lit le contenu du tempon et l'efface. On peut récuperer ce contenu.
    }
      // génère un nouveau jeton pour le superglobal $ _SESSION et le place dans un champ caché

    public function generateFormToken($form) {
    
        // génère un token d'une valeur unique 
        $token = md5(uniqid(microtime(), true));  
       
       // Ecrit le jeton généré dans la variable de session pour le comparer au champ caché lors de l'envoi du formulaire
       $_SESSION[$form.'_token'] = $token; 
       
       return $token;
      
      }

}
?>

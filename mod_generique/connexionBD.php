
<?php

 try
 {
    $bdG = new PDO('mysql:host=localhost;dbname=gestionetudiant;charset=utf8', 'user', '8C4jpJwd0jIWiDQJ');  
     //$bdGestion->setAttribute(PDO :: ATTR_ERRMODE , PDO :: ERRMODE_EXCEPTION ); //active l'affichage des erreurs
 }
 catch(Exception $e)
 {
         die('Erreur : '.$e->getMessage());
         echo "Erreur : impossible de se connecter à la base de donnée";

 }
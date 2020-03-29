<?php

 try
 {
    $bdG = new PDO('mysql:host=localhost;dbname=gestionetudiant;charset=utf8', 'root', 'root');  
     //$bdGestion->setAttribute(PDO :: ATTR_ERRMODE , PDO :: ERRMODE_EXCEPTION ); //active l'affichage des erreurs
 }
 catch(Exception $e)
 {
         die('Erreur : '.$e->getMessage());
         echo "Erreur : impossible de se connecter à la base de donnée";
 }
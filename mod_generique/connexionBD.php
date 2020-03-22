<?php

 try
 {
     $bdG = new PDO('mysql:host=localhost;dbname=id12990171_db_myschool;charset=utf8', 'id12990171_nimportequoi', 'Myschool2020'); 
     //$bdGestion->setAttribute(PDO :: ATTR_ERRMODE , PDO :: ERRMODE_EXCEPTION ); //active l'affichage des erreurs
 }
 catch(Exception $e)
 {
         die('Erreur : '.$e->getMessage());
         echo "Erreur : impossible de se connecter à la base de donnée";
 }
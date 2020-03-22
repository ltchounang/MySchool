
<?php ob_start(); ?>

<?php require_once 'import.php'; 
echo '<article id="articleGestion" >';
    if($etat){
        echo 'le format de votre fichier doit etre de type .csv et non '.$extension;
       	echo '<a href="index.php?module=etudiant&action=importer_fichier"><button>reesayer</button></a>';
    }else{
        echo 'erreur d\'importation';
        echo '<a href="index.php?module=etudiant&action=importer_fichier"><button>reesayer</button></a>';
    }
    echo '</article>';
 $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

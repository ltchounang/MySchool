
<?php ob_start(); ?>

<?php require_once 'import.php'; 
echo '<article id="articleGestion" >';
    
    if($etat==1){
        echo 'les attributs suivants sont mal <strong>(faites attention au espaces au debut et a la fin des attributs)</strong> entrés ou n\'existe pas : ';
        for($i=0;$i<count($attribut_faux);$i++){
            echo '</br> -'.$attribut_faux[$i];
        }
       	echo '</br><a href="index.php?module=etudiant&action=importer_fichier"><button>reesayer</button></a>';
    }else if ($etat==2) {
        echo 'votre fichier ne commence pas par la case A1';
        echo '<a href="index.php?module=etudiant&action=importer_fichier"><button>reesayer</button></a>';
    
    }else if($etat==3){
        echo 'le format de votre fichier doit etre de type .csv et non '.$extension;
       	echo '<a href="index.php?module=etudiant&action=importer_fichier"><button>reesayer</button></a>';
    }else if($etat==4){
        echo 'erreur d\'importation';
        echo '<a href="index.php?module=etudiant&action=importer_fichier"><button>reesayer</button></a>';
    }
    echo '</article>';
 $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

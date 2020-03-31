<?php ob_start(); ?>

<?php require_once 'import.php';?> 
<article id="articleGestion" class="col-xs-10 col-sm-10 data-spy="scroll" class="scrollspy-example z-depth-1 mt-4" data-offset="0" style="background-color: blanchedalmond; scrollbar-ripe-malinka">
        <p>Inserer avec succée</p>
        <a href="index.php?module=etudiant&action=liste_etudiant"><button>Retour à l'accueil</button></a>
        </article>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

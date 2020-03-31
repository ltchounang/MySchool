
<?php ob_start(); ?>

<div class="container-fluid" >
    <div class="row">
        <div class="">
            <a class="btn optionMenu" href="index.php?module=etablissement&action=formAjoutEtab" > ajouter etablissement <img src="bootstrap-icons/icons/plus.svg" alt="+" width="32" height="32" title="Plus"> </a>
        </div>
        <div class="">
            <p id="nomPage">Etablissement</p>
        </div>
    </div>
</div>

<?php
if(!empty($listeEtablissement)){
    $tab = $listeEtablissement->fetchAll();
    foreach ($tab as $donnees) {
?>
<?php require('etablissement.php'); //on affiche les informations de l'etudiant à chaque fois?>

<?php
    }
}  
?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
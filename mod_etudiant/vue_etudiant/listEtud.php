
<?php ob_start(); ?>

<?php require('mod_composant/vue_composant/barreRechercheEtud.php'); ?>

<div id="resultat-recherche"><!-- contient la liste en voyer --> 

<?php
if(!empty($listEtudiant)){
    $tab = $listEtudiant->fetchAll();
    foreach ($tab as $donnees) {
        if($donnees['photoEtud'] == NULL)$donnees['photoEtud'] = 'bootstrap-icons/icons/person.svg' ;
        if($donnees['numApogee'] == '0')$donnees['numApogee'] = "Non renseigné";
        if($donnees['dateNaiss'] == '0000-00-00')$donnees['dateNaiss'] = "Non renseigné";
        if($donnees['telEtud'] == '0')$donnees['telEtud'] = "Non renseigné";
        if($donnees['courriel'] == NULL)$donnees['courriel'] = "Non renseigné";
        if($donnees['adr1'] == NULL)$donnees['adr1'] = "Non renseigné";
        if($donnees['situationActuelle'] == NULL)$donnees['situationActuelle'] = "Non renseigné";
        if($donnees['anneePromotion'] == NULL)$donnees['anneePromotion'] = "Non renseigné";
?>
<?php require('etudiant.php'); //on affiche les informations de l'etudiant à chaque fois?>

<?php
    }
}  
?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

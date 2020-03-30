


<?php if(empty($detail)){ob_start();require('mod_composant/vue_composant/barreRechercheEtud.php');} ?>


<?php 
if (!empty($idGroupe) && $idGroupe != 0)
    echo '<h1 style="text-align:center;">Groupe étudiant : '.$nomGroupe['nomGroupe'].'</h1>';
 ?>

<div id="resultat-recherche"><!-- contient la liste en voyer --> 

<?php

$i = 0;
if(!empty($listEtudiant)){
    $tab = $listEtudiant->fetchAll();
    foreach ($tab as $donnees) {
        if($donnees['photoEtud'] == NULL)$donnees['photoEtud'] = 'bootstrap-icons/icons/person.svg' ;
        if($donnees['numApogee'] == '0')$donnees['numApogee'] = "Non renseigné";
        if($donnees['dateNaiss'] == '0000-00-00')$donnees['dateNaiss'] = "Non renseigné";
        if($donnees['telEtud'] == '0')$donnees['telEtud'] = "Non renseigné";
        if($donnees['courriel'] == NULL)$donnees['courriel'] = "Non renseigné";
        if($donnees['adr1'] == NULL)$donnees['adr1'] = "Non renseigné";
        if($donnees['adr2'] == NULL)$donnees['adr2'] = "Non renseigné";
        if($donnees['situationActuelle'] == NULL)$donnees['situationActuelle'] = "Non renseigné";
        if($donnees['anneePromotion'] == NULL)$donnees['anneePromotion'] = "Non renseigné";
?>
<?php 
        require('etudiant.php'); //on affiche les informations de l'etudiant à chaque fois
        $i++;
    }

    /*for ($i = 1; $i<=$nbPagesTotales; $i++) {
        if ($i == $page)
            echo $i . ' ';
        else
            echo '<a href="index.php?module=etudiant&action=listeEtudiant&page='.$i.'">'.$i.'</a>' . ' ';
    }*/


    if(empty($detail)){
        if (!isset($_GET['page']) or $_GET['page'] == 1) {
            echo '<a id="lienImgD" onmouseover="changeImgD()" onmouseleave="defaultImgD()" href="index.php?module=etudiant&action=listeEtudiant&page=2" title="page suivante"><img id="flecheD" src="ressources/imgSite/logos/gestion/suivant.png" /></a>';
            
        }
        else if ($_GET['page'] == $nbPagesTotales){
            echo '<a onmouseover="changeImgG()" onmouseleave="defaultImgG()" href="index.php?module=etudiant&action=listeEtudiant&page='.($_GET['page']-1) .'" title="page précèdente"><img id="flecheG" src="ressources/imgSite/logos/gestion/prec.png" /></a>';
        }
        else {
            echo '<a id="lienPage1" href="index.php?module=etudiant&action=listeEtudiant&page=1">Page 1 </a>';
            echo '<a onmouseover="changeImgG()" onmouseleave="defaultImgG()" href="index.php?module=etudiant&action=listeEtudiant&page='.($_GET['page']-1) .'" title="page précèdente"><img id="flecheG" src="ressources/imgSite/logos/gestion/prec.png" /> </a>';
            echo ' ' . $_GET['page'] .' ';
            echo '<a onmouseover="changeImgD()" onmouseleave="defaultImgD()" href="index.php?module=etudiant&action=listeEtudiant&page='.($_GET['page']+1) .'" title="page suivante"><img id="flecheD" src="ressources/imgSite/logos/gestion/suivant.png" /></a>';
            echo '<a id="lienDernierePage" href="index.php?module=etudiant&action=listeEtudiant&page='. $nbPagesTotales .'"> Page ' .$nbPagesTotales . ' </a>';
        }
    }


}
?>

</div>

<?php if(empty($detail)){$content = ob_get_clean();require('template.php'); }?>


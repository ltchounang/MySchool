<?php $title = "Groupe étudiants"; ?>

<?php ob_start(); ?>
    
<?php require('form_ajout_groupe.php'); 
        require ('import.php');
    ?>

<div class="container">

<?php 
if (!empty($listeGroupe)) {
    $liste = $listeGroupe->fetchAll();
    for ($i = 0; $i<count($liste); $i++){
        $nbEtud = $mod->nb_etud_dans_groupe($liste[$i]['idGroupe']);
        if ($i >= 3 and $i%3==0)
            echo '</div>';

        if ($i %3==0) {
            echo '<div class="row">';
        }
        echo  '<a href="index.php?module=etudiant&action=listeEtudiant&idGroupe='.$liste[$i]['idGroupe'].'"><div class="col-sm shadow-sm groupeEtud">'.
                        '<span class="lienGroupes">'.$liste[$i]['nomGroupe'] . '</span>'. '<span class="lienGroupes2">'.$nbEtud.'</span>'. '<a id="supprGroupe" href="index.php?module=etudiant&action=supprimerGroupe&idGroupe='.$liste[$i]['idGroupe'].'">X</a>'
                   .'</div></a>';
    }
}
?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
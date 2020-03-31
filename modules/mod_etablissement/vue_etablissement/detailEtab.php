<?php $title = 'formulaire d\'ajout d\'établissement'; ?>

<?php ob_start(); ?>
    <div class="container-fluid etablissement" >
        <div class="row" style="padding-top:2%;">

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                <span> Type : </span><label > <?=$typeEtab?> </label>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6  ">
                    <span>Nom : </span><label ><?=$nomEtab?></label></br>
            </div>
                 
        </div>
    </div>
Liste de ses Etudiants :
<?=require('modules/mod_etudiant/vue_etudiant/listEtud.php');?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
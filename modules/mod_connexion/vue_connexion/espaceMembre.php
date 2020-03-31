<?php $title = "Espace membre";
ob_start(); ?>

<div class="row">
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 card-body">
        <img id="photoEspaceMembre" src="bootstrap-icons/icons/person.svg">
    </div>

    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 card-body">
        <div class="container-fluid">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <strong> Identifiant : <?=$identifiantResp?></strong><br/>
                <a href="index.php?module=connexion&action=formModifierIdResp"><strong> Changer d'identifiant </strong><br/>
                <a href="index.php?module=connexion&action=formModifierMdpResp"><strong> Changer de mot de passe </strong></a>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); 
require('template.php'); ?>
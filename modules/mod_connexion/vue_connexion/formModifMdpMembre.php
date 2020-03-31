<?php $title = "Formulaire modifier mot de passe";
ob_start(); ?>
    
<form class="text-center border border-light p-5" action="index.php?module=connexion&action=modifierMdpResp" method="POST">

    <p class="h4 mb-4"> Modifier votre mot de passe </p>

    <input type="password" class="form-control mb-4" name="mdp" placeholder="Ancien mot de passe" required>

    <input type="password" class="form-control mb-4" name="nouvMdp" placeholder="Nouveau mot de passe" required>

    <input type="password" class="form-control mb-4" name="confirmNouvMdp" placeholder="Confirmation du mot de passe" required>

    <button class="btn btn-light btn-block my-4" type="submit"> Valider </button>

</form>

<?php $content = ob_get_clean(); 
require('template.php'); ?>
<?php $title = "Formulaire modifier identifiant"; 
ob_start(); ?>

<form class="text-center border border-light p-5" action="index.php?module=connexion&action=modifierIdResp" method="POST">

    <p class="h4 mb-4"> Modifier votre identifiant </p>

    <input type="identifiant" name="idResp" class="form-control mb-4" placeholder="Nouvel identifiant" required>

    <input type="password" class="form-control mb-4" name="mdp" placeholder="Mot de passe" required>

    <button class="btn btn-light btn-block my-4" type="submit"> Valider </button>

</form>

<?php $content = ob_get_clean();
require('template.php'); ?>
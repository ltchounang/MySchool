<?php $title = 'Formulaire de connexion';
require_once('import.php');
?>

<form class="text-center bg-white border border-light p-5 w-50 mx-auto rounded-sm" action="index.php?module=connexion&action=connexionResponsable" id="formConnect" method="POST">

    <p class="h4 mb-4"> Connexion </p>
    
    <!-- Identifiant -->
    <input type="text" name="identifiant" class="form-control mb-4" placeholder="Identifiant" required>

    <!-- Password -->
    <input type="password" name="mp" class="form-control mb-4" placeholder="Mot de passe" required>

    <input type="hidden" name="token" value="<?=$newToken?>">

    <!-- Bouton de connexion -->
    <button class="btn btn-dark bg-info btn-block my-4" type="submit"> Connexion </button>

</form>
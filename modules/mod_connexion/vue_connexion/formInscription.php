<?php ob_start();
require_once('import.php'); ?>

<form class="text-center border border-light p-5" action="index.php?module=connexion&action=inscription" method="POST">

    <p class="h4 mb-4"> Ajouter un responsable </p>

	<!-- Pseudo -->
	<input type="text" name="identifiant" class="form-control mb-4" placeholder="Identifiant" required>

	<!-- Password -->
	<input type="password" name="mp" class="form-control mb-4" placeholder="Le  mot de passe doit contenir au moins 8 caractères" minlength="8" required>

	<!-- Confirmation du password -->
	<input type="password" name="mp_confirm" class="form-control mb-4" placeholder="Confirmation du mot de passe" required>

    <input type="hidden" name="token" value="<?=$newToken?>">

    <button class="btn btn-dark bg-info btn-block my-4" type="submit"> Créer le compte </button>

</form>

<?php $content = ob_get_clean();
require('template.php'); ?>
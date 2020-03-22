<?php ob_start(); ?>

<?php require_once 'import.php'; ?>

<form class="text-center border border-light p-5" action="index.php?module=connexion&action=inscription" method="post">

    <p class="h4 mb-4">Ajouter un responsable</p>

      <!-- Pseudo -->
      <input type="text" name="identifiant" class="form-control mb-4" placeholder="identifiant" required><span class="validity"></span>

      <!-- Password -->
      <input type="password" name="mp" class="form-control mb-4" placeholder="Le  mot de passe doit contenir au minimum 4 caractères" minlength="4" required><span class="validity"></span>

      <!-- Password -->
      <input type="password" name="mp_confirm" class="form-control mb-4" placeholder="Confirmer mot de passe" required><span class="validity"></span>

    <input type="hidden" name="token" value="<?=$newToken?>">

    <button class="btn btn-dark bg-info btn-block my-4" type="submit">Créer le compte</button>

</form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
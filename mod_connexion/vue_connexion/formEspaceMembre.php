<?php $title = "Espace membre"; ?>

<?php ob_start(); ?>
    
    <!-- Default form login -->
<form class="text-center border border-light p-5" action="index.php?module=connexion&action=modifierResp&idMembre=<?=$identifiantResp?>" method="post">

    <p class="h4 mb-4">Modifier vos informations</p>

    <!-- Email -->
    <input type="identifiant" id="defaultLoginFormEmail" name="idResp1" value="<?=$identifiantResp?>" class="form-control mb-4" placeholder="Nouvel identifiant">

    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" name="modifPw" placeholder="Ancien mot de passe">

    <!-- Password -->
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" name="modifPw1" placeholder="Nouveau mot de passe">

    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" name="modifPw2" placeholder="Confirmez votre nouveau mot de passe">
    <!-- Sign in button -->
    <button class="btn btn-light btn-block my-4" type="submit">Modifier</button>
</form>
<!-- Default form login -->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
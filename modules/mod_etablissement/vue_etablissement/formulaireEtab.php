<?php $title = 'formulaire d\'ajout d\'établissement'; ?>

<?php ob_start(); ?>
<form class="text-center border border-light p-5" action="index.php?module=etablissement&action=<?=$action?>" method="post" >
    <div class="container-fluid etablissement" >
        <div class="row" style="padding-top:2%;">

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                <span> Type : </span><input type="text" name="typeEtab" value="<?=$typeEtab?>" required>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6  ">
                    <span>Nom : </span><input name="nomEtab" type="text" value="<?=$nomEtab?>" placeholder="nom de l'etablissement" class="" required></br>
            </div>
        
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 " style="padding-top:2%;">
            Après l'ajout vous voulez : 
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="rester"
                    name="pageRetour" value="<?=$action?>">
                    <label class="custom-control-label" for="rester" >rester sur cette page</label>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="lister"
                name="pageRetour" value="lister" checked>
                <label class="custom-control-label" for="lister">retour à la liste</label>
            </div>

            <button type="submit" class="btn btn-outline-info  btn-block my-4 waves-effect z-depth-0" > Soumettre </button>
        </div>            
        </div>
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
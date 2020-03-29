<?php $title = 'formulaire d\'ajout'; ?>

<?php ob_start(); ?>
<form class="text-center border border-light p-5" action="index.php?module=etudiant&action=<?=$action?>" method="post" enctype="multipart/form-data">
<div  class="container-fluid" id="formCreate" style=""> 
        <div class="container">
            <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <h2 class=""> Etudiant </h2>
        </div>

        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                <img id="photoEtud" class="photoEtud" src='<?=$photoEtud?>' >
            </div>
        <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5 " style="margin-top:5%;">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="img" id="inputGroupFile01"
                aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">importer photo</label>
            </div>
        </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  ">
        <div class="md-form conteneurInputEtud">

            <span>prénom : </span><input type="text" name="prenom" id="prenom" value="<?=$prenom?>" placeholder="prenom" required><span class="validity"></span>
        </div>

         <div class="md-form conteneurInputEtud">

            <span>nom de famille : </span><input type="text" id="nom" name="nom" value="<?=$nomEtud?>" placeholder="nom" required><span class="validity"></span>
        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  ">

        <div class="md-form conteneurInputEtud">
            
            <span>Numéro Apogee : </span><input type="number" placeholder="numéro apogee" value="<?=$numApo?>" name="numApogee" style="width:16%;" name="numApogee"
                        min="0" max="100000">

            <span>Date Naissance : </span><input type="date" value="<?=$dateNaiss?>" name="dateNaiss"
                            min="2050-00-00" >
        </div>

        <div class="md-form conteneurInputEtud">

        <span>Annee promotion : </span><input type="text" value="<?=$AnneePromo?>" name="anneePromotion"  placeholder="annee promotion" >
        </div>

         <div class="md-form conteneurInputEtud">
         <span>Mail : </span><input type="text" id="mail" name="courriel" value="<?=$courriel?>"  id="mail" placeholder="email@example.com">

           </div>

        <div class="md-form conteneurInputEtud" >

        <span>Numéro de téléphone : </span><input type="text" id="numero" name="tel" value="<?=$tel?>" placeholder="numero" ><span class="validity"></span>
           </div>

        <div class="conteneurInputEtud shadow-textarea">
          <label for="info"> Adresse 1</label>
          <textarea class="form-control z-depth-1" name="adr1" rows="3" class="infos" value="<?=$adrr1?>" placeholder="adresse 1" ></textarea>
        </div>

        <div class="conteneurInputEtud shadow-textarea">
          <label  for="info">Adresse 2 </label> <span id="adresse2" class="btn btn-dark boutonAjout" >+</span>
          <textarea id="contenuAdresse2" class="form-control z-depth-1" name="adr2" value="<?=$adrr2?>" style="display:none;" rows="3" placeholder="adresse 2" ></textarea>
        </div>

        <div class="conteneurInputEtud shadow-textarea">
          <label  for="info">Situation actuelle </label> <span id="situationActuelle" class="btn btn-dark boutonAjout" >+</span>
          <textarea id="contenuSituationActuelle" name="situationActuelle" value="<?=$situationActu?>" class="form-control z-depth-1" style="display:none;" rows="3" class="infos" placeholder="situation actuelle" ></textarea>
        </div>

        <div  id="formEtab" class="md-form conteneurInputEtud" >
           <span  > Ajouter un etablissement </span> <span id="suppEtab" class="btn btn-dark boutonAjout" >-</span>
            <span id="ajoutEcole" typeEtab="ecole" class="ajoutEtab btn btn-dark boutonAjout" >école +</span>
            <span id="ajoutEntreprise" typeEtab="entreprise" class="ajoutEtab btn btn-dark boutonAjout" >entreprise +</span>
            
        </div>
        <div class="md-form " >

<!-- on affiche les etablissments de l'etudiant si on est entrain de le modifier -->
<?php
if(!empty($etablissements)){
    $tab = $etablissements->fetchAll();
    $nbEtab = 1;
    foreach ($tab as $donnees) {
        require 'mod_etablissement/vue_etablissement/formEtab.php';
        $nbEtab ++;
    }
}

?>
        </div>

    Après l'ajout vous voulez : 
   <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="rester"
        name="pageRetour" value="<?=$action?>" checked>
        <label class="custom-control-label" for="rester" >rester sur cette page</label>
    </div>

    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="lister"
        name="pageRetour" value="listeEtud">
        <label class="custom-control-label" for="lister" >retour à la liste</label>
    </div>

 <button type="submit" class="btn btn-outline-info  btn-block my-4 waves-effect z-depth-0" > Soumettre </button>
  
    </div>
</form>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
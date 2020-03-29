    <div class="col-md-12 shadow-sm lighten-4" id="divsEtud">
        <div class="container-fluid">
            <div class="row">
            
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 card-body">
                    <img class="photoEtud" name="img" src='<?=$donnees['photoEtud']?>' >
                    <p style=""> N° : <?=$donnees['numApogee']?></p>
                </div>

                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 card-body">
                    <div class="container-fluid">
                        <div class="row" style="">

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                                <strong>Nom : <span class="text-uppercase"><?=$donnees['nomEtud']?></span></strong> <br />
                                <strong>Date de naissance : <?=$donnees['dateNaiss']?></strong> <br />
                                <strong>Année de promotion : <?=$donnees['anneePromotion']?></strong> <br />
                                
                            </div>
                        
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                                <strong>Prénom : <?=$donnees['prenomEtud']?></strong> <br />
                                <p class="card-text">Courriel : <?=$donnees['courriel']?></p>
                                <p class="card-text">Numéro de téléphone : <?=$donnees['telEtud']?></p>
                            </div>   

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style="">
                                <p class="card-text">Adresse : <?=$donnees['adr1']?></p>
                                <p class="card-text">Situation actuelle : <?=$donnees['situationActuelle']?></p>
                            </div>

                        </div> 
                    </div>
                </div>

                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 card-body">
                    <a class=" btn optionMenu " href="index.php?module=etudiant&action=formModifEtud&idEtud=<?=$donnees['idEtud']?>"  ><img src="bootstrap-icons/icons/pencil.svg" alt="+" width="32" height="32" title="Plus"> </a>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 card-body">
                    <a class=" btn optionMenu " href="index.php?module=etudiant&action=suppEtudiant&idEtud=<?=$donnees['idEtud']?>" ><img  src="bootstrap-icons/icons/trash-fill.svg" alt="+" width="32" height="32" title="Plus"> </a>
                </div>

            </div>
        </div>
    </div> 
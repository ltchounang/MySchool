
    <div id="etud<?=$donnees['idEtud']?>" class="col-md-12 shadow-sm lighten-4" data-toggle="modal" id="divsEtud" >
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
                    <a id="boutonModif" class=" btn optionMenu " href="index.php?module=etudiant&action=formModifEtud&idEtud=<?=$donnees['idEtud']?>"  ><img src="bootstrap-icons/icons/pencil.svg" alt="+" width="32" height="32" title="Plus"> </a>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 card-body">

                <?php if($idGroupe == 0){
                    echo '<button class="suppEtud btn optionMenu " value="'.$donnees['idEtud'].'"><img  src="bootstrap-icons/icons/trash-fill.svg" alt="+" width="32" height="32" title="trash-fill"> </a>';
                }
                else{
                    echo '<a class=" btn optionMenu " href="index.php?module=etudiant&action=suppEtudiant&idEtud='.$donnees['idEtud'].'&idGroupe='.$idGroupe.'" ><img  src="bootstrap-icons/icons/trash-fill.svg" alt="+" width="32" height="32" title="Plus"> </a>';
                }
                ?>
                </div>
                                <!-- Button trigger modal -->
                
                <?php

               $basicExampleModal = 'basicExampleModal' . $i // obligatoire pour éviter d'afficher le même étudiant à chaque fois, sinon il fait tjrs appel au même modal (car le même id qui ne changeait jamais)
                ?>
               <button type="button" id="boutonDet" class="details btn" value="<?=$donnees['idEtud']?>" data-toggle="modal" title="cliquez pour avoir plus de détails" <?php echo 'data-target=#' . $basicExampleModal?>>
                  Plus de détails
                </button>


                <!-- Modal -->
                <div class="modal fade" <?php echo "id=".$basicExampleModal?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div  class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">N° Apogée : <?=$donnees['numApogee']?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!-- Afficher tous les détails de l'étudiant -->
                        <div><img class="photoEtudBis" name="img" src='<?=$donnees['photoEtud']?>' ></div>

                        <div id="divModal1">
                            <p class="divModal1P">Nom : <?=$donnees['nomEtud']?></p>
                            <p class="divModal1P">Prénom : <span class="text-uppercase"><?=$donnees['prenomEtud']?></p>
                        </div>

                        <div id="divModal2">
                            <p id="divModal2P">Date de naissance : <?=$donnees['dateNaiss']?></p>
                        </div>

                        <div id="divModal3">
                            <p class="divModal1P">Courriel : <?=$donnees['courriel']?></p>
                            <p class="divModal1P">Numéro de téléphone : <?=$donnees['telEtud']?></p>
                            <p class="divModal1P">Année de promotion : <?=$donnees['anneePromotion']?></p>
                            <p class="divModal1P">Adresse 1: <?=$donnees['adr1']?></p>
                            <p class="divModal1P">Adresse 2: <?=$donnees['adr2']?></p>
                            <p class="divModal1P">Situation actuelle : <?=$donnees['situationActuelle']?></p>
                        </div>

                        <!-- <p>Groupes</p> -->
                        <div id="groupe<?=$donnees['idEtud']?>">
                            <!-- liste des groupes de l'etudiant-->
                        </div>

                        <!-- <p>Etablissements</p> -->
                        <div id="etablissemnt<?=$donnees['idEtud']?>">
                            <!-- liste des etablissements de l'etudiant-->
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>


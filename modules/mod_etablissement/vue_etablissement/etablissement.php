<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 shadow-sm lighten-4" id="divsEtud">
<a href="index.php?module=etablissement&action=detailEtab&idEtab=<?=$donnees['idEtablissement']?>" style=" text-decoration: none;">
        <div class="container-fluid">
            <div class="row">

                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 card-body">
                    <div class="container-fluid">
                        <div class="row" style="">

                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                            <strong>Nom : <?=$donnees['nomEtablissement']?></strong> <br />
                        </div>   

                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                                <strong>Type : <span class="text-uppercase"><?=$donnees['typeEtab']?></span></strong> <br />
                            </div>

                        </div> 
                    </div>
                </div>

                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 card-body">
                    <a class=" btn optionMenu " href="index.php?module=etablissement&action=formModifEtablissement&idEtab=<?=$donnees['idEtablissement']?>"  ><img src="bootstrap-icons/icons/pencil.svg" alt="+" width="32" height="32" title="Plus"> </a>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 card-body">
                    <a class=" btn optionMenu " href="index.php?module=etablissement&action=suppEtablissement&idEtab=<?=$donnees['idEtablissement']?>" ><img  src="bootstrap-icons/icons/trash-fill.svg" alt="+" width="32" height="32" title="Plus"> </a>
                </div>

        </div>
    </div>
</a>
</div> 
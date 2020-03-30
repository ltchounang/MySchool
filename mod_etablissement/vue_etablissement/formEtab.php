
<div class="container-fluid etablissement" >
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
            <div class="formInfo form-group inputFormEtud">
                <span>Nom de l'<?=$donnees['typeEtab']?> : </span><input name="nomEtab<?=$donnees['idEtablissement']?>" type="text" value="<?=$donnees['nomEtablissement']?>" placeholder="nom de l'<?=$donnees['typeEtab']?>" class=""></br>
            </div>

            <div class="formInfo form-group inputFormEtud" >
                <span> Date de d'ébut d'<?=$donnees['typeEtab']?> : </span><input type="date" name="dateDeb<?=$donnees['idEtablissement']?>"
                value="<?=$donnees['dateDebut']?>" min="2050-00-00" >
            </div>

            <div class="formInfo form-group inputFormEtud" > 
                <span> Date de fin d'étude : </span><input type="date" name="dateFin<?=$donnees['idEtablissement']?>"
                value="<?=$donnees['dateFin']?>" min="2050-00-00" >
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
            <sapn > Type de formation :</span>
            <textarea name="typeFormation<?=$donnees['idEtablissement']?>" class="form-control z-depth-1" rows="3" placeholder="Que fait l'étudiant dans cette formation" ><?=$donnees['infoFormation']?></textarea>

            <span> Etablissement : </span><input type="text" name="typeEtab<?=$donnees['idEtablissement']?>" value="<?=$donnees['typeEtab']?>" >
            <a href="index.php?module=etudiant&action=suppEtabDeEtudiant&idEtud=<?=$donnees['idEtud']?>&idEtab=<?=$donnees['idEtablissement']?>" class="btn  " role="button" > supprimer <img src="bootstrap-icons/icons/Building.svg" alt="..." width="32" height="32" title="Building"> </a>
            

        </div>

        <input type="hidden" name="old-idEtab<?=$nbEtab?>" value="<?=$donnees['idEtablissement']?>">

    </div>
</div>

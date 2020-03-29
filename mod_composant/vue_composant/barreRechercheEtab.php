<div class="container-fluid" style="border-bottom: 2px solid rgb(154, 154, 161);">
    <div class="row">

        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
            <span>Trier</span>
            <select id="trier" class="custom-select" >
                <option value="idEtud" >id</option>
                <option value="nom" >nom</option>
            </select>
        </div>

        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 conteneurInputEtud mb-3">
            <input name=lieu id="elementRecherche" type="text" style="margin-top:2.5%;" class="form-control" placeholder="recherche">
        </div>

        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
            <span>Filtrer</span>
            <select id="filtrer" class="custom-select" >
                <?=$options?>
            </select>
        </div>

    </div>
</div>
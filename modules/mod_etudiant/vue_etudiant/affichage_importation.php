<?php ob_start(); ?>

<?php require_once 'import.php';?> 
	<article id="articleGestion" >

    <h2><?php echo $h2;?></h2>
    <div id=divImportation>
	<div class="table-wrapper-scroll-y my-custom-scrollbar">

          <table class="table table-bordered table-striped mb-0">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">N° etudiant</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
              </tr>
            </thead>
            <tbody>
                <?php   for ($i=0; $i <count($tab) ; $i++) { ?>
              <tr>
                <th scope="row"><?php echo $i+1; ?></th>
                <td><?php echo $tab[$i]['numeroetudiantapogee'];?></td>
                <td> <?php echo $tab[$i]['nom'];?></td>
                <td><?php echo $tab[$i]['prenom'];}?></td>
              </tr>
            </tbody>
          </table>

    </div>
                            
 </div>
</br></br>

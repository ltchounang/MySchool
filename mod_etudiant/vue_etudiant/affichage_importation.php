<?php ob_start(); ?>

<?php require_once 'import.php';?> 
	<article id="articleGestion" >
    <h2>Voici votre importation</h2>
    <div id=divImportation>
	<?php	for ($i=0; $i <count($tab) ; $i++) { ?>
              
              
                

                        

                            <div id=divImportation1>
                                <strong>prenom : <?php echo $tab[$i]['Prénom'];?></strong> <br /> 
                                <strong>nom : <?php echo $tab[$i]['Nom'];?></strong> <br /> 
                                <p class="card-text">mail : <?php echo $tab[$i]['Courriel personnel'];?></p>
                                <p class="card-text">numéro de téléphone : <?php echo $tab[$i]['telephone annuel'];?></p>
                            </div>

                            <?php }?>
                            
                        </div>

                        <form action="index.php?module=etudiant&action=validation_mail" method="post">
                            <p>Envoyez un mail aux etudiants pour les mettre au courant</p>
                            <p>Note: pour ecrire le nom ou le prenom de l\etudiant entrez [nom] ou [prenom]<p>
                            <p>Exemple : Bonjour,[prenom][nom] => Bonjour,Phillipe Bonnot</p>
                            <label for="sujet"> Objet : </label></br>
                            <input type="text" placeholder="objet du mail" id="sujet" name="sujet"></br>
                            <label for="message"> Message : </label></br>
                            <textarea id="message" name="message" rows="10" cols="60" placeholder="contenu ..."></textarea></br>
                            <input type="submit" id="envoi" name="envoi" value="ok">
                        </form>  </article>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

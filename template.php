<?php
if(!defined ('CONSTANT') )
  die ('acces interdit') ;

?>
<?php echo '<div id="messConnect" style="position:fixed;z-index:2;top:7%;right:0;width:200px;color:green;background-color:white;display:none;" class="animated bounceInRight" role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
	<div class="toast-header">
		<svg class=" rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
		<strong class="mr-auto">Bonjour  !</strong>
		<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times</span>
		</button>
	</div>
	<div class="toast-body text-center">
		<p id="contenuNotif"></p>
		
		<button id="annulerSupp" style="display:none;" class="btn">annuler</button>
	</div>
</div>'; ?>
<!DOCTYPE html >
<html lang="fr" > 
	 
	<head>
		<meta charset="utf-8">
		<title> MySchool </title>
		<?php require_once 'import.php'; ?>
	</head>


<body >

	<?php require_once('include/enTete.php'); ?>
	<div class="container-fluid">
		<div class="row">
	

			<!-- menu des options à gauche -->
			<aside class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="divMnu">
				<h2 class="text-light"> menu option </h2>

				<a id="button1" class="btn optionMenu" href="index.php?module=etudiant&action=listeEtudiant" role="button" > liste etudiant  <img src="bootstrap-icons/icons/people-fill.svg" alt="..." width="32" height="32" title="People fill"> </a>
				<a id="button2" class="btn optionMenu" href="index.php?module=etudiant&action=formAjoutEtud" role="button" > ajouter etudiant <img src="bootstrap-icons/icons/plus.svg" alt="+" width="32" height="32" title="Plus"> </a>
				<a id="button3" class="btn optionMenu" href="index.php?module=etablissement&action=listeEtablissement" role="button" > liste etablissement  <img src="bootstrap-icons/icons/building.svg" alt="..." width="32" height="32" title="People fill"> </a>
				<a id="button4" class="btn optionMenu"  href="index.php?module=etudiant&action=listeGroupeEtud" role="button" > Groupe étudiants <img src="ressources/imgSite/logos/gestion/person2.png" alt="..." width="32" height="32"> </a>
				<a id="button5" class="btn optionMenu"  href="index.php?module=etudiant&action=importer_fichier" role="button" > Importer fichier excel <img src="ressources/imgSite/logos/gestion/import_logo.png" alt="..." width="32" height="32" title="import"> </a>

			</aside>

			<!-- contenu au centre -->
			<article class="col-xs-10 col-sm-10 col-md-10 col-lg-10" style="">
				<?= $content ?>
			</article>

		</div>
	</div>
	<?php include('include/piedDePage.php');?>
</body>


</html>
<?php
if(!defined ('CONSTANT') )
  die ('acces interdit') ;

?>

<!DOCTYPE html >
<html lang="fr" > 
	 
	<head>
		<meta charset="utf-8">
		<title> MySchool </title>
		<?php require_once 'import.php'; ?>
	</head>

<body style="background-color:blanchedalmond;">
	<?php require_once('include/enTete.php'); ?>
	<div class="container-fluid">
		<div class="row">
	

			<!-- menu des options à gauche -->
			<aside class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >
				<h2 class="text-light"> menu option </h2>
				<a class="btn optionMenu" href="index.php?module=etudiant&action=listeEtudiant" role="button" > liste etudiant  <img src="bootstrap-icons/icons/people-fill.svg" alt="..." width="32" height="32" title="People fill"> </a>
				<a class="btn optionMenu" href="index.php?module=etudiant&action=formAjoutEtud" role="button" > ajouter etudiant <img src="bootstrap-icons/icons/plus.svg" alt="+" width="32" height="32" title="Plus"> </a>
				<a class="btn optionMenu" href="index.php?module=etablissement&action=listeEtablissement" role="button" > liste etablissement  <img src="bootstrap-icons/icons/people-fill.svg" alt="..." width="32" height="32" title="People fill"> </a>
				<a class="btn optionMenu"  href="index.php?module=etudiant&action=importer_fichier" role="button" > Importer fichier excel <img src="ressources/imgSite/logos/gestion/import_logo.png" alt="..." width="32" height="32" title="import"> </a>
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
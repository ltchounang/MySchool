<?php
if(!defined('CONSTANT'))
  die('Accès interdit !');
?>

<!DOCTYPE html>
<html lang="fr">  
    <head>
        <meta charset="utf-8">
        <title> MySchool </title>
        <link rel="icon" type="image/png" href="ressources/imgSite/avatar.png" />

        <!--  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"> -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" >
        
        
        <link rel="stylesheet" href="bootstrap/mdbootstrap/css/bootstrap.min.css">
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="bootstrap/mdbootstrap/css/mdb.min.css">
        <!-- Your custom styles (optional) -->
        <link rel="stylesheet" href="bootstrap/mdbootstrap/css/style.css">       
        
        <link href="style.css" rel="stylesheet" >
        
    </head>

    

	<body>
	    
	    <!--Navbar -->

        <nav class="mb-1 navbar navbar-expand-lg navbar-dark aqua-gradient lighten-1">
          <a id="logo" href="index.php"><img id="logoMySchool" src="ressources/imgSite/logos/nav/myschool.png" alt="logo"/> MySchool </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
            aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
            
            <ul class="navbar-nav nav-flex-icons ml-auto" id="navDroite">
                <li class="nav-item">
                <a class="nav-link" href="#"><img class="logosNav" src="ressources/imgSite/logos/nav/logo_gestion.png" alt="logoGestion"/>Etudiants</a>
              </li>
                <li class="nav-item">
                <a class="nav-link" href="#"><img class="logosNav" src="ressources/imgSite/logos/nav/logo_message.png" alt="logoMessage"/>Messages</a>
              </li>
              
              
              
              
              
              <?= $lienConnect ?>
            </ul>
          </div>
        </nav> 
        <!--/.Navbar -->


    <section>
		<aside class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="background-color: grey;">
			<h2 class="text-light"> menu option </h2>
			<a class="btn optionMenu" href="index.php?module=etudiant&action=liste_etudiant" role="button" > liste etudiant  <img src="ressources/imgSite/logos/gestion/liste_etudiant_logo.png" alt="..." width="32" height="32" title="People fill"> </a>

			<button class="btn optionMenu" id="formAjout" role="button" > ajouter etudiant <img src="ressources/imgSite/logos/gestion/ajouter_etudiant_logo.png" alt="+" width="32" height="32" title="Plus"> </button>

			<a class="btn optionMenu"  href="index.php?module=etudiant&action=importer_fichier" role="button" > Importer depuis un fichier <img src="ressources/imgSite/logos/gestion/import_logo.png" alt="..." width="32" height="32" title="import"> </a>
		</aside>

		<article class="col-xs-10 col-sm-10 data-spy="scroll" class="scrollspy-example z-depth-1 mt-4" data-offset="0"" style="background-color: blanchedalmond; scrollbar-ripe-malinka">
			<?= $content ?>

		</article>
</section>



        
<script src="bootstrap/js/jquery-3.4.1.min.js" ></script>
        <script src="modules/mod_etudiant/js_etudiant.js" ></script>
        
        <script type="text/javascript" src="bootstrap/mdbootstrap/js/jquery.min.js"></script>
      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="bootstrap/mdbootstrap/js/popper.min.js"></script>
      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="bootstrap/mdbootstrap/js/bootstrap.min.js"></script>
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="bootstrap/mdbootstrap/js/mdb.min.js"></script>
      <!-- Your custom scripts (optional) -->
	</body>



</html>
<!-- <div class="row">
  <div class="col-4">
    <div id="list-example" class="list-group">
      <a class="list-group-item list-group-item-action active" href="#list-item-1">Item 1</a>
      <a class="list-group-item list-group-item-action" href="#list-item-2">Item2</a>
      <a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
      <a class="list-group-item list-group-item-action" href="#list-item-4">Item 4</a>
    </div>
  </div>
  <div class="col-8">
    <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example z-depth-1">
      <h4 id="list-item-1">Item 1</h4>
      <p>Ex consequat commodo adipisicing exercitation aute excepteur occaecat ullamco duis aliqua id magna
        ullamco eu. Do aute ipsum ipsum ullamco cillum consectetur ut et aute consectetur labore. Fugiat
        laborum incididunt tempor eu consequat enim dolore proident. Qui laborum do non excepteur nulla magna
        eiusmod consectetur in. Aliqua et aliqua officia quis et incididunt voluptate non anim reprehenderit
        adipisicing dolore ut consequat deserunt mollit dolore. Aliquip nulla enim veniam non fugiat id
        cupidatat nulla elit cupidatat commodo velit ut eiusmod cupidatat elit dolore.</p>
      <h4 id="list-item-2">Item 2</h4>
      <p>Quis magna Lorem anim amet ipsum do mollit sit cillum voluptate ex nulla tempor. Laborum consequat non
        elit enim exercitation cillum aliqua consequat id aliqua. Esse ex consectetur mollit voluptate est in
        duis laboris ad sit ipsum anim Lorem. Incididunt veniam velit elit elit veniam Lorem aliqua quis
        ullamco deserunt sit enim elit aliqua esse irure. Laborum nisi sit est tempor laborum mollit labore
        officia laborum excepteur commodo non commodo dolor excepteur commodo. Ipsum fugiat ex est consectetur
        ipsum commodo tempor sunt in proident.</p>
      <h4 id="list-item-3">Item 3</h4>
      <p>Quis anim sit do amet fugiat dolor velit sit ea ea do reprehenderit culpa duis. Nostrud aliqua ipsum
        fugiat minim proident occaecat excepteur aliquip culpa aute tempor reprehenderit. Deserunt tempor
        mollit elit ex pariatur dolore velit fugiat mollit culpa irure ullamco est ex ullamco excepteur.</p>
      <h4 id="list-item-4">Item 4</h4>
      <p>Quis anim sit do amet fugiat dolor velit sit ea ea do reprehenderit culpa duis. Nostrud aliqua ipsum
        fugiat minim proident occaecat excepteur aliquip culpa aute tempor reprehenderit. Deserunt tempor
        mollit elit ex pariatur dolore velit fugiat mollit culpa irure ullamco est ex ullamco excepteur.</p>
    </div>
  </div>
</div>
-->
<?php
/*
<!-- Footer -->
<footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase">Footer Content</h5>
        <p>Here you can use rows and columns to organize your footer content.</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Link 1</a>
          </li>
          <li>
            <a href="#!">Link 2</a>
          </li>
          <li>
            <a href="#!">Link 3</a>
          </li>
          <li>
            <a href="#!">Link 4</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Link 1</a>
          </li>
          <li>
            <a href="#!">Link 2</a>
          </li>
          <li>
            <a href="#!">Link 3</a>
          </li>
          <li>
            <a href="#!">Link 4</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->			*/
?>
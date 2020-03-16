<?php
/*
    On active l'affichage des erreurs
*/
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

// On définit une constante pour bien obliger les utilisateurs à passer par l'index
if(!isset($_SESSION['login']) && !defined('CONSTANT')) {
    session_start();
    define('CONSTANT', NULL);
}
require_once('vue_generique.php');   
require_once('modules/mod_etudiant/mod_etudiant.php');  
require_once('modules/mod_connexion/mod_connexion.php');


ModeleConnexion::initConnexion(); // On initialise la connexion

if (isset($_GET['module'])) {
    $moduleChoisi = htmlspecialchars($_GET['module']);
    $classe = 'mod' . $moduleChoisi;
    $module = new $classe();
}

else{
    $module = new ModEtudiant();
}

if (!isset($_SESSION['login'])) {
    $lienConnect = '<li class="nav-item">
    <a class="nav-link" href="index.php?module=connexion&action=form_connexion"><img class="logosNav" src="ressources/imgSite/logos/nav/logo_connexion.png" alt="logoConnexion"/>Connexion</a>
    </li>';
    }
    else {
      $lienConnect = '<!-- Dropdown -->
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          
          ' . $_SESSION['login'] .'
            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" class="rounded-circle z-depth-0"
            alt="avatar image" height="25"></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php?module=connexion&action=form_responsable"><img class="logosNav" src="ressources/imgSite/logos/nav/logo_ajouter_responsable.png" alt="logoConnexion"/>Ajouter un responsable </a>
          <a class="dropdown-item" href="#"><img class="logosNav" src="ressources/imgSite/logos/nav/logo_espace_membre.png" alt="logoGestion"/>Espace membre</a>
          
          <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="index.php?module=connexion&action=seDeconnecter"><img class="logosNav" src="ressources/imgSite/logos/nav/logo_deconnexion.png" alt="logoConnexion"/> Déconnexion </a>
  </div>
        </div>
      </li>';
      
      
      
    
}

            
$content = VueGenerique::getAffichage();
require('template.php');
?>

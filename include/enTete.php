
<!-- Bar de navigation en haut -->
<nav class="mb-2 navbar navbar-expand-lg navbar-dark default-color-dark lighten-1">
  <!-- Logo et nom du site, qui redirigent tout les deux vers la liste des étudiants -->
  <a id="lienLogo" href="index.php?module=etudiant"><img id="logoMySchool" src="ressources/imgSite/logos/nav/myschool.png" alt="logoSite"/> MySchool </a>

  <!-- Liste déroulante avec tous les options disponibles pour l'utilisateur -->
    <ul class="navbar-nav nav-flex-icons ml-auto" id="navDroite">   
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <!-- Nom de l'utilisateur connecté -->
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=  $_SESSION['identifiant']  ?>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <!-- Lien qui redirige vers le site externe -->
          <a class="dropdown-item" href="https://myschools4.000webhostapp.com/"><img class="logosNav" src="ressources/imgSite/logos/nav/logo_site_online.png" alt="logoSiteEnLigne"/> Site en ligne </a>

          <!-- Option pour ajouter un autre responsable qui pourra gérer lui aussi les anciens -->
          <a class="dropdown-item" href="index.php?module=connexion&action=formAjoutResp"><img class="logosNav" src="ressources/imgSite/logos/nav/logo_ajouter_responsable.png" alt="logoAjoutResp"/> Ajouter un responsable </a>

          <!-- Espace dans lequel l'utilisateur peut changer ses informations : identifiant, mot de passe... -->

          <a class="dropdown-item" href="index.php?module=connexion&action=formEspaceMembre"><img class="logosNav" src="ressources/imgSite/logos/nav/logo_espace_membre.png" alt="logoEspaceMemb"/> Espace membre </a>
          
          <div class="dropdown-divider"></div>
            <!-- Option pour se déconnecter qui renvoie vers la page de connexion -->
            <a class="dropdown-item" href="index.php?module=connexion&action=deconnexion"><img class="logosNav" src="ressources/imgSite/logos/nav/logo_deconnexion.png" alt="logoDéconnexion"/> Déconnexion </a>
          </div>

        </div>
      </li>      
            
    </ul>
</nav>
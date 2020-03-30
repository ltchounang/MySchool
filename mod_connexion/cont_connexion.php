<?php
require_once('mod_connexion/modele_connexion.php');
require_once('mod_generique/controleur_generique.php');

class ContConnexion extends ContGenerique{
    private $modCo;

    public function __construct () {
        parent::__construct();// on lui donne accès aux méthodes de la class controleur generique
        $this->modCo = new ModeleConnexion();
        
    }
    public function form_connexion(){
        $newToken = self::generateFormToken('formCo');
        require('mod_connexion/vue_connexion/formConnexion.php');
        
    }

    public function form_addResp(){
        $newToken = self::generateFormToken('AjoutR');
        require('mod_connexion/vue_connexion/formInscription.php');
    }

    public function verifierJeton($nomJeton){
        if (self::verifyFormToken($nomJeton)) {

            // ... more security testing
            // on pourrai rajouter plus de condition pour améliorer et tester la securité
            // if pass, send email
          
          } else {
            echo "Tentative d'intrusion détectée !";
            die ( ' ERREUR : vous n\'êtes pas autorisé à poursuivre sur cette page ' ) ;
          
          }
    }
    public function connexion_responsable(){
        self::verifierJeton('formCo');
        // on teste si le visiteur a soumis le formulaire de connexion
	        if ((isset($_POST['identifiant']) && !empty($_POST['identifiant'])) && (isset($_POST['mp']) && !empty($_POST['mp']))) {
                $data=$this->modCo->get_responsableBD(htmlspecialchars($_POST["identifiant"]));
                // si on obtient une réponse, alors l'utilisateur est un membre
                if(password_verify(htmlspecialchars($_POST['mp']),$data['motDePasse'])){
                    $_SESSION['monid'] = $data['idResp'];
                    $_SESSION['identifiant'] = $data['identifiant'];
                   
                    header ('Location:index.php?module=etudiant&action=listeEtudiant');
                }
                // si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
                elseif ($data == 0) {
                    throw new formCoException('Compte non reconnu');
                }
                // sinon, alors la, il y a un gros problème plusieurs utilisareurs on le même identifiant:)
                else {
                    throw new formCoException('Erreur: multiple identifiant');
                }
            }
            else {
                throw new formCoException('un des champs est vide !');// les affichages devraient êtres gérer par une vu faite pour (sa peut être dans un module securité)
            }
        }
    

    public function add_responsable(){
            self::verifierJeton('AjoutR');
            // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
            if ((isset($_POST['identifiant']) && !empty($_POST['identifiant'])) && (isset($_POST['mp']) && !empty($_POST['mp'])) && (isset($_POST['mp_confirm']) && !empty($_POST['mp_confirm']))) {
            // on teste les deux mots de passee
            if ($_POST['mp'] != $_POST['mp_confirm']) {
                throw new formInsException('les mots de passe saisi sont différents ');
            }
            else {
                $data=$this->modCo->get_responsableBD(htmlspecialchars($_POST["identifiant"]));

                if ($data[0] == 0) {
                    $this->modCo->insert_responsableBD(htmlspecialchars($_POST["identifiant"]),htmlspecialchars($_POST['mp']));
                    self::connexion_responsable(htmlspecialchars($_POST["identifiant"]),htmlspecialchars($_POST['mp']));
                }
                else {
                    throw new formInsException('Ce responsable existe déjà dans la base de donée');
                }
            }
        }
            else {
                throw new formInsException('un des champs est vide !');
            }
    }

    public function deconnexion(){
        $_SESSION['monid'] = null;
        session_unset();
        session_destroy();
        //echo '<a href="index.php" style="text-aligne:center;" >retour à la page d\'accueil </a>';
        header ('Location:index.php?module=connexion&action=formConnexion');
        exit();
    }

    public function form_espace_membre(){
        $data=$this->modCo->get_responsableBD($_SESSION["identifiant"]);
        $identifiantResp=$data['identifiant'];
        require('mod_connexion/vue_connexion/formEspaceMembre.php');
    }

    public function modifier_resp(){
        if ((isset($_POST['idResp1']) && !empty($_POST['idResp1'])) && (isset($_POST['modifPw1']) && !empty($_POST['modifPw1'])) && (isset($_POST['modifPw2']) && !empty($_POST['modifPw2']) && !empty($_GET["idMembre"]) )) {
            // on teste les deux mots de passee
            $idresp1 = htmlspecialchars($_POST["idResp1"]);
            $idmembre = htmlspecialchars($_GET["idMembre"]);
            $modifPw1 = htmlspecialchars($_POST['modifPw1']);

            $data=$this->modCo->get_responsableBD($_SESSION["identifiant"]);
            if (password_verify(htmlspecialchars($_POST['modifPw']),$data['motDePasse'])) {

                if ($_POST['modifPw1'] != $_POST['modifPw2']) {
                    throw new formModifException('les mots de passe saisi sont différents ');
                }
                else {

                    $data=$this->modCo->get_responsableBD(htmlspecialchars($_POST["idResp1"]));

                    if ($data[0] == 0) {
                        $this->modCo->modif_resp(htmlspecialchars($_POST['idResp1']),htmlspecialchars($_POST['modifPw1']));
                        $message = 'Vos informations ont bien été prises en compte';
                        self::form_espace_membre();
                        require ('mod_erreur/vue_erreur/popUpConfirm.php');
                    }
                    else {
                        throw new formModifException('Ce responsable existe déjà dans la base de donée');
                    }
                }
            }
            else {
                throw new formModifException('L\'ancien mot de passe ne correspond pas');
            }
        }

        else {
            throw new formModifException('un des champs est vide !');
        }
    }
}


?>
<?php
require_once('modules/mod_connexion/modele_connexion.php');
require_once('modules/mod_generique/controleur_generique.php');

class ContConnexion extends ContGenerique {

    private $modeleConnexion;

    public function __construct () {
        parent::__construct(); // on lui donne accès aux méthodes de la classe controleur generique
        $this->modeleConnexion = new ModeleConnexion();
    }

    public function verifierJeton($nomJeton) {
        if (self::verifyFormToken($nomJeton)) {
            // ... more security testing
            // on pourrait rajouter plus de condition pour améliorer et tester la securité
            // if pass, send email
        } 
        else {
            echo "Tentative d'intrusion détectée !";
            die('ERREUR : vous n\'êtes pas autorisé à poursuivre sur cette page');
        }
    }

    /* -------------------------- Connexion et Déconnexion -------------------------- */
    public function form_connexion() {
        $newToken = self::generateFormToken('formCo');
        require('modules/mod_connexion/vue_connexion/formConnexion.php');
    }

    public function connexion_responsable() {
        // on teste si le visiteur a soumis le formulaire de connexion
        self::verifierJeton('formCo');
        // on teste l'existence de nos variables et aussi si elles ne sont pas vides
        if ((isset($_POST['identifiant']) && !empty($_POST['identifiant'])) && (isset($_POST['mp']) && !empty($_POST['mp']))) {
            $data = $this->modeleConnexion->get_responsableBD(htmlspecialchars($_POST["identifiant"]));
            // si on obtient une réponse, alors l'utilisateur est un membre
            if (!empty($data)) {
                // on teste les deux mots de passe
                if (password_verify(htmlspecialchars($_POST['mp']), $data['motDePasse'])) {
                    $_SESSION['monid'] = $data['idResp'];
                    $_SESSION['identifiant'] = $data['identifiant'];
                    
                    echo '<script>window.location.replace("index.php?module=etudiant&action=listeEtudiant")</script>';
                }
                else {
                    throw new formCoException('Les mots de passe saisis sont différents !');
                }
            }
            // si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
            else {
                throw new formCoException('Compte non reconnu : l\'identifiant ou le mot de passe est incorrect');
            }
        }
        else {
            throw new formCoException('Au moins un des champs est vide !');
        }
    }
    
    public function deconnexion() {
        $_SESSION['monid'] = null;
        session_unset();
        session_destroy();
        header('Location: index.php?module=connexion&action=formConnexion');
    }
    /* -------------------------- Connexion et Déconnexion -------------------------- */


    /* -------------------------- Ajout de responsable -------------------------- */
    public function form_addResp() {
        $newToken = self::generateFormToken('AjoutR');
        require('modules/mod_connexion/vue_connexion/formInscription.php');
    }

    public function add_responsable() {
        self::verifierJeton('AjoutR');
        if ((isset($_POST['identifiant']) && !empty($_POST['identifiant'])) && (isset($_POST['mp']) && !empty($_POST['mp'])) && (isset($_POST['mp_confirm']) && !empty($_POST['mp_confirm']))) {

            if ($_POST['mp'] != $_POST['mp_confirm']) {
                throw new formCoException('Les mots de passe saisis sont différents !');
            }
            else {
                $identifiant = htmlspecialchars($_POST["identifiant"]);
                $data = $this->modeleConnexion->get_responsableBD($identifiant);

                if (empty($data)) {
                    $this->modeleConnexion->insert_responsableBD($identifiant, htmlspecialchars($_POST['mp']));
                    self::form_addResp();
                    $message = 'Le compte '. $identifiant . ' a bien été créé :D !';
                    require('modules/mod_erreur/vue_erreur/popUpConfirm.php');
                }
                else {
                    throw new formInsException('Ce responsable existe déjà dans la base de données');
                }
            }
        }
        else {
            throw new formInsException('Au moins un des champs est vide !');
        }
    }
    /* -------------------------- Ajout de responsable -------------------------- */


    /* -------------------------- Espace membre -------------------------- */
    public function form_espace_membre() {
        $data = $this->modeleConnexion->get_responsableBD($_SESSION["identifiant"]);
        $identifiantResp = $data['identifiant'];
        require('modules/mod_connexion/vue_connexion/espaceMembre.php');
    }

    public function form_modifierId_resp() {
        require('modules/mod_connexion/vue_connexion/formModifIdMembre.php');
    }

    public function form_modifierMdp_resp() {
        require('modules/mod_connexion/vue_connexion/formModifMdpMembre.php');
    }

    public function modifierId_resp() {
        $identifiant = htmlspecialchars($_POST["idResp"]);
        $data = $this->modeleConnexion->get_responsableBD($_SESSION["identifiant"]);
        if ((isset($_POST['idResp']) && !empty($_POST['idResp'])) && (isset($_POST['mdp']) && !empty($_POST['mdp']))) {
            if (password_verify(htmlspecialchars($_POST['mdp']), $data['motDePasse'])) {
                $data = $this->modeleConnexion->modif_idResp($identifiant);
                $message = 'L\'identifiant a bien été modifié en ' . $identifiant . '! :)';
                self::form_espace_membre();
                require('modules/mod_erreur/vue_erreur/popUpConfirm.php'); 
            }
            else {
                throw new formModifException('Le mot de passe ne correspond pas !');
            }
        }
        else {
            throw new formModifException('Au moins un des champs est vide !');
        }
    }

    public function modifierMdp_resp() {
        if ((isset($_POST['mdp']) && !empty($_POST['mdp'])) && (isset($_POST['nouvMdp']) && !empty($_POST['nouvMdp'])) && (isset($_POST['confirmNouvMdp']) && !empty($_POST['confirmNouvMdp']))) {
            $data = $this->modeleConnexion->get_responsableBD($_SESSION["identifiant"]);
            if (password_verify(htmlspecialchars($_POST['mdp']), $data['motDePasse'])) {
                $nouvMdp = htmlspecialchars($_POST['nouvMdp']);
                $confNouvMdp = htmlspecialchars($_POST['confirmNouvMdp']);
                if ($nouvMdp == $confNouvMdp) {
                    $this->modeleConnexion->modif_mdpResp($nouvMdp);
                    $message = 'Le mot de passe a bien été modifié ! :)';
                    self::form_espace_membre();
                    require ('modules/mod_erreur/vue_erreur/popUpConfirm.php');
                }
                else {
                    throw new formModifException('Les mots de passe saisis sont différents !');
                }
            }
            else {
                throw new formModifException('Le mot de passe ne correspond pas !');
            }
        }
        else {
            throw new formModifException('Au moins un des champs est vide !');
        }
    }
    /* -------------------------- Espace membre -------------------------- */

}
?>
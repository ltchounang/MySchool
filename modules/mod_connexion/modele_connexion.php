<?php
require_once('modules/mod_generique/modele_generique.php');

class ModeleConnexion extends ModeleGenerique {

    public function __construct () {}

    public function get_responsableBD($idResp) {
        $req = self::$bdd->prepare('SELECT * FROM responsable WHERE identifiant = ?');
        $req->execute(array($idResp));
        return $req->fetch();
    }

    public function insert_responsableBD($idResp, $mp) {
        $mp = password_hash($mp, PASSWORD_DEFAULT);
        $req = self::$bdd->prepare('INSERT INTO responsable(identifiant, motDePasse) VALUES(?, ?)');
        $req->execute(array($idResp, $mp));
    }

    public function modif_idResp($identifiant) {
        $req = self::$bdd->prepare('UPDATE responsable set identifiant = ? WHERE idResp = ?');
        $req->execute(array($identifiant, $_SESSION['monid']));
        $_SESSION['identifiant'] = $identifiant;
    }

    public function modif_mdpResp($mdp) {
        $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
        $req = self::$bdd->prepare('UPDATE responsable set motDePasse = ? WHERE idResp = ?');
        $req->execute(array($mdpHash, $_SESSION['monid']));
    }

}

?>
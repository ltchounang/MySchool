<?php

require_once 'mod_generique/modele_generique.php';

class ModeleConnexion extends ModeleGenerique{

    public function __construct () {
        
    }

    public function get_responsableBD($idResp){
        $req = self::$bdd->prepare('SELECT * FROM responsable WHERE identifiant = ?');
        $req->execute(array($idResp));

        return $donnees = $req->fetch();
    }

    public function insert_responsableBD($idResp,$mp){
        $mp = password_hash($mp,PASSWORD_DEFAULT);

        $req=self::$bdd->prepare('INSERT INTO responsable (identifiant,motDePasse) VALUES("'.$idResp.'","'.$mp.'")');
        $req->execute(array($idResp,$mp));
    }

}

?>

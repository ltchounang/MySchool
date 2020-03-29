<?php
require_once 'mod_generique/modele_generique.php';
class ModeleEtablissement extends ModeleGenerique{

    public function __construct () {// le constructeur ne se déclenche pas à l'ouverture de la page
    
        parent::__construct();
    }

    public function add_etablissementBD($nomEtab,$typeEtab,$dateDeb,$dateFin,$typeForm,$idEtud){
        $req = self::$bdd->prepare('INSERT into etablissement (nomEtablissement,typeEtab) values (?,?)');
            $req->execute(array($nomEtab,$typeEtab));
        
            $idEtab = self::$bdd->lastInsertId();

            if(empty($dateDeb)) $dateDeb='0000-00-00';
            if(empty($dateFin)) $dateFin='0000-00-00';
            $req2 = self::$bdd->prepare('INSERT former values (?,?,?,?,?)');
            $req2->execute(array($idEtab,$idEtud,$typeForm,$dateDeb,$dateFin));
    }

    public function get_etablissementBD($idEtablissment){
        $req = self::$bdd->prepare('SELECT * FROM etablissement inner join former using (idEtablissement) WHERE former.idEtud = ? ');
        $req->execute(array($idEtablissment));
        return $req;
    }

    public function update_etablissementBD($nomEtab,$typeEtab,$dateDeb,$dateFin,$typeForm,$idEtab,$idEtud){
        $req = self::$bdd->prepare('UPDATE etablissement SET nomEtablissement = (?) , typeEtab = (?) where idEtablissement = (?)');
        $req->execute(array($nomEtab,$typeEtab,$idEtab));

        if(empty($dateDeb)) $dateDeb='0000-00-00';
        if(empty($dateFin)) $dateFin='0000-00-00';
        
        $req2 = self::$bdd->prepare('UPDATE former SET typeFormation = (?) , dateDebut = (?) , dateFin = (?) where idEtablissement = (?) and idEtud = (?)');
        $req2->execute(array($typeForm,$dateDeb,$dateFin,$idEtab,$idEtud));
    }
}

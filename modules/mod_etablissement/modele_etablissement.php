<?php
require_once 'modules/mod_generique/modele_generique.php';
class ModeleEtablissement extends ModeleGenerique{

    public function __construct () {// le constructeur ne se déclenche pas à l'ouverture de la page
    
        parent::__construct();
    }

    public function  add_EtabBD($nomEtab,$typeEtab){

        $etab = self::etab_existBD($nomEtab,$typeEtab,"");
        if( $etab == 0){
            $req = self::$bdd->prepare('INSERT into etablissement (nomEtablissement,typeEtab) values (?,?)');
            $req->execute(array($nomEtab,$typeEtab));
            return self::$bdd->lastInsertId();
        }
        else{
            return $etab['idEtablissement'];
        }
    }

    public function supp_EtabDeEtudiantBD($idEtud,$idEtab){
        $req = self::$bdd->prepare('DELETE FROM former where idEtud = ? and idEtablissement = ?');
        $req->execute(array($idEtud,$idEtab));

    }

    public function etab_existBD($nomEtab,$typeEtab,$idEtab){
        if($idEtab == ""){
            $req = self::$bdd->prepare('SELECT * from etablissement where nomEtablissement = ? and typeEtab = ? ');
            $req->execute(array($nomEtab,$typeEtab));
        }
        else{
            $req = self::$bdd->prepare('SELECT * from etablissement where nomEtablissement = ? and typeEtab = ? and idEtablissement != ?');
            $req->execute(array($nomEtab,$typeEtab,$idEtab));
        }
        return $donnees = $req->fetch();
    }

    public function add_etablissementBD($nomEtab,$typeEtab,$dateDeb,$dateFin,$typeForm,$idEtud){

        $idEtab = self::add_EtabBD($nomEtab,$typeEtab);


        if(empty($dateDeb)) $dateDeb='0000-00-00';
        if(empty($dateFin)) $dateFin='0000-00-00';
        $req2 = self::$bdd->prepare('INSERT former values (?,?,?,?,?)');
        $req2->execute(array($idEtab,$idEtud,$typeForm,$dateDeb,$dateFin));
    }

    public function get_etablissementsBD(){
        return self::$bdd->query('SELECT * FROM etablissement order by idEtablissement desc');
    }
    public function get_EtablissementBD($idEtablissment){
        $req = self::$bdd->prepare('SELECT * FROM etablissement where idEtablissement = ? ');
        $req->execute(array($idEtablissment));
        return $req->fetch();
    }

    public function get_etablissementEtudBD($idEtablissment){
        $req = self::$bdd->prepare('SELECT * FROM etablissement inner join former using (idEtablissement) WHERE former.idEtud = ? ');
        $req->execute(array($idEtablissment));
        return $req;
    }


    public function get_EtudiantEtabBD($idEtablissment){
        $req = self::$bdd->prepare('SELECT * FROM etudiant inner join former using (idEtud) WHERE former.idEtablissement = ? ');
        $req->execute(array($idEtablissment));
        return $req;
    }

    public function update_etablissementBD($nomEtab,$typeEtab,$idEtab){
        $req = self::$bdd->prepare('UPDATE etablissement SET nomEtablissement = (?) , typeEtab = (?) where idEtablissement = (?)');
        $req->execute(array($nomEtab,$typeEtab,$idEtab));
    }

    public function update_etablissementEtudBD($nomEtab,$typeEtab,$dateDeb,$dateFin,$typeForm,$idEtab,$idEtud){
        self::update_etablissementBD($nomEtab,$typeEtab,$idEtab);

        if(empty($dateDeb)) $dateDeb='0000-00-00';
        if(empty($dateFin)) $dateFin='0000-00-00';
        
        $req2 = self::$bdd->prepare('UPDATE former SET infoFormation = (?) , dateDebut = (?) , dateFin = (?) where idEtablissement = (?) and idEtud = (?)');
        $req2->execute(array($typeForm,$dateDeb,$dateFin,$idEtab,$idEtud));
    }

    public function delete_etabBD($idEtab){
            $req = self::$bdd->prepare('DELETE FROM former where idEtablissement = ?');
            $req->execute(array($idEtab));
    
            $req2 = self::$bdd->prepare('DELETE FROM etablissement where idEtablissement = ?');
            $req2->execute(array($idEtab));
    }
}

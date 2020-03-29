<?php
require_once 'mod_generique/modele_generique.php';
class ModeleEtudiant extends ModeleGenerique{

    public function __construct () {// le constructeur ne se déclenche pas à l'ouverture de la page
    
        parent::__construct();
    }

    public function student_existBD($nomEtud,$prenomEtud){
        $req = self::$bdd->prepare('SELECT nomEtud,prenomEtud from etudiant where nomEtud = ? and prenomEtud = ?');
        $req->execute(array($nomEtud,$prenomEtud));

        return $donnees = $req->fetch();
    }

    public function studentModif_existBD($nomEtud,$prenomEtud,$idEtud){
        $req = self::$bdd->prepare('SELECT nomEtud,prenomEtud from etudiant where nomEtud = ? and prenomEtud = ? and idEtud != ?');
        $req->execute(array($nomEtud,$prenomEtud,$idEtud));

        return $donnees = $req->fetch();
    }

    public function add_studentBD($numApo,$photoEtud,$nomEtud,$prenom,$dateNaiss,
    $courriel,$tel,$adrr1,$adrr2,$AnneePromo,$situationActu){

            if(empty($numApo)) $numApo=0; // obligatoire si on veut mettre à null
            if(empty($tel)) $tel=0;
            if(empty($dateNaiss)) $dateNaiss='0000-00-00';

            $req = self::$bdd->prepare('INSERT into etudiant (numApogee,
            photoEtud,nomEtud,prenomEtud,dateNaiss,courriel,telEtud,adr1,adr2,
            anneePromotion,situationActuelle) values (?,?,?,?,?,?,?,?,?,?,?)');
            $req->execute(array($numApo,$photoEtud,$nomEtud,$prenom,$dateNaiss,
        $courriel,$tel,$adrr1,$adrr2,$AnneePromo,$situationActu));
            return self::$bdd->lastInsertId();
    }
    public function add_studentBD_sans_img($numApo,$nomEtud,$prenom,$dateNaiss,
    $courriel,$tel,$adrr1,$adrr2,$AnneePromo,$situationActu){
      $req = self::$bdd->prepare('INSERT into etudiant (numApogee,
            nomEtud,prenomEtud,dateNaiss,courriel,telEtud,adr1,adr2,
            anneePromotion,situationActuelle) values (?,?,?,?,?,?,?,?,?,?)');
            $req->execute(array($numApo,$nomEtud,$prenom,$dateNaiss,
        $courriel,$tel,$adrr1,$adrr2,$AnneePromo,$situationActu));
           
    }
    public function est_present($numEtud){
           $req = self::$bdd->prepare('SELECT numApogee FROM etudiant where numApogee=?');
           $req->execute(array($numEtud));
           return empty($req->fetchAll());
    }
  
    public function get_Students($page){
        $reponse = self::$bdd->query('SELECT * FROM etudiant order by idEtud desc limit '.(($page-1)*10). ','. 10);
        return $reponse;
        $reponse->closeCursor();
    }
    
    public function nb_students(){
        $reponse = self::$bdd->query('SELECT idEtud from etudiant');
        $nbEtud = $reponse->rowCount();
        return $nbEtud;
    }

    public function get_studentBD($idEtud){
        $req = self::$bdd->prepare('SELECT * FROM etudiant WHERE idEtud = ?');
        $req->execute(array($idEtud));
        return $req->fetch();
    }

    public function update_studentBD($numApo,$photoEtud,$nomEtud,$prenom,$dateNaiss,
    $courriel,$tel,$adrr1,$adrr2,$AnneePromo,$situationActu,$idEtud){
        
        if(empty($numApo)) $numApo=0; // obligatoire si on veut mettre à null
        if(empty($tel)) $tel=0;
        if(empty($dateNaiss)) $dateNaiss='0000-00-00';

        $req = self::$bdd->prepare('UPDATE etudiant SET numApogee = (?) , photoEtud = (?) , nomEtud = (?) ,
         prenomEtud = (?) , dateNaiss = (?) , courriel = (?) , telEtud = (?) , adr1 = (?) , adr2 = (?) , 
        anneePromotion = (?) , situationActuelle = (?) where idEtud = (?)');
        $req->execute(array($numApo,$photoEtud,$nomEtud,$prenom,$dateNaiss,
    $courriel,$tel,$adrr1,$adrr2,$AnneePromo,$situationActu,$idEtud));

    }
    
    public function delete_studentBD($idEtud){
        $req = self::$bdd->prepare('DELETE FROM former where idEtud = ?');
        $req->execute(array($idEtud));

        $req2 = self::$bdd->prepare('DELETE FROM etudiant where idEtud = ?');
        $req2->execute(array($idEtud));

    }

}

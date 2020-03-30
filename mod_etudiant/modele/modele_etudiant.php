
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

    public function est_present($numEtud){
       $req = self::$bdd->prepare('SELECT * FROM etudiant where numApogee=?');
       $req->execute(array($numEtud));
       return $req->fetchAll();
   }
  
    public function get_Students($page, $idGroupe){
        if ($idGroupe == 0)
            $reponse = self::$bdd->query('SELECT * FROM etudiant order by idEtud desc limit '.(($page-1)*10). ','. 10);
        else{
            $reponse = self::$bdd->query('SELECT * FROM etudiant inner join apparteniraugroupe using(idEtud) where idGroupe='.$idGroupe);
        }

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
    
    public function delete_studentBD($idEtud,$id){
        $req = self::$bdd->prepare('DELETE FROM former where idEtud = ?');
        $req->execute(array($idEtud));
        if($id==0){
            $req2 = self::$bdd->prepare('DELETE FROM apparteniraugroupe where idEtud = ?');
            $req2->execute(array($idEtud));

            $req2 = self::$bdd->prepare('DELETE FROM etudiant where idEtud = ?');
            $req2->execute(array($idEtud));
        }else{
            $req2 = self::$bdd->prepare('DELETE FROM apparteniraugroupe where idEtud = ? and idGroupe = ?');
            $req2->execute(array($idEtud,$id));
        }

    }

    public function creer_groupe($nom){
        $req = self::$bdd->prepare('INSERT INTO groupe(nomGroupe) values (?)');
        $req->execute(array($nom));
    }

    public function get_groupes(){
        $req = self::$bdd->query('SELECT * FROM groupe');
        return $req;
    }

    public function groupe_exists($nom){
        $req = self::$bdd->prepare('SELECT idGroupe FROM groupe where nomGroupe=?');
        $req->execute(array($nom));
        $donnees = $req->rowCount();
        return $donnees;
    }

    public function add_etud_groupe($idEtud, $idGroupe){
        if (empty($idGroupe)) $idGroupe = 0;

        $req = self::$bdd->prepare('INSERT INTO apparteniraugroupe(idEtud, idGroupe) values(?,?)');
        $req->execute(array($idEtud, $idGroupe));
    }

    public function supprimer_groupe($idGroupe){
        $req = self::$bdd->prepare('DELETE FROM apparteniraugroupe where idGroupe=?');
        $req->execute(array($idGroupe));

        $req2 = self::$bdd->prepare('DELETE FROM groupe where idGroupe=?');
        $req2->execute(array($idGroupe));
    }

    public function nb_etud_dans_groupe($idGroupe){
        $req = self::$bdd->prepare('SELECT count(idEtud) from apparteniraugroupe where idGroupe=?');
        $req->execute(array($idGroupe));
        $donnees = $req->fetch();
        return $donnees['count(idEtud)'];
    }

    public function get_groupe_name($id){
        $req = self::$bdd->prepare('SELECT nomGroupe FROM groupe where idGroupe=?');
        $req->execute(array($id));
        $donnees = $req->fetch();
        return $donnees;
    }
}

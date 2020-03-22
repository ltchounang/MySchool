<?php

require_once('mod_etudiant/modele/modele_etudiant.php');
require_once('mod_etablissement/cont_etablissement.php');
require_once('mod_generique/controleur_generique.php');

class ContEtudiant extends ContGenerique{

    private $modeleEtud;
    private $contEtab;

    public function __construct () {
        parent::__construct();
        $this->modeleEtud = new ModeleEtudiant();
        $this->contEtab = new ContEtablissement();
    }

    function form_addEtud(){
        $action = 'ajouterEtudiant';
        $photoEtud = 'bootstrap-icons/icons/person.svg';
        $numApo = $nomEtud = $prenom = $dateNaiss = $courriel = $tel = $adrr1 = $adrr2 = $AnneePromo = $situationActu = $etablissements = "";
        require('mod_etudiant/vue_etudiant/formEtud.php');
    }

    function add_Student(){
        if(empty(htmlspecialchars($_POST['nom'])) || empty(htmlspecialchars($_POST['prenom'])))
            throw new formAjoutEtudException("Impossible d'ajouter l'étudiant. Le nom et le prénom ne sont pas définie");

        if($this->modeleEtud->student_existBD(htmlspecialchars($_POST['nom']),htmlspecialchars($_POST['prenom'])) != 0)
            throw new formAjoutEtudException('Impossible d\'ajouter l\'étudiant. Le nom et le prénom ont déjà été attribué à un étudiant. ['.htmlspecialchars($_POST['nom']).' : '.htmlspecialchars($_POST['prenom']).']');

        $idEtud = $this->modeleEtud->add_studentBD(htmlspecialchars($_POST['numApogee']),$_FILES,htmlspecialchars($_POST['nom']),htmlspecialchars($_POST['prenom']),htmlspecialchars($_POST['dateNaiss']),
        htmlspecialchars($_POST['courriel']),htmlspecialchars($_POST['tel']),htmlspecialchars($_POST['adr1']),htmlspecialchars($_POST['adr2']),htmlspecialchars($_POST['anneePromotion']),htmlspecialchars($_POST['situationActuelle']));

        $this->contEtab->add_etablissement($idEtud);
        self::list_Student();
    }

    function list_Student(){

        $listEtudiant = $this->modeleEtud->get_Students(); 

        require('mod_etudiant/vue_etudiant/listEtud.php');
    }

    function form_updateEtud(){
        //on initialise les variables pour remplir les champs du formulaire
        $action = 'modifierEtudiant&idEtud='.htmlspecialchars($_GET['idEtud']);
        $student = $this->modeleEtud->get_studentBD(htmlspecialchars($_GET['idEtud']));
        $numApo = $student['numApogee'];
        $photoEtud = $student['photoEtud'];
        $nomEtud = $student['nomEtud'];
        $prenom = $student['prenomEtud'];
        $dateNaiss = $student['dateNaiss'];
        $courriel = $student['courriel'];
        $tel = $student['telEtud'];
        $adrr1 = $student['adr1'];
        $adrr2 = $student['adr2'];
        $AnneePromo = $student['anneePromotion'];
        $situationActu = $student['situationActuelle'];

        $etablissements = $this->contEtab->get_etablissement(htmlspecialchars($_GET['idEtud']));
        
        if($photoEtud == "") $photoEtud = 'bootstrap-icons/icons/person.svg';
        if($dateNaiss == '0000-00-00') $dateNaiss = "";
        if($numApo == 0) $numApo = "";
        if($tel == 0) $tel = "" ;
        
        require('mod_etudiant/vue_etudiant/formEtud.php');
    }

    function update_Etud(){
        if(empty(htmlspecialchars($_POST['nom'])) || empty(htmlspecialchars($_POST['prenom']))){
            throw new formModifEtudException("Impossible de modifier l'étudiant. Le nom et le prénom ne sont pas définie");
        }
        //if($this->modeleEtud->student_existBD($_POST['nom'],$_POST['prenom']) != 0)
        //    throw new formModifEtudException('Impossible de modifier l\'étudiant. Le nom et le prénom ont déjà été attribué à un étudiant. ['.htmlspecialchars($_POST['nom']).' : '.htmlspecialchars($_POST['prenom']).']');

         if(!isset($_GET['idEtud'])) {
            throw new formModifEtudException('identifiant inconnu');
        }

        $this->modeleEtud->update_studentBD(htmlspecialchars($_POST['numApogee']),$_FILES,htmlspecialchars($_POST['nom']),htmlspecialchars($_POST['prenom']),htmlspecialchars($_POST['dateNaiss']),
        htmlspecialchars($_POST['courriel']),htmlspecialchars($_POST['tel']),htmlspecialchars($_POST['adr1']),htmlspecialchars($_POST['adr2']),htmlspecialchars($_POST['anneePromotion']),htmlspecialchars($_POST['situationActuelle']),
        htmlspecialchars($_GET['idEtud']));

        //on modifi les etablissement qui existait déjà chez l'étudiant
        $this->contEtab->update_old_etablissement();

        //on rajoute des etablissement à l'étudiant si il y en a des nouveaux
        $this->contEtab->add_etablissement(htmlspecialchars($_GET['idEtud']));

        //on réaffiche la liste des étudiants
        self::list_Student();
    }

    function delete_student(){
        $this->modeleEtud->delete_studentBD(htmlspecialchars($_GET['idEtud']));
        self::list_Student();
    }
    
    public function importer_fichier(){
    require('mod_etudiant/vue_etudiant/importer_fichier.php');
   
}
public function mise_en_forme_du_message ($message,$nom,$prenom){

    $message=str_replace("[nom]", $nom, $message);
    $message=str_replace("[Nom]", $nom, $message);
    $message=str_replace("[NOM]", $nom, $message);
    $message=str_replace("[Prenom]", $prenom, $message);
    $message=str_replace("[PRENOM]", $prenom, $message);
    $message=str_replace("[prénom]", $prenom, $message);
    $message=str_replace("[prenom]", $prenom, $message);

    return $message;
}
public function validation_mail(){
    $list=$_SESSION['list'];
    unset($_SESSION['list']);
                    var_dump($list);

    if(isset($_POST['message']) && isset($_POST['sujet'])){
        $objet=$_POST['sujet'];
        $lesErreur=array();
        for($i=0;$i<count($list);$i++){
            $message=self::mise_en_forme_du_message($_POST['message'],$list[$i]['Nom'],$list[$i]['Prénom']);
            if(!empty($this->modeleEtud->est_present($list[$i]['N° étudiant Apogée']))  || !mail($list[$i]['Courriel personnel'],$objet,$message)){
               /* array_push($lesErreurs,$list[$i]);
                echo $lesErreurs;*/
                echo $list[$i]['N° étudiant Apogée'];
            }else{
                $img='bootstrap-icons/icons/person.svg';
                var_dump($this->modeleEtud->add_studentBD($list[$i]['N° étudiant Apogée'],$list[$i]['Nom'],$list[$i]['Prénom'],$list[$i]['Date naiss'],
                $list[$i]['Date naiss'],$list[$i]['Courriel personnel'],$list[$i]['telephone annuel'],$list[$i]['adr1 annuel'],$list[$i]['adr2 annuel'],$list[$i]['Formation - année promotion'],$list[$i]['Situation actuelle']));
           
        }
        if(!empty($lesErreur)){
            echo'l\'email n\'a pas pu etre envoyé aux eleves suivants :';
            for($i=0;$i<count($lesErreurs);$i++){
                 echo $lesErreurs[$i][Prénom].' '.$lesErreurs[$i][Nom].'</br>';
            }
        }else{
            require('mod_etudiant/vue_etudiant/confirmation_mail.php');
        }
        
        
    }
   
    }
}
public function verification_des_attributs(){
    $attribut = array (trim('Formation - année promotion'),trim('N° étudiant Apogée'),trim('Prénom'),trim('Nom'),trim('Date naiss'),trim('Courriel personnel'),trim('telephone annuel'),trim('adr1 annuel'),trim('adr2 annuel'),trim('Poursuite d\'etude'),trim('Situation actuelle'));
}
public function validation_fichier(){
	 if(isset($_FILES)){

            $nomfichier = $_FILES['fileToUpload']['name']; 
            $extension = strrchr($nomfichier, "."); 
            $tmp_fich = $_FILES['fileToUpload']['tmp_name'];
            $extensions_autorisees = array('.csv');
            if ($_FILES['fileToUpload']['error'] == 0) {
                if(in_array($extension, $extensions_autorisees)){
                    $file = fopen($tmp_fich, 'r');
                    while (!feof($file) ) {
                        $line[] = fgetcsv($file, 1024);
                    }
                    $tab=self::convertisseur_tableau_en_array_par_ligne($line);
                    $_SESSION['list']=$tab;
       		        require('mod_etudiant/vue_etudiant/affichage_importation.php');
                    
     
                } else{
       			    $etat=true;
       		        require('mod_etudiant/vue_etudiant/erreur_fichier.php');
	    
       			   
       			}   
       		}else{
   			     $etat=false;
       		   require('mod_etudiant/vue_etudiant/erreur_fichier.php');
       		}

}
}
 
public function convertisseur_tableau_en_array_par_ligne($tab){

     $array1=array();
        for($i=1;$i<count($tab);$i++){
            for($j=0;$j<count($tab[$i]);$j++){
                $nomTab=trim($tab[0][$j]);
                $a[$nomTab]=$tab[$i][$j];
            }
            array_push($array1,$a);
        }
    return $array1;
}
 
}
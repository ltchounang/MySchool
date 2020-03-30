<?php

require_once('mod_etablissement/modele_etablissement.php');
require_once('mod_generique/controleur_generique.php');

class ContEtablissement extends ContGenerique{

    private $modeleEtab;

    public function __construct () {
        parent::__construct();
        $this->modeleEtab = new ModeleEtablissement();
    }

    public function add_etablissement($idEtud){
        $nbEtab = 1;
        while(isset($_POST['nomEtab'.$nbEtab])){
            $this->modeleEtab->add_etablissementBD(htmlspecialchars($_POST['nomEtab'.$nbEtab]),htmlspecialchars($_POST['typeEtab'.$nbEtab]),
            htmlspecialchars($_POST['dateDeb'.$nbEtab]),htmlspecialchars($_POST['dateFin'.$nbEtab]),htmlspecialchars($_POST['typeFormation'.$nbEtab]),$idEtud);
            $nbEtab ++;
        }
    }

    public function get_etablissement($idEtud){
        return $this->modeleEtab->get_etablissementBD($idEtud);
    }
    
    public function update_old_etablissement(){
        $nbEtab = 1;
        while(isset($_POST['old-idEtab'.$nbEtab])){
            $idEtab = htmlspecialchars($_POST['old-idEtab'.$nbEtab]);
            $this->modeleEtab->update_etablissementBD(htmlspecialchars($_POST['nomEtab'.$idEtab]),htmlspecialchars($_POST['typeEtab'.$idEtab]),
            htmlspecialchars($_POST['dateDeb'.$idEtab]),htmlspecialchars($_POST['dateFin'.$idEtab]),htmlspecialchars($_POST['typeFormation'.$idEtab]),$idEtab,htmlspecialchars($_GET['idEtud']));
            $nbEtab ++;
        }
    }


 
}
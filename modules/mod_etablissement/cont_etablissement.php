<?php

require_once('modules/mod_etablissement/modele_etablissement.php');
require_once('modules/mod_generique/controleur_generique.php');

class ContEtablissement extends ContGenerique{

    private $modeleEtab;

    public function __construct () {
        parent::__construct();
        $this->modeleEtab = new ModeleEtablissement();
    }

    public function form_addEtab(){
        $action = 'ajouterEtablissement';
        $typeEtab = "";
        $nomEtab = "";
        require('modules/mod_etablissement/vue_etablissement/formulaireEtab.php');
    }

    public function add_etablissement(){
        if(empty(htmlspecialchars($_POST['nomEtab'])) || empty(htmlspecialchars($_POST['typeEtab'])))
            throw new formAjoutEtabException("Impossible d'ajouter l'établissement. Le nom ou le type n'a pas été définie");
        else{
            $nomEtab = htmlspecialchars($_POST['nomEtab']);
            $typeEtab = htmlspecialchars($_POST['typeEtab']);
        } 
        if($this->modeleEtab->etab_existBD($nomEtab,$typeEtab,"") != 0)
            throw new formAjoutEtabException('Impossible d\'ajouter l\'établissement car le nom et le type existent déjà. ['.$nomEtab.'] : ['.$typeEtab.']');

        $this->modeleEtab->add_EtabBD($nomEtab,$typeEtab);

        self::back_toPage();
    }

    function form_updateEtab(){//on initialise les variables pour remplir les champs du formulaire

        if(isset($_GET['idEtab'])) {
            $idEtab = $_GET['idEtab'];

            $action = 'modifierEtab&idEtab='.htmlspecialchars($idEtab);
            $etab = $this->modeleEtab->get_EtablissementBD(htmlspecialchars($idEtab));
            
            $typeEtab = $etab['typeEtab'];
            $nomEtab = $etab['nomEtablissement'];
            
            require('modules/mod_etablissement/vue_etablissement/formulaireEtab.php');
        }
        else
            throw new formModifEtabException('identifiant introuvable');

    }

    function back_toPage(){
        if(isset($_POST['pageRetour'])){
            if($_POST['pageRetour'] == "ajouterEtablissement"){
                self::form_addEtab();
            }
            elseif($_POST['pageRetour'] != "lister"){
                self::form_updateEtab();
            }
            else{
                self::liste_Etablissement();
            }
        }
        else{
            self::liste_Etablissement();
        }
    }

    public function add_etablissementEtud($idEtud){
        $nbEtab = 1;
        while(isset($_POST['nomEtab'.$nbEtab])){
            $this->modeleEtab->add_etablissementBD(htmlspecialchars($_POST['nomEtab'.$nbEtab]),htmlspecialchars($_POST['typeEtab'.$nbEtab]),
            htmlspecialchars($_POST['dateDeb'.$nbEtab]),htmlspecialchars($_POST['dateFin'.$nbEtab]),htmlspecialchars($_POST['typeFormation'.$nbEtab]),$idEtud);
            $nbEtab ++;
        }
    }

    public function liste_Etablissement(){
        $listeEtablissement = $this->modeleEtab->get_etablissementsBD();
        $options = '<option class="filtre" value="etudiant">etudiant</option>';

        require_once('modules/mod_etablissement/vue_etablissement/listeEtablissement.php');
    }

    public function get_etablissementEtud($idEtud){
        return $this->modeleEtab->get_etablissementEtudBD($idEtud);
    }

    function update_EtabBD(){
        if(empty(htmlspecialchars($_POST['nomEtab'])) || empty(htmlspecialchars($_POST['typeEtab'])))
            throw new formModifEtabException("Impossible d'ajouter l'établissement. Le nom ou le type n'a pas été définie");
        else{
            $nomEtab = htmlspecialchars($_POST['nomEtab']);
            $typeEtab = htmlspecialchars($_POST['typeEtab']);
            $idEtab = htmlspecialchars($_GET['idEtab']);
        } 

        if($this->modeleEtab->etab_existBD($nomEtab,$typeEtab,$idEtab) != 0)
            throw new formModifEtabException('Impossible d\'ajouter l\'établissement car le nom et le type existent déjà. ['.$nomEtab.'] : ['.$typeEtab.']');

        $this->modeleEtab->update_etablissementBD($nomEtab,$typeEtab,$idEtab);

        self::back_toPage();
    }

    public function update_old_etablissement(){
        $nbEtab = 1;
        while(isset($_POST['old-idEtab'.$nbEtab])){
            $idEtab = htmlspecialchars($_POST['old-idEtab'.$nbEtab]);
            $this->modeleEtab->update_etablissementEtudBD(htmlspecialchars($_POST['nomEtab'.$idEtab]),htmlspecialchars($_POST['typeEtab'.$idEtab]),
            htmlspecialchars($_POST['dateDeb'.$idEtab]),htmlspecialchars($_POST['dateFin'.$idEtab]),htmlspecialchars($_POST['typeFormation'.$idEtab]),$idEtab,htmlspecialchars($_GET['idEtud']));
            $nbEtab ++;
        }
    }

    public function supp_EtabDeEtudiantBD($idEtud,$idEtab){
        $this->modeleEtab->supp_EtabDeEtudiantBD($idEtud,$idEtab);
    }

    public function detail_Etab(){
        $etab = $this->modeleEtab->get_EtablissementBD(htmlspecialchars($_GET['idEtab']));
        $listEtudiant = $this->modeleEtab->get_EtudiantEtabBD(htmlspecialchars($_GET['idEtab']));
        
        $detail = 'etablissement';
        $typeEtab = $etab['typeEtab'];
        $nomEtab = $etab['nomEtablissement'];

        require('modules/mod_etablissement/vue_etablissement/detailEtab.php');

    }

    public function delete_etab(){
        $this->modeleEtab->delete_etabBD(htmlspecialchars($_GET['idEtab']));
        self::liste_Etablissement();
    }
}

<?php

$doc_root = $_SERVER['DOCUMENT_ROOT'];

require_once $doc_root."/modules/mod_generique/connexionBD.php";


$resultat = "";
if(!empty($_POST['idEtud']) && !empty($_POST['nom'])){
    $resultat = getName_student(htmlspecialchars($_POST['idEtud']));
}
elseif(!empty($_POST['idEtud'])){
    delete_student(htmlspecialchars($_POST['idEtud']));
}

if(!empty($_POST['idEtud']) && !empty($_POST['detailGroupe'])){

}
elseif(!empty($_POST['idEtud']) && !empty($_POST['detailEtab'])){

}

if(!empty($_FILES)){
    get_RootFile(htmlspecialchars($_FILES));
}

if(!empty($_POST['numApogee'])){
    numApogee_existe(htmlspecialchars($_POST['numApogee']));
}

/*function get_RootFile($file){
    global $resultat;

    if(!empty($file)) {
        $file_name = $file['img']['name'];
        $file_tmp_name = $file['img']['tmp_name'];
        $file_dest = 'modules/mod_etudiant/photos/'.$file_name;
        $file_extension = strrchr($file_name, ".");
    
        $extensions_autorises = array('.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF');
        if(in_array( $file_extension, $extensions_autorises)) {
            if (move_uploaded_file($file_tmp_name, $file_dest)) {
                if($_FILES['img']['error'] == 0) {
                    $resultat = $file_dest;
                }
                else{
                    $resultat = 'erreur nom de l\'image non attribué dans la BD' ;
                }
            }
            else
                $resultat = 'Erreur lors de la récupération de l\'image';
        }
        else {
            $resultat = 'On ne peut pas uploader un fichier qui n\'est pas une image !';
        }
    }
}*/
function getName_student($idEtud){
    global $resultat;
    global $bdG;
    
    $req = $bdG->prepare('SELECT * FROM etudiant where idEtud = ?');
    $req->execute(array($idEtud));
    $data = $req->fetch();
    return 'Etudiant '.$data['nomEtud'].' '.$data['prenomEtud'].' supprimé';
}

function get_Groupe($idEtud){
    global $resultat;
        $req = $bdG->prepare('SELECT * FROM groupe inner join apparteniraugroupe using(idGroupe) where apparteniraugroupe.idEtud = ?');
        $req->execute(array($idEtud));
        //$donnees = $req->fetch();
        //return $donnees;
        if (!empty($req)) {
             $liste = $req->fetchAll();
            foreach ($liste as $donnees) {
                $resultat = $resultat.'<p id="divModal2P">'.$donnees['nomGroupe'].'</p>';
            }
        }
}

function get_Etab($idEtud){
    global $resultat;
        $req = $bdG->prepare('SELECT * FROM groupe inner join apparteniraugroupe using(idGroupe) where apparteniraugroupe.idEtud = ?');
        $req->execute(array($idEtud));
        //$donnees = $req->fetch();
        //return $donnees;
        $resultat = 'groupe';
        if (!empty($req)) {
             $liste = $req->fetchAll();
            foreach ($liste as $donnees) {
                $resultat = $resultat.'<p id="divModal2P">'.$donnees['typeEtab'].' '.$donnees['nomEtablissement'].'</p>';
            }
        }
}

function delete_student($idEtud){
    global $resultat;
    global $bdG;

    $req = $bdG->prepare('DELETE FROM former where idEtud = ?');
    $req->execute(array($idEtud));

    $req = $bdG->prepare('DELETE FROM apparteniraugroupe where idEtud = ?');
    $req->execute(array($idEtud));

    $req = $bdG->prepare('DELETE FROM etudiant where idEtud = ?');
    $req->execute(array($idEtud));
}

function numApogee_existe($numApoge){
    global $resultat;
    global $bdG;
    $req = $bdG->prepare('SELECT * FROM etudiant where numApogee = ?');
    $req->execute(array($numApoge));
    $data = $req->fetch();

    if($data['numApogee'] != 0){
        $resultat = 'Le numéro Apogee '.$numApoge.'a déjà été attribué' ;
    }

}

echo $resultat;
?>
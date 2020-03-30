<<<<<<< dev
<?php
header('Content-type: application/json');
$doc_root = $_SERVER['DOCUMENT_ROOT'];

require_once $doc_root."/mod_generique/connexionBD.php";

$trie = htmlspecialchars($_GET['trier']);
if(empty($_GET['element'])){$element = false;}
else{$element =  htmlspecialchars($_GET['element']);}
if($trie == 'idEtud')$trie = $trie.' , nomEtud desc ';

$limit = 15;

if($element != false){
    $req = $bdG->prepare('SELECT * from etudiant where nomEtud LIKE (?) or prenomEtud LIKE (?) order by '.$trie.' LIMIT '.$limit.'');
    $req->execute(array("%$element%","%$element%"));
}else{
    $req = $bdG->prepare('SELECT * from etudiant order by '.$trie.' LIMIT '.$limit.'');
    $req->execute(array($trie));
}
ob_start();
$i = 0;
if(!empty($req)){
    $listEtudiant = $req->fetchAll();
    foreach ($listEtudiant as $donnees) {
        if($donnees['photoEtud'] == NULL)$donnees['photoEtud'] = 'bootstrap-icons/icons/person.svg' ;
        if($donnees['numApogee'] == '0')$donnees['numApogee'] = "Non renseigné";
        if($donnees['dateNaiss'] == '0000-00-00')$donnees['dateNaiss'] = "Non renseigné";
        if($donnees['telEtud'] == '0')$donnees['telEtud'] = "Non renseigné";
        if($donnees['courriel'] == NULL)$donnees['courriel'] = "Non renseigné";
        if($donnees['adr1'] == NULL)$donnees['adr1'] = "Non renseigné";
        if($donnees['situationActuelle'] == NULL)$donnees['situationActuelle'] = "Non renseigné";
        if($donnees['anneePromotion'] == NULL)$donnees['anneePromotion'] = "Non renseigné";

        $i ++;
        require $doc_root."/mod_etudiant/vue_etudiant/etudiant.php";

    }
}  

$content = ob_get_clean(); 

echo json_encode($content);

=======
<?php
header('Content-type: application/json');
$doc_root = $_SERVER['DOCUMENT_ROOT'];

require_once $doc_root."/mod_generique/connexionBD.php";

$filtre = htmlspecialchars($_GET['filtrer']);
$trie = htmlspecialchars($_GET['trier']);
if(empty($_GET['element'])){$element = false;}
else{$element =  htmlspecialchars($_GET['element']);}
if($trie == 'idEtud')$trie = $trie.' , nomEtud desc ';

$limit = 15;

if($_GET['filtrer'] == 'etudiant'){
    if($element != false){
        $req = $bdG->prepare('SELECT * from etudiant where nomEtud LIKE (?) or prenomEtud LIKE (?) order by '.$trie.' LIMIT '.$limit.'');
        $req->execute(array("%$element%","%$element%"));
    }else{
        $req = $bdG->prepare('SELECT * from etudiant order by '.$trie.' LIMIT '.$limit.'');
        $req->execute(array($trie));

}
ob_start();

if(!empty($req)){
    $listEtudiant = $req->fetchAll();
    foreach ($listEtudiant as $donnees) {
        if($donnees['photoEtud'] == NULL)$donnees['photoEtud'] = 'bootstrap-icons/icons/person.svg' ;
        if($donnees['numApogee'] == '0')$donnees['numApogee'] = "Non renseigné";
        if($donnees['dateNaiss'] == '0000-00-00')$donnees['dateNaiss'] = "Non renseigné";
        if($donnees['telEtud'] == '0')$donnees['telEtud'] = "Non renseigné";
        if($donnees['courriel'] == NULL)$donnees['courriel'] = "Non renseigné";
        if($donnees['adr1'] == NULL)$donnees['adr1'] = "Non renseigné";
        if($donnees['situationActuelle'] == NULL)$donnees['situationActuelle'] = "Non renseigné";
        if($donnees['anneePromotion'] == NULL)$donnees['anneePromotion'] = "Non renseigné";

require $doc_root."/mod_etudiant/vue_etudiant/etudiant.php";

            }
        }  
$content = ob_get_clean(); 

}
else{//on affiche par rapport au filtre selectionné
    $req = $bdG->query('SELECT * from etudiant order by idEtud desc');

    ob_start();

    if(!empty($req)){
        $listEtudiant = $req->fetchAll();
        foreach ($listEtudiant as $donnees) {
        if($donnees['photoEtud'] == NULL)$donnees['photoEtud'] = 'bootstrap-icons/icons/person.svg' ;
        if($donnees['numApogee'] == '0')$donnees['numApogee'] = "Non renseigné";
        if($donnees['dateNaiss'] == '0000-00-00')$donnees['dateNaiss'] = "Non renseigné";
        if($donnees['telEtud'] == '0')$donnees['telEtud'] = "Non renseigné";
        if($donnees['courriel'] == NULL)$donnees['courriel'] = "Non renseigné";
        if($donnees['adr1'] == NULL)$donnees['adr1'] = "Non renseigné";
        if($donnees['situationActuelle'] == NULL)$donnees['situationActuelle'] = "Non renseigné";
        if($donnees['anneePromotion'] == NULL)$donnees['anneePromotion'] = "Non renseigné";

    require $doc_root."/mod_etudiant/vue_etudiant/etudiant.php";

                }
            }  
    $content = ob_get_clean(); 

}

echo json_encode($content);

>>>>>>> yanis&Quoc
?>
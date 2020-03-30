



$(document).ready(function(){

    function afficheTrieEtud(){
        $('#trier').html('<option value="idEtud" >id</option>'+
        '<option value="numApogee" >numero apogee</option>'+
        '<option value="nomEtud" >nom</option>'+
        '<option value="prenomEtud" >prenom</option>'+
        '<option value="dateNaiss" >date de naissance</option>');
    }
    afficheTrieEtud();

    $('#filtrer').change(function(){
        let filtre = $(this).val();
        if(filtre != 'etudiant'){
            $('#trier').html('<option value="idEtablissement" > idEtab </option>'+
            '<option value="nomEtablissement"  > nomEtablissement </option>'+
            '<option value="typeEtab" >type Etablissement</option>');
        }else{
            afficheTrieEtud();
        }
    });

    function afficheResultatRecherche(elementRecherche){
        let trieRecherche = $('#trier').val();
        let filtreRecherche = $('#filtrer').val();
        $.ajax({ 
            url: "mod_composant/ajax/ajax_barreRecherche.php", 
            method: "GET",
            dataType: "json",
            data : {trier : trieRecherche,
                element : elementRecherche,
                filtrer : filtreRecherche},
            success: function(data){
               $('#resultat-recherche').html(data);
            } ,
            error: function(data) {
                alert(" Probleme d'accès au serveur !");
            }
        });
    }
    
    $('#trier').change(function(){
        afficheResultatRecherche("");
    });

    $('#filtrer').change(function(){
        afficheResultatRecherche("");
    });

    $('#elementRecherche').keyup(function(){
        afficheResultatRecherche($(this).val());
    });

});




$(document).ready(function(){

    function afficheResultatRecherche(elementRecherche){
        let trieRecherche = $('#trier').val();
        $.ajax({ 
            url: "modules/mod_composant/ajax/ajax_barreRecherche.php", 
            method: "GET",
            dataType: "json",
            data : {trier : trieRecherche,
                element : elementRecherche
            },
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

    $('#elementRecherche').keyup(function(){
        afficheResultatRecherche($(this).val());
    });

});
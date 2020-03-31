function chargerPhotoEtud()  {
  var imgChargee = document.getElementById("inputGroupFile01").value;
  document.getElementById("photoEtud").src = imgChargee;  
}

$(document).ready(function(){

  $('.toast').toast('show');

//affiche l'image que l'utilisateur viens de selectionner
/*$("#phtoSelect").change(function(){
    let img = $('#phtoSelect').val();
    console.log(img);
    $('#photoEtud').attr('src',img);
    $('#nomPhoto').html(img);
  });*/

let adresse2 = false;
  $('#adresse2').click(function(){
    if(adresse2 == false){
      adresse2 = true;
      $('#contenuAdresse2').slideDown(700);
      $('#adresse2').html('-');
    }
    else{
      adresse2 = false;
      $('#contenuAdresse2').val("");
      $('#contenuAdresse2').slideUp(700);
      $('#adresse2').html('+');
    }
  });

  let situationActuelle = false;
  $('#situationActuelle').click(function(){
    if(situationActuelle == false){
      situationActuelle = true;
      $('#contenuSituationActuelle').slideDown(700);
      $('#situationActuelle').html('-');
    }
    else{
      situationActuelle = false;
      $('#contenuSituationActuelle').val("");
      $('#contenuSituationActuelle').slideUp(700);
      $('#situationActuelle').html('+');
    }
  });

/*
 permet d'ajouter ou supprimer des champs pour pour l'ajout d'etblissements
 de manière dynamique.
  possibiliter d'ajouter plusieurs etablissement en même temps
*/
  let type = "";
  $('#ajoutEcole').click(function(){
    type = $('#ajoutEcole').attr("typeEtab");
  });

  $('#ajoutEntreprise').click(function(){
    type = $('#ajoutEntreprise').attr("typeEtab");
  });

  let nbEtab = 0;
  $('.ajoutEtab').click(function(){
    if(nbEtab < 4){
      nbEtab ++;
      $('#formEtab').append('<div id="etab'+nbEtab+'" style="display:none;" class="container-fluid etablissement" >'+
      '<div class="row">'+
          '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">'+
              '<div class="formInfo form-group inputFormEtud">'+
                  '<span>Nom de l\''+type+' : </span><input name="nomEtab'+nbEtab+'" type="text" placeholder="nom de l\''+type+' " required></br>'+
              '</div>'+

              '<div class="formInfo form-group inputFormEtud" >'+
                  '<span> Date de début détude : </span><input type="date" name="dateDeb'+nbEtab+'"'+
                              'value="" min="2050-00-00" >'+
              '</div>'+

              '<div class="formInfo form-group inputFormEtud" >'+ 
                  '<span> Date de fin détude : </span><input type="date" name="dateFin'+nbEtab+'"'+
                          'value="" min="2050-00-00" >'+
              '</div>'+
          '</div>'+
          '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">'+
              '<sapn > Type de formation :</span>'+
              '<textarea name="typeFormation'+nbEtab+'" class="form-control z-depth-1" rows="3" class="infos" placeholder="Que fait l\'étudiant dans cette formation" ></textarea>'+
              '<span> Etablissement : </span><input type="text" name="typeEtab'+nbEtab+'" value="'+type+'" >'+
            '</div>'+

      '</div>'+
  '</div>');
      $('#etab'+nbEtab).slideDown(700);
      
    }
    else{
      alert('limite d\'ecole atteinte pource formulaire');
    }
  });

  $('#suppEtab').click(function(){
    if(nbEtab >= 1){
      $('#etab'+nbEtab).remove();
      nbEtab --;
    }
  });

  $('.details').click(function(){
    idDetailEtud = $(this).val();
    $('.modal-body').find($('#groupe'+idDetailEtud).html(""));
      $.post(
        'modules/mod_etudiant/ajax/ajax_etudiant.php', // Le fichier cible côté serveur.
        {
          idEtud : idDetailEtud,
          detailGroupe : true
        },
        print_detailsGroupe, // Nous renseignons uniquement le nom de la fonction de retour.
        'text' // Format des données reçues.
        ); 
    });

    function print_detailsGroupe(groupes){
      $('#groupe'+idDetailEtud).html(groupes);
    }
    function print_detailsEtablissement(etablissements){
      $('#etablissemnt'+idDetailEtud).html(etablissements);
    }

    let idDetailEtud = null;
    $('.modal-body').find($('#groupe'+idDetailEtud)).click(function(){
      alert(this.val());
    });
  let supprimer = true;

  $('.suppEtud').click(function(){
    supprimer = true;
    idEtudiant = $(this).val();
    $('#etud'+idEtudiant).slideUp();
    // $("#contenuNotif").html('Etudiant supprime');
    //$("#messConnect").css('display','none');
      $.post(
        'modules/mod_etudiant/ajax/ajax_etudiant.php', // Le fichier cible côté serveur.
        {
          idEtud : idEtudiant,
          nom : true
        },
        print_nomPrenom, // Nous renseignons uniquement le nom de la fonction de retour.
        'text' // Format des données reçues.
        );
      }); 

  function print_nomPrenom(nom){
    $("#messConnect").css('display','block');
    $("#annulerSupp").css('display','block');
    $("#contenuNotif").html(nom);
    setTimeout(function(){
      if(supprimer == true){
          $.post(
            'modules/mod_etudiant/ajax/ajax_etudiant.php', // Le fichier cible côté serveur.
            {
              idEtud : idEtudiant
            }, // Nous renseignons uniquement le nom de la fonction de retour.
            'text' // Format des données reçues.
            );

        }
        $("#messConnect").css('display','none');
    }, 2050);
  }

  $('#annulerSupp').click(function(){
    $("#messConnect").css('display','none');
    $('#etud'+idEtudiant).slideDown();
    supprimer = false;
  });

  $('#numApogee').keyup(function(){
    let numApo = $(this).val();
    $.post(
      'modules/mod_etudiant/ajax/ajax_etudiant.php',
      {
        numApogee : numApo
      },
      notif_apogee,
      'text' 
    );
  });

  function notif_apogee(resultat){
    let message = resultat['message'];
    console.log('voici '+message);
    console.log(resultat.length);
    if(resultat.length != 2){
      $("#messConnect").css('display','block');
      $("#contenuNotif").html(resultat);
      setTimeout(function(){
        $("#messConnect").css('display','none');
      }, 2060);
    }else{
      console.log(resultat);
    } 
  }

}); 



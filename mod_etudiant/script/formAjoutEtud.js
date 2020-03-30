  


$(document).ready(function(){
  $('.toast').toast('show');
/* 
//affiche l'image que l'utilisateur viens de selectionner
$("#phtoSelect").change(function(){
    let img = $('#phtoSelect').val();
    console.log(img);
    $('#photoEtud').attr('src',img);
  });
*/

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

}); 



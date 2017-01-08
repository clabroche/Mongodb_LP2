
function chargerCommentaire(pointInteret) {
  let vueCommentaires = $('<ul>').addClass('commentaires');
  $.ajax({
    url: '/api/commentaires',
    type: 'GET',
    dataType: 'json',
    data:{'nom':pointInteret.nom}
  })
  .done(function(commentaires) {
  console.log(commentaires);
    commentaires.forEach(commentaire => {
      vueCommentaires.append('<li class="commentaire"> '+ commentaire.commentaire +'</li>')
    });
  })
  .fail(function(error) {
    console.log(error.responseText);
  })
  .always(function() {

  });

  $('.espaceCommentaire').html(vueCommentaires)
}



function commentaire(pointInteret) {
  let container = $('<div>')
  let commentaire = $("<input type='text' name='commentaire' id='commentaireinput' placeholder=\"Votre commentaire\">")
  let submit = $("<button id='point_submit'>Ajouter un commentaire</button>")
  submit.click(function(event) {
    $.ajax({
      url: '/api/commentaire',
      type: 'POST',
      dataType: 'json',
      data: {"nom": pointInteret.nom,"commentaire":commentaire.val()}
    })
    .done(function(data) {
      console.log(data);
    })
    .fail(function(error) {
      console.log(error.responseText);
    })
    .always(function() {
      console.log("complete");
    });
    chargerCommentaire(pointInteret)
  });
  container.append([commentaire, submit])

  return container;

}

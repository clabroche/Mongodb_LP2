function modale(content) {
  let modaleContainer = $('<div>').addClass('modaleContainer')
  modaleContainer.append(content)
  let close = $('<div>').addClass('closeModale')
  $('.mainContainer').css('filter', 'blur(10px)');
  closeModale(close);
  $('body').append([close,modaleContainer])
}


function closeModale(element) {
  element.click(function(event) {
    $('.mainContainer').css('filter','none')
    $('.closeModale').remove();
    $('.modaleContainer').remove();
  });
}



$('button.addPointInteret').click(function(event) {
  let formulaire = $(""+
    "<label>Localité:</label><input type='text' name='address' id='adress_autocomplete' />" +
    "<label>Nom du point:</label><input type='text' name='point_name' id='point_name' placeholder=\"Nom du point d'interet\">" +
    "<label>Description:</label><input type='text' name='point_description' id='point_description' placeholder=\"Description du point d'interet\">" +
    "<button id='point_submit'>Ajouter Point d'interet</button>")
    modale(formulaire);
    insertPointInteret()
    closeModale($('#point_submit'))
});

$('button.searchPointInteret').click(function(event) {
  let formulaire = $("<input type='text' name='address' id='ville_autocomplete' /><button id='search_submit'>Rechercher</button>");
  modale(formulaire);
  searchPointInteret()
  closeModale($('#search_submit'))
});

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

function formEvenement(pointName) {
$('button#addEvenement').click(function(event) {
  let formulaire = $("<label>Nom de l'évenement</label><input type='text' name='ev_name' id='event_name' placeholder=\"Nom de l'évenement\">" +
  "<label>Description de l'évenement</label><input type='text' name='ev_desc' id='event_desc' placeholder=\"Description de l'évenement\">" +
  "<label>Date de l'évenement (jj/mm/yyyy)</label><input type='text' name='ev_date' id='event_date' placeholder=\"jj/mm/yyyy\">" +
  "<button id='event_submit'>Ajouter l'évenement</button>")
  modale(formulaire);
  $('#event_submit').click(function(event) {
      insertEvenement(pointName)
  });
  closeModale($('#event_submit'))
});
}

$('button.addPointInteret').click(function(event) {
  let formulaire = $("<input type='text' name='address' id='adress_autocomplete' />" +
    "<input type='text' name='point_name' id='point_name' placeholder=\"Nom du point d'interet\">" +
    "<input type='text' name='point_description' id='point_description' placeholder=\"Description du point d'interet\">" +
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

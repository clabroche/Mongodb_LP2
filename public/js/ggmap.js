var myLatLng = {lat: 47.227638, lng: 2.280435};

var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 4,
  center: myLatLng
});
$.ajax({url: '/api/point',type: 'GET',dataType: 'json'})
.done(function(data) {
  data.forEach(pointInteret => {
    var marker = new google.maps.Marker({
      position: {lat:parseFloat(pointInteret.x),lng:parseFloat(pointInteret.y)},
      map: map,
      title: 'Hello World !'
    });
    marker.setMap(map);
    listenerMarker(marker,pointInteret)
  });
})

function getEvenements(pointInteret) {
  var text = "";
  var values = {point: pointInteret.evenements};
  $.ajax({url: 'api/evenements',type: 'POST', data: values, dataType: 'json'})
  .done(function(data) {
    $('#descriptionContainer').append("<h3>Liste d'évenements</h3><br>");
    data.forEach(evenement => {
      $('#descriptionContainer').append("<div class=\"event\" id=\""+evenement.id.$oid+"\">"+evenement.nom+"</div>");
    })
    $('.event').click(function(event) {
      getSpecificEvent(event.target.id);
    });

  }).fail(function(error) {
    console.log(error.responseText);
  })
  return text;
}

function getSpecificEvent(id) {
  var values = {event_id: id};
  $.ajax({url: 'api/event',type:'POST',data: values, dataType: 'json'})
  .done(function(data) {
    let br = $("<br>");
    let titre = $("<h3>").text(data.nom);
    let description = $("<div>").text("Description : "+data.description);
    let date = $("<div>").text("Date de l'évenement : "+data.date);
    $('#descriptionContainer').html([titre,br,description,br,date]);
  });
}

function listenerMarker(marker,pointInteret) {
  marker.addListener('click',_=>{
    let nom = $("<div>").addClass('nomInteret').text(pointInteret.nom)
    let description = $('<div>').addClass('descriptionInteret').text('Description: ' + pointInteret.description)
    let espaceCommentaire = $('<div>').addClass('espaceCommentaire');
    let addevent = $('<button>').prop('id','addEvenement').text('Ajouter un Evenement')
    let hr = $('<hr>');
    let vueCommentaire = commentaire(pointInteret);
    $('#descriptionContainer').html([nom,description,espaceCommentaire,hr,vueCommentaire,addevent])
    chargerCommentaire(pointInteret);
    formEvenement(pointInteret.nom);
    let evenements = getEvenements(pointInteret);
  })
}

function insertEvenement(pointInteret) {
  var values = {event_name: document.getElementById('event_name').value, event_desc: document.getElementById('event_desc').value, point_name: pointInteret, event_date: document.getElementById('event_date').value};
  console.log("avant ajax");
  $.ajax({url: '/api/evenement', type: 'POST',data: values ,dataType: 'json',})
  .done(function(data) {
    console.log(data);
  }).fail(function(error) {
    console.log(error.responseText);
  })
}


function insertPointInteret() {
  var options = {types:['address'] , componentRestrictions:{country: 'fr'}};
  var input = document.getElementById('adress_autocomplete');
  var submit = document.getElementById('point_submit');
  autocomplete = new google.maps.places.Autocomplete(input, options);
  $("#point_submit").click(function() {
      var place = autocomplete.getPlace();
      var location ={lat: place.geometry.location.lat(), lng: place.geometry.location.lng()};
      var values = {lat: place.geometry.location.lat(), lng: place.geometry.location.lng(), point_name:$("#point_name").val(),point_description:$("#point_description").val()};
      var city_name = "";
      for(let elem of place.address_components) {
        if (elem.types[0] == "locality") {
          values.city_name = elem.long_name;
        }
      }
      $.ajax({url: '/api/point',type: 'POST',data: values,dataType: 'json',})
      .done(function(data) {
        var marker = new google.maps.Marker({position: location,map: map});
        marker.setMap(map);
        listenerMarker(marker,data)
      })
  });
}

function searchPointInteret() {
  var options = {types:['(cities)'] , componentRestrictions:{country:'fr'}};
  var input = document.getElementById('ville_autocomplete');
  let searchInteretAutocomplete = new google.maps.places.Autocomplete(input, options);
  $("#search_submit").click(function(event) {
      var place = searchInteretAutocomplete.getPlace();
      $.ajax({url: '/api/ville',type: 'POST',dataType: 'json',data: {'name': place.name}})
      .done(function(ville) {
        let ul = $('<ul>').addClass('list').prop('id','listePointInteret');
        ville.pointsInteret.forEach(pointInteret => {
          ul.append($('<li>').addClass('listItem').prop('id','pointInteret').text('nom: ' + pointInteret.nom + ' Description:' + pointInteret.description));
        });

        $('#descriptionContainer').text('Listes des points d\'interet dans la ville ' + ville.nom);
        $('#descriptionContainer').append(ul);
      });
  });
}

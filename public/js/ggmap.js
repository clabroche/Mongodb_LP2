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
      title: 'Hello World!'
    });
    marker.setMap(map);
    marker.addListener('click',_=>{
      console.log(pointInteret.description);
      let titre = $("<div>").text('Propriétés du point d\'interet: ')
      let nom = $("<div>").text('Nom: '  +pointInteret.nom)
      let description = $('<div>').text('Description: '  + pointInteret.description)
      $('#descriptionContainer').html([titre,nom,description])
    })
  });
})


// insertion
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
    var marker = new google.maps.Marker({position: location,map: map});
    marker.setMap(map);
    $.ajax({url: '/api/point',type: 'POST',data: values})
});




//recherche

var options = {types:['(cities)'] , componentRestrictions:{country:'fr'}};
var input = document.getElementById('ville_autocomplete');
let searchInteretAutocomplete = new google.maps.places.Autocomplete(input, options);
searchInteretAutocomplete.addListener('place_changed', _=> {
    var place = searchInteretAutocomplete.getPlace();
    console.log(place.name);
    $.ajax({url: '/api/ville',type: 'POST',dataType: 'json',data: {'name': place.name}})
    .done(function(ville) {
      console.log(ville);
      let ul = $('<ul>').addClass('list').prop('id','listePointInteret');
      ville.pointsInteret.forEach(pointInteret => {
        ul.append($('<li>').addClass('listItem').prop('id','pointInteret').text('nom: ' + pointInteret.nom + ' Description:' + pointInteret.description));
        console.log(pointInteret.nom);
      });
      $('#descriptionContainer').text('Listes des points d\'interet dans la ville ' + ville.nom);
      $('#descriptionContainer').append(ul);
    });
});

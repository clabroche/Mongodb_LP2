var myLatLng = {lat: 47.227638, lng: 2.280435};

var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 4,
  center: myLatLng
});
$.ajax({url: '/api/point',type: 'GET',dataType: 'json'})
.done(function(data) {
  console.log(data);
  data.forEach(pointInteret => {
    console.log(pointInteret.y);
    var marker = new google.maps.Marker({
      position: {lat:parseFloat(pointInteret.x),lng:parseFloat(pointInteret.y)},
      map: map,
      title: 'Hello World!'
    });
    marker.setMap(map);
    marker.addListener('click',_=>{
      console.log(marker);
      $('#latitude').text(marker.position.lat());
      $('#longitude').text(marker.position.lng());
    })
  });
})
.fail(function(a,b,c) {

  console.log(a);
  console.log(b);
  console.log(c);
})
.always(function() {
  console.log("complete");
});


// insertion
var options = {
types: ['address'],
componentRestrictions: {country: 'fr'}
};
var input = document.getElementById('adress_autocomplete');
autocomplete = new google.maps.places.Autocomplete(input, options);
autocomplete.addListener('place_changed', function() {

    var place = autocomplete.getPlace();
    var location ={lat: place.geometry.location.lat(), lng: place.geometry.location.lng()};
    console.log(place);
    var marker = new google.maps.Marker({
      position: location,
      map: map,
      title: 'Hello World!'
    });

    marker.setMap(map);
    $.ajax({url: '/api/point',type: 'POST',data: location})
    .done(function(data) {
      console.log(data);
    })


});




//recherche

var options = {
types: ['(cities)'],
componentRestrictions: {country: 'fr'}
};
var input = document.getElementById('ville_autocomplete');
autocomplete = new google.maps.places.Autocomplete(input, options);
autocomplete.addListener('place_changed', function() {
    var place = autocomplete.getPlace();
    console.log(place.name);
    $.ajax({url: '/api/ville',type: 'GET',data: {ville:place.ville})
    .done(function(data) {
      console.log(data);
    })
    .fail(error){
      console.log(error);
    }

});

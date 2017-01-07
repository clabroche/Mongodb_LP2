var myLatLng = {lat: 47.227638, lng: 2.280435};

var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 4,
  center: myLatLng
});
$.ajax({
  url: '/api/point',
  type: 'GET',
  dataType: 'json'
})
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
    $.ajax({
      url: '/api/point',
      type: 'POST',
      data: location
    })
    .done(function(data) {

      console.log(data);

    })
    .fail(function(a,b,c) {

      console.log(a);
      console.log(b);
      console.log(c);
    })
    .always(function() {
      console.log("complete");
    });


});

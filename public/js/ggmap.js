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
  data.forEach(pointInteret => {
    var marker = new google.maps.Marker({
      position: {lat:parseFloat(pointInteret.x),lng:parseFloat(pointInteret.y)},
      map: map,
      title: 'Hello World!'
    });
    marker.setMap(map);
  });
})



var options = {
types: ['address'],
componentRestrictions: {country: 'fr'}
};
var input = document.getElementById('adress_autocomplete');
var submit = document.getElementById('point_submit');
autocomplete = new google.maps.places.Autocomplete(input, options);
$("#point_submit").click(function() {

    var place = autocomplete.getPlace();
    var location ={lat: place.geometry.location.lat(), lng: place.geometry.location.lng()};
    var values = {lat: place.geometry.location.lat(), lng: place.geometry.location.lng(), point_name:$("#point_name").val()};
    var city_name = "";
    for(let elem of place.address_components) {
      if (elem.types[0] == "locality") {
        values.city_name = elem.long_name;
      }
    }
    var marker = new google.maps.Marker({
      position: location,
      map: map,
      title: 'Hello World!'
    });
    marker.setMap(map);
    $.ajax({
      url: '/api/point',
      type: 'POST',
      data: values,
      dataType: 'json'
    })
    .done(function(data) {
      console.log(data);
    })
    .fail(function(a,b,c) {

      console.log(a.responseText);
      console.log(b);
      console.log(c);
    })


});

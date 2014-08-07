var map;

$(document).ready(function() {
    
    var options = {
		center: new google.maps.LatLng(54.305, -130.305),
		zoom: 15,
		panControl: false,
		zoomControl: false,
		streetViewControl: false,
		mapTypeControl: false
	};

	map = new google.maps.Map(document.getElementById("mapette"), options);

	createMarker();
});

function createMarker() 
{
	var latLng = new google.maps.LatLng($(".lat-input").val(), $(".lng-input").val());
	var marker = new google.maps.Marker({
		position: latLng,
		map: map
	});
	
	map.setCenter(latLng);
}
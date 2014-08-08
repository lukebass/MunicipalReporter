var map;
var marker;

$(document).ready(function() {
    
    var options = {
		center: new google.maps.LatLng(54.310, -130.310),
		zoom: 14,
		panControl: false,
		streetViewControl: false,
		mapTypeControl: false
	};

	map = new google.maps.Map(document.getElementById("map"), options);

	google.maps.event.addListener(map, 'click', function(e) {
		placeMarker(e.latLng);
	});
});

function placeMarker(pos)
{	
    $(".save-btn").show();  

    if(marker) {
    	marker.setPosition(pos);
    	map.panTo(pos);
    }
    else {
    	marker = new google.maps.Marker({
			position: pos,
			map: map,
			draggable: true
		});

		map.panTo(pos);
    }  	
}

function getLoc()
{
	$(".lat-input").val(marker.position.lat());
	$(".lng-input").val(marker.position.lng());
}

function currentLoc()
{	
	navigator.geolocation.getCurrentPosition(function(pos) {
		var latLng = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);
		placeMarker(latLng);
	});
}
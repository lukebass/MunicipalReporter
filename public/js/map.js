var map;
var info;

$(document).ready(function() {
    
    var options = {
		center: new google.maps.LatLng(54.305, -130.305),
		zoom: 13,
		streetViewControl: false
	};

	map = new google.maps.Map(document.getElementById("map"), options);

	getMarkers();
});

function getMarkers()
{
 	$.get('marker', function(data) {
	   	for (i = 0; i < data.length; i++) {
	    	createMarker(data[i])
	    }
	});
}

function createMarker(mark)
{
	var latLng = new google.maps.LatLng(mark.lat, mark.lng);
	var marker = new google.maps.Marker({
		position: latLng,
		map: map
	});

	var content = '<div class=content><p><strong>'+mark.problem+'</strong></p><p>'+mark.comments+'</p><p class=last-group><a href=marker/'+mark.id+'>View</a></p></div>';

	google.maps.event.addListener(marker, 'click', function(e) {
		if(info) {
			info.close();
		}

		info = new google.maps.InfoWindow({
			content: content,
			maxWidth: 300
		});

		map.panTo(e.latLng);
		info.open(map, marker);
	});
}
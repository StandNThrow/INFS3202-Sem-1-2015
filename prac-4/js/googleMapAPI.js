var infoWindow = new google.maps.InfoWindow;
var latlngbounds = new google.maps.LatLngBounds();
var geocoder = new google.maps.Geocoder();

function initialize() {
	var map = new google.maps.Map(document.getElementById("map-canvas"), {
		zoom: 10,
		mapTypeId: "roadmap"
	});

	// Change this depending on the name of your PHP file
	downloadUrl("db_markersXML.php", function(data) {
		var xml = data.responseXML;
		var markers = xml.documentElement.getElementsByTagName("marker");
		for (var i = 0; i < markers.length; i++) {
			var name = markers[i].getAttribute("name");
			var address = markers[i].getAttribute("address");
			var phone = markers[i].getAttribute("contact");
			var point = new google.maps.LatLng(
				parseFloat(markers[i].getAttribute("lat")),
				parseFloat(markers[i].getAttribute("lng")));
			var html = "<b>" + name + "</b> <br/>" + address + "<br/>" + phone;
			var marker = new google.maps.Marker({
				map: map,
				animation: google.maps.Animation.DROP,
				position: point,
				icon: "http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=" + (i+1) + "|FF0000|FFFFFF"
			});
			google.maps.event.addListener(marker, 'click', toggleBounce);

			function toggleBounce() {

				if (marker.getAnimation() != null) {
					marker.setAnimation(null);
				} else {
					marker.setAnimation(google.maps.Animation.BOUNCE);
				}
			}
			latlngbounds.extend(marker.position);
			bindInfoWindow(marker, map, infoWindow, html);

			var bounds = new google.maps.LatLngBounds();
			map.setCenter(latlngbounds.getCenter());
			map.fitBounds(latlngbounds);
		}
	});
var container = $(".getGeolocation");

function getLocation() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition);
	} else {
		container.html('Geolocation is not supported by this browser.');
	}
}

function showPosition(position) {
	var location = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	map.setCenter(location);
	var marker = new google.maps.Marker({
		position: location,
		map: map,
		icon: 'http://chart.apis.google.com/chart?chst=d_map_xpin_icon&chld=pin_star|home'
	});

	geocoder.geocode({'latLng': location}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			if (results[0]) {
				container.html("Current Location: <b><marquee>" + results[0].formatted_address + "</marquee></b>");
			} else {
				container.html('No results found');
			}
		} else {
			container.html('Geocoder failed due to: ' + status);
		}
	});

}

$(function () {
	getLocation();
});
}

function bindInfoWindow(marker, map, infoWindow, html) {
	google.maps.event.addListener(marker, 'click', function() {
		infoWindow.setContent(html);
		infoWindow.open(map, marker);
	});
}

function downloadUrl(url, callback) {
	var request = window.ActiveXObject ?
	new ActiveXObject('Microsoft.XMLHTTP') :
	new XMLHttpRequest;

	request.onreadystatechange = function() {
		if (request.readyState == 4) {
			request.onreadystatechange = doNothing;
			callback(request, request.status);
		}
	};

	request.open('GET', url, true);
	request.send(null);
}

function doNothing() {}

google.maps.event.addDomListener(window, 'load', initialize);
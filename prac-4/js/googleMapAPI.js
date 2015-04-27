function initialize() {

	var locations = [
	["Taro's Ramen &amp; Cafe", -27.464985, 153.030076, "A"],
	["Thai Nakonlanna", -27.502666, 153.00661, "B"],
	["Madtong San II", -27.471166, 153.025238, "C"],
	["FantAsia (Queen St)", -27.468179, 153.027368, "D"]
	];
	
	var mapOptions = {
		zoom: 10,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	
	var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	
	var container = $('.getGeolocation');

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
		var geocoder = new google.maps.Geocoder();
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
	
	var infoWindow = new google.maps.InfoWindow();
	var latlngbounds = new google.maps.LatLngBounds();
	var start_letter_code = 97;
	var marker_color = "FF0000";
	var marker_text_color = "FFFFFF";
	for (var i = 0; i < locations.length; i++) {
		var character = String.fromCharCode(start_letter_code).toUpperCase();
		start_letter_code++;
		
		var location = locations[i];
		var myLatLng = new google.maps.LatLng(location[1], location[2]);
		
		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			title: location[0],
			icon: "http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=" + location[3] + "|" + marker_color + "|" + marker_text_color
		});

		(function (marker, location) {
			google.maps.event.addListener(marker, "click", function (e) {
                //infoWindow.open(map, marker);
            });
		})(marker, location);
		latlngbounds.extend(marker.position);
	}
	
	var bounds = new google.maps.LatLngBounds();
	map.setCenter(latlngbounds.getCenter());
	map.fitBounds(latlngbounds);
}
google.maps.event.addDomListener(window, 'load', initialize);
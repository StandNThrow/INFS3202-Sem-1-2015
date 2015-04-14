function initialize() {
		  var locations = [
      {
		  "title": "<b>Taro's Ramen & Cafe</b>", 
		  "lat": "-27.464985", 
		  "lng": "153.030076", 
		  "description": '<a href="images/taro-ramen-akatonkotsu.jpg" data-lightbox="restaurant"><img class="imgLightbox" src="images/taro-ramen-akatonkotsu.jpg" /></a><p>Address: 363 Adelaide Street, Brisbane QLD 4000<br />Phone: (07) 3832 6358<br /><a class="moreInfo" href="taro-ramen.php">More Info...</a></p>', 
		  },
		  {
		  "title": "<b>Thai Nakonlanna</b>", 
		  "lat": "-27.502666", 
		  "lng": "153.00661", 
		  "description": '<a href="images/thai-nakonlanna-basil-stir-fry.jpg" data-lightbox="restaurant"><img class="imgLightbox" src="images/thai-nakonlanna-basil-stir-fry.jpg" /></a><p>Address: 6/225 Hawken Drive, St Lucia QLD 4067<br />Phone: (07) 3719 5556<br /><a class="moreInfo" href="thai-nakonlanna.php">More Info...</a></p>', 
		  },
		    {
		  "title": "<b>Madtong San II</b>", 
		  "lat": "-27.471166", 
		  "lng": "153.025238", 
		  "description": '<a href="images/madtongsan-bibimbap.jpg" data-lightbox="restaurant"><img class="imgLightbox" src="images/madtongsan-bibimbap.jpg" /></a><p>Address: 1/85 Elizabeth Street, Brisbane QLD 4000<br />Phone:(07) 3003 1881<br /><a class="moreInfo" href="madtong-san-ii.php">More Info...</a></p>', 
		  },
		    {
		  "title": "<b>Fantasia (Queen St)</b>", 
		  "lat": "-27.468179", 
		  "lng": "153.027368", 
		  "description": '<a href="images/fantasia-beijing-noodles.jpg" data-lightbox="restaurant"><img class="imgLightbox" src="images/fantasia-beijing-noodles.jpg" /></a><p>Address: 255 Queen Street, MacArthur Central, Brisbane QLD 4000<br />Phone:(07) 3221 8881<br /><a class="moreInfo" href="fantasia.php">More Info...</a></p>',
		  },

    ];
	
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
                    container.html(results[0].formatted_address);
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
	
	var mapOptions = {
        center: new google.maps.LatLng(locations[0].lat, locations[0].lng),
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var infoWindow = new google.maps.InfoWindow();
    var latlngbounds = new google.maps.LatLngBounds();
    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    var legend = document.getElementById("legend");
    legend.innerHTML = "";
    var start_letter_code = 97;
    var marker_color = "FF0000";
    var marker_text_color = "FFFFFF";
    for (var i = 0; i < locations.length; i++) {
        var character = String.fromCharCode(start_letter_code).toUpperCase();
        start_letter_code++;
 
        var data = locations[i]
        var myLatlng = new google.maps.LatLng(data.lat, data.lng);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: data.title,
			description: data.description,
            icon: "http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=" + character + "|" + marker_color + "|" + marker_text_color
        });
        (function (marker, data) {
            google.maps.event.addListener(marker, "click", function (e) {
                infoWindow.setContent("<div>" + data.title + "<br>" + data.description + "</div>");
                infoWindow.open(map, marker);
            });
        })(marker, data);
        latlngbounds.extend(marker.position);
 
        legend.innerHTML += "<div style = 'margin:5px'><img align = 'middle' src = '" + marker.icon + "' />&nbsp;" + marker.title + "<br>" + marker.description + "</div><hr />";
    }
	
	var bounds = new google.maps.LatLngBounds();
    map.setCenter(latlngbounds.getCenter());
    map.fitBounds(latlngbounds);
}
google.maps.event.addDomListener(window, 'load', initialize);

// function initlocation() {
    // var container = $('.getgeolocation');

    // function getlocation() {
        // if (navigator.geolocation) {
            // navigator.geolocation.getcurrentposition(showposition);
        // } else {
            // container.html('geolocation is not supported by this browser.');
        // }
    // }

    // function showposition(position) {
        // var location = new google.maps.latlng(position.coords.latitude, position.coords.longitude);
		// alert(location);
        // mymap.setcenter(location);
        // var marker = new google.maps.marker({
            // position: location,
            // map: mymap,
            // icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=m|efefef|000000'
        // });
        // var geocoder = new google.maps.geocoder();
        // geocoder.geocode({'latlng': location}, function(results, status) {
            // if (status == google.maps.geocoderstatus.ok) {
                // if (results[0]) {
                    // container.html(results[0].formatted_address);
                // } else {
                    // container.html('no results found');
                // }
            // } else {
                // container.html('geocoder failed due to: ' + status);
            // }
        // });
    // }

    // $(function () {
        // getlocation();
    // });
// }
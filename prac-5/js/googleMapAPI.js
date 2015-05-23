var geocoder = new google.maps.Geocoder();
var gmarkers = [];
var map;
var service;
var tempLocationStore;

function initialize() {
	var container = $(".getGeolocation");

	map = new google.maps.Map(document.getElementById("map-canvas"), {
		zoom: 14,
		mapTypeId: "roadmap"
	});

	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else {
			container.html("Geolocation is not supported by this browser.");
		}
	}

	function showPosition(position) {
		var location = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
		map.setCenter(location);
		var marker = new google.maps.Marker({
			position: location,
			map: map,
			animation: google.maps.Animation.BOUNCE,
			icon: "http://chart.apis.google.com/chart?chst=d_map_xpin_icon&chld=pin_star|home"
		});

		geocoder.geocode({"latLng": location}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				if (results[0]) {
					container.html("Current Location: <b><marquee>" + results[0].formatted_address + "</marquee></b>");
				} else {
					container.html("No results found");
				}
			} else {
				container.html("Geocoder failed due to: " + status);
			}
		});

	}

	$(function () {
		getLocation();
	});

	service = new google.maps.places.PlacesService(map);

	google.maps.event.addListenerOnce(map, "bounds_changed", performSearch);

	google.maps.event.addListener(map, "dragend", performSearch);
	google.maps.event.addListener(map, "zoom_changed", performSearch);
}
google.maps.event.addDomListener(window, "load", initialize);

function showResult() {
	var searchTerm = $("#searchTerm");
	var searchString = searchTerm.val();
	var request = {
		location: map.getCenter(),
		rankBy: google.maps.places.RankBy.DISTANCE,
		types: ["restaurant"],
		keyword: searchString
	};
	clearMarkers();
	clearList();
	service.nearbySearch(request, callback);
}

function performSearch() {
	if (tempLocationStore != map.getCenter()) {
		var searchTerm = $("#searchTerm");
		var keyword = searchTerm.val();
		var request = {
			location: map.getCenter(),
			rankBy: google.maps.places.RankBy.DISTANCE,
			types: ["restaurant"],
			keyword: keyword
		};
		tempLocationStore = map.getCenter();
		clearMarkers();
		clearList();
		service.nearbySearch(request, callback);
	}
}


function sleep(milliseconds) {
	var start = new Date().getTime();
	for (var i = 0; i < 1e7; i++) {
		if ((new Date().getTime() - start) > milliseconds){
			break;
		}
	}
}


function callback(results, status) {
	if (status != google.maps.places.PlacesServiceStatus.OK) {
		alert(status);
		return;
	}

	createList(results.length);

	for (var i = 0; i < ((results.length < 5) ? results.length : 5) ; i++) {
		createMarker(results[i], i);
		placePageWrite(results[i], i);
	}
}

function createList(resultLength) {
	for (var j = 0; j < ((resultLength < 5) ? resultLength : 5) ; j++) {
		$("#getRestaurantList").append("<div id=\"r-list-" + j + "\"></div>");
	}
}

function createMarker(place, i) {
	var marker = new google.maps.Marker({
		map: map,
		animation: google.maps.Animation.DROP,
		position: place.geometry.location,
		icon: "http://maps.google.com/mapfiles/marker" + String.fromCharCode(65+i) + ".png"
	});
	gmarkers.push(marker);
}

function clearMarkers() {
	for (var i = 0; i < gmarkers.length; i++) {
		gmarkers[i].setMap(null);
	}
}

function clearList() {
	$("#getRestaurantList").empty();
}

function placePageWrite(place, i) {

	var imageArray = [];
	var contactNo = "";

	sleep(500);

	service.getDetails(place, function(result, status) {

		if (status != google.maps.places.PlacesServiceStatus.OK) {
			alert(status);
			return;
		}

		if (typeof result.photos === "undefined") {
			for (var j = 0; j < 3; j++) {
				imageArray.push("http://placehold.it/64x64");
			}
		} else {
			for (var k = 0; k < 3; k++) {
				if (typeof result.photos[k] === "undefined") {
					imageArray.push("http://placehold.it/64x64");
				}
				else {
					imageArray.push(result.photos[k].getUrl({ "maxWidth": 100 }));
				}
			}
		}

		if (typeof result.formatted_phone_number === "undefined")
			contactNo = "<i>Contact No. is unavailable</i>";
		else
			contactNo = result.formatted_phone_number;

		var template = $("#template").clone();
		template.find(".panel-heading").html("<span class=\"badge\">" + String.fromCharCode(65+i) + "</span>&emsp;<b>" + result.name + "</b>");
		template.find("#placeData").html("<p>" + result.formatted_address + "<br>" + contactNo + "</p>");
		template.find(".col-lg-4").html("<img src=\"" + imageArray[0] + "\" alt=\"googlePlacesThumbnail\" />");
		template.find("#placeID").val(result.place_id);
		template.find("#placeName").val(result.name);
		template.find("#placeAddress").val(result.formatted_address);
		template.find("#placeContact").val(contactNo);
		template.find("#placeImgURL").val(imageArray[0]);
		template.css("display", "block");
		$("#r-list-" + i).append(template);
	});
}
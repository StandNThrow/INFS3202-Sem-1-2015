function showResult(str) {
	if (str == "") {
		document.getElementById("txtHint").innerHTML = "";
		return;
	} else { 
		if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
	// code for IE6, IE5
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		document.getElementById("content").innerHTML = xmlhttp.responseText;
	}
}
xmlhttp.open("GET", "search_action.php?q=" + str, true);
xmlhttp.send();
}
}

/* Hide/Show More Info */
$(function() {
	$('.moreInfo').click(function() {
		var button = $(this);
		$(button).closest('.more-panel').find('.moreInfo-panel').slideToggle('fast', function() {
			if ($(this).is(':visible')) 
			{
				button.text('Hide');
			} 
			else 
				button.text('More Info');
		});
	});
});

/* Form Validation - Bootstrap */
$("#formEdit").validate({
	rules: {
		name: {
			minlength: 4,
			required: true
		},
		address: {
			minlength: 4,
			required: true
		},
		phoneno: {
			minlength: 4,
			required: true
		},
		images: {
			minlength: 4,
			required: true
		},
		latitude: {
			minlength: 4,
			required: true
		},
		longtitude: {
			minlength: 4,
			required: true
		},
		description: {
			minlength: 4,
			required: true
		}
	},
	highlight: function(element) {
		$(element).closest(".form-group").removeClass("has-success").addClass("has-error");
	},
	success: function(element) {
		element.closest(".form-group").removeClass("has-error").addClass("has-success");
	},
	invalidHandler: function() {
		return false;
	}
});
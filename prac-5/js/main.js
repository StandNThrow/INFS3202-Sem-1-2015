$("#formAddComment").submit(function(e) {
	e.preventDefault();

	$.ajax({
		type: "POST",
		url: "comments_action.php",
		data: $("#formAddComment").serialize(),
		success: function(result) {
			document.getElementById("formAddComment").reset();
			document.getElementById("placeComments").focus();
			document.getElementById("content").innerHTML = result;
			// console.log($("#formAddComment").serialize());
			// console.log(result);
		},
		error: function(jqXHR, text, error) {
			console.log(error);
		}
	});
});

/* Form Validation - Bootstrap */
// $("#formEdit").validate({
// 	rules: {
// 		name: {
// 			minlength: 4,
// 			required: true
// 		},
// 		address: {
// 			minlength: 4,
// 			required: true
// 		},
// 		phoneno: {
// 			minlength: 4,
// 			required: true
// 		},
// 		imgURL: {
// 			minlength: 4,
// 			required: true
// 		},
// 		lat: {
// 			minlength: 4,
// 			required: true
// 		},
// 		lng: {
// 			minlength: 4,
// 			required: true
// 		},
// 		description: {
// 			minlength: 4,
// 			required: true
// 		}
// 	},
// 	highlight: function(element) {
// 		$(element).closest(".form-group").removeClass("has-success").addClass("has-error");
// 	},
// 	success: function(element) {
// 		element.closest(".form-group").removeClass("has-error").addClass("has-success");
// 	},
// 	invalidHandler: function() {
// 		return false;
// 	}
// });
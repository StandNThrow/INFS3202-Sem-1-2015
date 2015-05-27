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
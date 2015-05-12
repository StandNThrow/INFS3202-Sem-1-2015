<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title>Edit</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="images/favicon.png">
</head>
<body>
	<?php
	$sessionUsername = isset($_SESSION["username"]);
	if ($sessionUsername == 0) {
	} else {
		header("Location: login.php");
	}
	?>
	<div class="modal-body">
		<form action="add_action.php" name="formEdit" id="formEdit" class="formEdit" method="post">
			<h2>Add</h2>
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Name">
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" id="address" class="form-control" placeholder="Address">
			</div>
			<div class="form-group">
				<label for="phoneno">Phone No.</label>
				<input type="text" name="phoneno" id="phoneno" class="form-control" placeholder="Phone No.">
			</div>
			<div class="form-group">
				<label for="imgURL">Images</label>
				<input type="text" name="imgURL" id="imgURL" class="form-control" placeholder="Images URL">
			</div>
			<div class="form-group">
				<label for="lat">Latitude</label>
				<input type="text" name="lat" id="lat" class="form-control" placeholder="Latitude">
			</div>
			<div class="form-group">
				<label for="lng">Longtitude</label>
				<input type="text" name="lng" id="lng" class="form-control" placeholder="Longtitude">
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" id="description" class="form-control" placeholder="Description" rows="5"></textarea>
			</div>
			<button name="add" id="add" class="btn btn-lg btn-primary" type="submit">Add</button>
		</form>
	</div>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script> 
	<!-- Latest compiled and minified JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/lightbox.js"></script>
</body>
</html>
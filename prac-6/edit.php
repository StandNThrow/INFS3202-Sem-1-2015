<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title>Edit</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="css/style.css" type="text/css">
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
	<?php
	require("azure_db_config.php");

	$id = $_GET["id"];
	$sql = "SELECT * FROM `markers` WHERE id='$id'";
	$result = $conn->query($sql);

	if ($result->rowCount() > 0) {
		$row = $result->fetch();
		?>
		<div class="modal-body">
			<form action="edit_action.php" name="formEdit" id="formEdit" class="formEdit" method="post">
				<h2>Edit</h2>
				<div class="form-group">
					<label for="id" class="sr-only">id</label>
					<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $row["id"]; ?>">
				</div>
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php echo $row["name"]; ?>">
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" name="address" id="address" class="form-control" placeholder="Address" value="<?php echo $row["address"]; ?>">
				</div>
				<div class="form-group">
					<label for="phoneno">Phone No.</label>
					<input type="text" name="phoneno" id="phoneno" class="form-control" placeholder="Phone No." value="<?php echo $row["contact"]; ?>">
				</div>
				<div class="form-group">
					<label for="imgURL">Images</label>
					<input type="text" name="imgURL" id="imgURL" class="form-control" placeholder="Images URL" value="<?php echo $row["imgURL"]; ?>">
				</div>
				<div class="form-group">
					<label for="lat">Latitude</label>
					<input type="text" name="lat" id="lat" class="form-control" placeholder="Latitude" value="<?php echo $row["lat"]; ?>">
				</div>
				<div class="form-group">
					<label for="lng">Longtitude</label>
					<input type="text" name="lng" id="lng" class="form-control" placeholder="Longtitude" value="<?php echo $row["lng"]; ?>">
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" id="description" class="form-control" placeholder="Description" rows="5"><?php echo $row["description"]; ?></textarea>
				</div>
				<div class="form-group">
					<button name="Submit" class="btn btn-lg btn-primary" type="submit">Save</button>
				</div>
			</form>
		</div>
		<?php
	}
	?>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script> 
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
	<script src="js/lightbox.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
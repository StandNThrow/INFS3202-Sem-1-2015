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
	require("db_config.php");

	$name = mysql_escape_string($_POST["name"]);
	$address = mysql_escape_string($_POST["address"]);
	$phoneno = mysql_escape_string($_POST["phoneno"]);
	$images = mysql_escape_string($_POST["imgURL"]);
	$lat = mysql_escape_string($_POST["lat"]);
	$lng = mysql_escape_string($_POST["lng"]);
	$description = mysql_escape_string($_POST["description"]);

// echo "Name: " . $name . "<br>";
// echo "Address: " . $address . "<br>";
// echo "Contact: " . $phoneno . "<br>";
// echo "ImageURLs: " . $images . "<br>";
// echo "Lat: " . $lat . "<br>";
// echo "Lng: " . $lng . "<br>";
// echo "Description: " . $description . "<br>";

	$sql = "INSERT INTO `markers`(`id`, `name`, `address`, `contact`, `imgURL`, `lat`, `lng`, `description`) VALUES ('', '$name','$address','$phoneno','$images','$lat','$lng','$description')";

	$result = mysqli_query($connect, $sql);
	header("Location: admin.php");
	?>
</body>
</html>
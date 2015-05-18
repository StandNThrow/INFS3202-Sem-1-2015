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
	// $sessionUsername = isset($_SESSION["username"]);

	// if ($sessionUsername == 0) {
	// } else {
	// 	header("Location: login.php");
	// }
	?>
	<?php
	require("azure_db_config.php");

	$id = $_GET["id"];
	// $sql = $conn->exec("SELECT * FROM markers WHERE id=\"" . $id . "\"");
	$sql = $conn->prepare("SELECT * FROM markers WHERE id=:id");
	// $sql->bindParam(":id", $id, PDO::PARAM_INT);
	$result = $sql->execute(array("id" => $id));

	if ($result->rowCount() > 0) {
		$row = $result->fetch();
		print_r($row);
	// echo "<div class=\"modal-body\">";
	// echo "<form action=\"edit_action.php\" name=\"formEdit\" id=\"formEdit\" class=\"formEdit\" method=\"post\">";
	// echo "<h2>Edit</h2>";
	// echo "<label for=\"id\" class=\"sr-only\">id</label>";
	// echo "<input type=\"hidden\" name=\"id\" id=\"id\" class=\"form-control\" value=\"" . $row["id"] . "\">";
	// echo "<label for=\"name\">Name</label>";
	// echo "<input type=\"text\" name=\"name\" id=\"name\" class=\"form-control\" placeholder=\"Name\" value=\"" . $row["name"] . "\">";
	// echo "<label for=\"address\">Address</label>";
	// echo "<input type=\"text\" name=\"address\" id=\"address\" class=\"form-control\" placeholder=\"Address\" value=\"" . $row["address"] . "\">";
	// echo "<label for=\"phoneno\">Phone No.</label>";
	// echo "<input type=\"text\" name=\"phoneno\" id=\"phoneno\" class=\"form-control\" placeholder=\"Phone No.\" value=\"" . $row["contact"] . "\">";
	// echo "<label for=\"imgURL\">Images</label>";
	// echo "<input type=\"text\" name=\"imgURL\" id=\"imgURL\" class=\"form-control\" placeholder=\"Images URL\" value=\"" . $row["imgURL"] . "\">";
	// echo "<label for=\"lat\">Latitude</label>";
	// echo "<input type=\"text\" name=\"lat\" id=\"lat\" class=\"form-control\" placeholder=\"Latitude\" value=\"" . $row["lat"] . "\">";
	// echo "<label for=\"lng\">Longtitude</label>";
	// echo "<input type=\"text\" name=\"lng\" id=\"lng\" class=\"form-control\" placeholder=\"Longtitude\" value=\"" . $row["lng"] . "\">";
	// echo "<label for=\"description\">Description</label>";
	// echo "<textarea name=\"description\" id=\"description\" class=\"form-control\" placeholder=\"Description\" rows=\"5\">" . $row["description"] . "</textarea>";
	// echo "<br>";
	// echo "<button name=\"Submit\" class=\"btn btn-lg btn-primary\" type=\"submit\">Save</button>";
	// echo "</form>";
	// echo "</div>";
	// echo "<!-- <div class=\"modal-footer\">";
	// echo "<button type=\"button\" class=\"btn btn-lg btn-primary\" data-dismiss=\"modal\">Close</button>";
	// echo "<button type=\"submit\" class=\"btn btn-primary\">Save</button></div> -->";
	// }
	// else 
	// {

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
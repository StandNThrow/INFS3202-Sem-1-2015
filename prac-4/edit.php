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
	// 	header("Location: login.php");
	// }
	?>
	<!-- Fixed navbar -->
<!-- Hide navbar
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a class="navbar-brand">Asianic Food Culture</a> </div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.jsp">Home</a></li>
					<li><a href="admin.jsp">Admin Panel</a></li>
					<li>
						<%
						if (sessionUsername == null)
							{
						%>
						<% } else { %>
						<li><a href="logout.jsp">Logout</a></li>
						<li>
							<p class="navbar-text navbar-right">Welcome back, <a class="navbar-link"><%=sessionUsername %></a></p>
						</li>
						<% } %>
					</ul>
				</div>
			</div>
		</nav>
	--> 
	<?php
	require("db_config.php");

	$id = $_GET["id"];

	$sql = "SELECT * FROM markers WHERE id=\"" . $id . "\"";
	$result = mysqli_query($connect, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_array($result);
		// echo "<div class=\"modal-header\">";
		// echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>";
		// echo "<h4 class=\"modal-title\">Edit</h4>";
		// echo "</div>";
		echo "<div class=\"modal-body\">";
		echo "<form action=\"edit_action.php\" name=\"formEdit\" id=\"formEdit\" class=\"formEdit\" method=\"post\">";
		echo "<h2>Edit</h2>";
		// echo "<label for=\"File\" class=\"sr-only\">Filename</label>";
		// echo "<input type=\"hidden\" name=\"File\" class=\"form-control\" value=\"" + fileName + "\">";
		echo "<label for=\"Name\">Name</label>";
		echo "<input type=\"text\" name=\"Name\" class=\"form-control\" placeholder=\"Name\" value=\"" . $row["name"] . "\" required>";
		echo "<label for=\"Address\">Address</label>";
		echo "<input type=\"text\" name=\"Address\" class=\"form-control\" placeholder=\"Address\" value=\"" . $row["address"] . "\" required>";
		echo "<label for=\"PhoneNo\">Phone No.</label>";
		echo "<input type=\"text\" name=\"PhoneNo\" class=\"form-control\" placeholder=\"Phone No.\" value=\"" . $row["contact"] . "\" required>";
		echo "<label for=\"Images\">Images</label>";
		echo "<input type=\"text\" name=\"Images\" class=\"form-control\" placeholder=\"Images URL\" value=\"" . $row["imgURL"] . "\" required>";
		echo "<label for=\"Description\">Description</label>";
		echo "<textarea name=\"Description\" class=\"form-control\" placeholder=\"Description\" rows=\"5\" required>" . $row["description"] . "</textarea>";
		echo "<br>";
		echo "<button name=\"Submit\" class=\"btn btn-lg btn-primary\" type=\"submit\">Save</button>";
		echo "</form>";
		echo "</div>";
		echo "<!-- <div class=\"modal-footer\">";
		echo "<button type=\"button\" class=\"btn btn-lg btn-primary\" data-dismiss=\"modal\">Close</button>";
		echo "<button type=\"submit\" class=\"btn btn-primary\">Save</button></div> -->";
	}
	else 
	{

	}
	?>

	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script> 
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
	<script src="js/lightbox.js"></script>
</body>
</html>
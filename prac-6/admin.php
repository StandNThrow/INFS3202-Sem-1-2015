<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title>Admin Panel</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="images/favicon.png">
	<?php require("azure_db_config.php"); ?>
</head>
<body>
	<?php
	$sessionUsername = isset($_SESSION["username"]);
	if ($sessionUsername == 0) {
		header("Location: login.php");
	}
	?>
	<!-- Fixed navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">Asianic Food Culture</a> 
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li class="active"><a>Admin Panel</a></li>
					<?php 
					if ($sessionUsername == 0) {
						echo $_SESSION["username"];
					} else { 
						?>
						<li><a href="logout.php">Logout</a></li>
						<li>
							<p class="navbar-text">Welcome back, <a class="navbar-link"><?php echo $_SESSION["username"]; ?></a></p>
						</li>
						<?php } ?>
					</ul>
				</div>
				<!--/.nav-collapse --> 
			</div>
		</nav>
		<div class="container">
			<div class="panel panel-primary"> 
				<!-- Default panel contents -->
				<div class="panel-heading">
					<h1>Asianic Food Culture</h1>
				</div>
				<!-- Table -->
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Name of Restaurant</th>
							<th>Edit Tables</th>
							<th>Remove Tables</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = "SELECT * FROM `markers`";
						// $result = mysqli_query($connect, $sql);
						$result = $conn->query($sql);

						if ($result->fetchColumn() > 0) {
							// while ($row = mysqli_fetch_array($result)) {
							while ($row = $result->fetch()) {
								echo "<form action=\"remove_action.php\" method=\"post\">";
								echo "<tr>";
								echo "<td>" . $row["name"] . "</td>";
								echo "<td><a class=\"btn btn-primary\" data-toggle=\"modal\" data-remote=\"edit.php?id=" . $row["id"] . "\" data-target=\"#myModal\">Edit</a></td>";
								echo "<td><button type=\"submit\" name=\"id\" class=\"btn btn-primary\" value=\"" . $row["id"] . "\">Remove</button></td>";
								echo "</tr>";
								echo "<div class=\"modal fade\" id=\"myModal\">";
								echo "<div class=\"modal-dialog\">";
								echo "<div class=\"modal-content\"></div>";
								echo "</div>";
								echo "</div>";
								echo "</td>";
								echo "</tr>";
								echo "</form>";
							}
							
						} else {

						}
						?>
					</tbody>
				</table>
			</div>
			<a class="btn btn-primary pull-right" data-toggle="modal" data-remote="add.php" data-target="#myModal">Add</a>
		</div>
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script> 
		<!-- Latest compiled and minified JavaScript --> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/lightbox.js"></script>
		<script>
// Close modal dialog, refresh page
$('#myModal').on('hidden.bs.modal', function () {
	location.reload();
});
</script>
</body>
</html>
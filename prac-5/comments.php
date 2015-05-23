<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title>Home</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/lightbox.css">
	<link rel="shortcut icon" href="images/favicon.png">
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHXZQLmlxuxzjt9mEtGi5rZt3GJL2JAEY"></script> -->
	<?php require("db_config.php"); ?>
</head>
<body>
	<?php
	$placeID = mysql_escape_string($_POST["placeID"]);
	$placeName = mysql_escape_string($_POST["placeName"]);
	$placeAddress = mysql_escape_string($_POST["placeAddress"]);
	$placeContact = mysql_escape_string($_POST["placeContact"]);
	$placeImgURL = mysql_escape_string($_POST["placeImgURL"]);

	echo $placeID . "<br>";
	echo $placeName . "<br>";
	echo $placeAddress . "<br>";
	echo $placeContact . "<br>";
	echo $placeImgURL . "<br>";
	?>
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
					<li class="active"><a>Comments</a></li>
					<?php 
					$sessionUsername = isset($_SESSION["username"]);
					if ($sessionUsername == 0) {
						echo "<li><a href=\"login.php\">Login</a></li>";
					} else { ?>
					<li><a href="admin.php">Admin Panel</a></li>
					<li><a href="logout.php">Logout</a></li>
					<li>
						<p class="navbar-text">Welcome back, <a class="navbar-link"><?php echo $_SESSION["username"]; ?></a></p>
					</li>
					<?php } ?>
				</ul>
				<!-- <form class="navbar-form navbar-left" role="search"> -->
				<!-- <form action="search.php" class="navbar-form navbar-left" role="search" method="POST">
					<div class="form-group">
						<input type="text" name="searchTerm" id="searchTerm" class="form-control" placeholder="Search">
					</div>
					<input type="submit" id="search" class="btn btn-primary" value="Search">
				</form> -->
			</div>
		</div>
	</nav>
	<div class="container" role="main">
		<div class="col-lg-5">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="badge">1</span>&emsp;<b><?php echo $placeName; ?></b>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-4">
							<img src="<?php echo $placeImgURL; ?>" alt="googlePlacesThumbnail">
						</div>
						<div class="col-lg-8">
							<p>
								<?php echo $placeAddress; ?>
								<br>
								<?php echo $placeContact; ?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<?php 
			?>
		</div>
		<div class="col-lg-7">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Comments</h3>
				</div>
				<div id="content">
					<table class="table table-striped">
						<thead>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM `places` WHERE placeID=\"" . $placeID . "\"";
							$result = mysqli_query($connect, $sql);

							if (mysqli_num_rows($result) > 0) {
								while ($row = mysqli_fetch_array($result)) {
									echo "<!-- One Block of User Comment -->";
									echo "<tr>";
									echo "<td><b>" . $row["username"] . "</b></td>";
									echo "<td><b>" . $row["lastUpdated"] . " AEST</b></td>";
									echo "</tr>";
									echo "<tr>";
									echo "<td colspan=\"2\">" . $row["placeComments"] . "</td>";
									echo "</tr>";
									echo "<!-- /One Block User Comment -->";
								}
							} else {
								echo "<tr>";
								echo "<td>";
								echo "<b><center>No comments added yet. Be the first to comment!</center></b>";
								echo "</td>";
								echo "</tr>";
							}
							?>
						</tbody>
					</table>
				</table>
			</div>
			<form name="formAddComment" id="formAddComment" method="POST">
				<div class="form-group">
					<label for="placeID" class="sr-only">Place ID: </label>
					<input type="hidden" name="placeID" id="placeID" value="<?php echo $placeID; ?>" >
				</div>
				<div class="form-group">
					<label for="placeName" class="sr-only">Place Name: </label>
					<input type="hidden" name="placeName" id="placeName" value="<?php echo $placeName; ?>" >
				</div>
				<div class="form-group">
					<label for="placeComments">Add New Comment: 
						<span style="color:red;">(Please enter more than 10 characters to prevent spam)</span>
					</label>
					<textarea name="placeComments" id="placeComments" class="form-control" required></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Add Comment</button>
			</form>
		</div>
	</div>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script> 
	<!-- <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script> -->
	<!-- Latest compiled and minified JavaScript --> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
	<script src="js/lightbox.js"></script> 
	<!-- // <script src="js/googleMapAPI.js"></script> -->
	<script src="js/main.js"></script>
</body>
</html>
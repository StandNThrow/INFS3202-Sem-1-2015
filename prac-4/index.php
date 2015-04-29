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
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script src="js/main.js"></script>
	<?php require("db_config.php"); ?>
</head>
<body>
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
					<li class="active"><a href="index.php">Home</a></li>
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
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" name="searchTerm" class="form-control" onkeyup="showResult(this.value);" onchange="showResult(this.value);" onkeypress="this.onchange();" oninput="this.onchange();" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			<!--/.nav-collapse --> 
		</div>
	</nav>
	<div class="getGeolocation">Google Geolocation Placeholder. Enable your Location/GPS for this to work.</div>
	<div class="container" role="main">
		<div class="col-lg-5" id="content">
			<?php 
			$sql = "SELECT * FROM `markers`";
			$result = mysqli_query($connect, $sql);

			if (mysqli_num_rows($result) > 0) {
				$i=0;
				while ($row = mysqli_fetch_array($result)) {
					$images = $row["imgURL"];
					$imageArray = explode("#", $images);
					echo "<div class=\"panel panel-default\">";
					echo "<div class=\"panel-heading\">";
					echo "<span class=\"badge\">" . ($i+1 ). "</span><b>" . $row["name"] . "</b>";
					echo "</div>";
					echo "<div class=\"panel-body\">";
					echo "<div class=\"row\">";
					echo "<div class=\"col-lg-4\">";
					echo "<a href=\"" . $imageArray[0] . "\" data-lightbox=\"" . $row["name"] . "\">";
					echo "<img class=\"imgLightbox\" src=\"" . $imageArray[0] . "\" alt=\"" . $row["name"] . "\" />";
					echo "</a>";
					echo "<a href=\"" . $imageArray[1] . "\" data-lightbox=\"" . $row["name"] . "\">";
					echo "<img class=\"imgLightbox\" src=\"" . $imageArray[1] . "\" alt=\"" . $row["name"] . "\" />";
					echo "</a>";
					echo "<a href=\"" . $imageArray[2] . "\" data-lightbox=\"" . $row["name"] . "\">";
					echo "<img class=\"imgLightbox\" src=\"" . $imageArray[2] . "\" alt=\"" . $row["name"] . "\" />";
					echo "</a>";
					echo "</div>";
					echo "<div class=\"col-lg-8\">";
					echo "<p>";
					echo "Address: " . $row["address"];
					echo "<br>";
					echo "Phone: " . $row["contact"];
					echo "</p>";
					echo "<div class=\"more-panel\">";
					echo "<div class=\"moreInfo-panel\">";
					echo "<blockquote>";
					echo $row["description"];
					echo "</blockquote>";
					echo "</div>";
					echo "<a href=\"javascript:void(0);\" class=\"btn btn-primary moreInfo\">More Info</a>";
					echo "</div>";
					echo "</div>";
					echo "</div>";
					echo "</div>";
					echo "</div>";
					?>
					<?php
					$i++;
				}
			}
			?>
		</div>
		<div class="col-lg-7" style="height:400px;">
			<div id="map-canvas"></div>
		</div>
	</div>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script> 
	<!-- Latest compiled and minified JavaScript --> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
	<script src="js/lightbox.js"></script> 
	<script src="js/googleMapAPI.js"></script>
</body>
</html>
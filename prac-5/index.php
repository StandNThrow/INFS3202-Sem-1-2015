<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title>Home</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/lightbox.css">
	<link rel="shortcut icon" href="images/favicon.png">
	<script src="https://maps.googleapis.com/maps/api/js?libraries=places,geometry&amp;key=AIzaSyAHXZQLmlxuxzjt9mEtGi5rZt3GJL2JAEY"></script>
	<?php require("db_config.php"); ?>
</head>
<body>
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
					<li class="disabled"><a>Comments</a></li>
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
				<form action="javascript:void(0);" class="navbar-form navbar-left" role="search">
					<div class="form-group has-feedback has-feedback-left">
						<input type="text" name="searchTerm" id="searchTerm" class="form-control" onkeydown="enterPressed();" placeholder="Search">
						<i class="form-control-feedback glyphicon glyphicon-search"></i>
					</div>
				</form>
			</div> 
		</div>
	</nav>
	<div class="getGeolocation">Google Geolocation Placeholder. Enable your Location/GPS for this to work.</div>
	<div class="container" role="main">
		<div class="col-lg-5 content">
			<div id="restaurantList" style="display:none;">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-4">
								<img alt="Restaurant Picture" src=""></div>
								<div class="col-lg-8">
									<p id="placeData">
									</p>
									<!-- Form required to write to database for comments -->
									<form action="comments.php" name="formComment" id="formComment" method="POST">
										<input type="hidden" name="placeID" id="placeID">
										<input type="hidden" name="placeName" id="placeName">
										<input type="hidden" name="placeAddress" id="placeAddress">
										<input type="hidden" name="placeContact" id="placeContact">
										<input type="hidden" name="placeImgURL" id="placeImgURL">
										<!-- For debugging purposes -->
										<!-- <input name="placeID" id="placeID">
										<input name="placeName" id="placeName">
										<input name="placeAddress" id="placeAddress">
										<input name="placeContact" id="placeContact">
										<input name="placeImgURL" id="placeImgURL"> -->
										<button type="submit" class="btn btn-primary">Comments</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="getRestaurantList">
				</div>
			</div>
			<div class="col-lg-7">
				<div id="map-canvas"></div>
			</div>
		</div>
	</div>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="js/googleMapAPI.js"></script>
	<script src="js/lightbox.js"></script>
	<script>
	function enterPressed() {
		if (event.keyCode == 13) {
			showResult();
		}
	}
	</script>
</body>
</html>
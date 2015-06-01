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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHXZQLmlxuxzjt9mEtGi5rZt3GJL2JAEY"></script>
	<?php require("azure_db_config.php"); ?>
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
					<?php 
					if (isset($_COOKIE["username"]) == 0) {
						?>
						<li><a href="login.php">Login</a></li>
						<?php 
					} else { 
						?>
						<li><a href="admin.php">Admin Panel</a></li>
						<li><a href="logout.php">Logout</a></li>
						<li>
							<p class="navbar-text">Welcome back, <a class="navbar-link"><?php echo $_COOKIE["username"]; ?></a></p>
						</li>
						<?php } ?>
					</ul>
					<form action="search.php" class="navbar-form navbar-left" role="search" method="POST">
						<div class="form-group">
							<input type="text" name="searchTerm" id="searchTerm" class="form-control" placeholder="Search">
						</div>
						<input type="submit" id="search" class="btn btn-primary" value="Search">
					</form>
				</div>
			</div>
		</nav>
		<div class="getGeolocation">Google Geolocation Placeholder. Enable your Location/GPS for this to work.</div>
		<div class="container" role="main">
			<div class="col-lg-5" id="content">
				<?php 
				$sql = "SELECT * FROM markers";
				$result = $conn->query($sql);

				if ($result->rowCount() > 0) {
					$i=1;
					while ($row = $result->fetch()) {
						$images = $row["imgURL"];
						$imageArray = explode("#", $images);
						?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<span class="badge"><?php echo $i; ?></span>&emsp;
								<b><?php echo $row["name"]; ?></b>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-4">
										<a href="<?php echo $imageArray[0]; ?>" data-lightbox="<?php echo $row["name"]; ?>">
											<img class="imgLightbox" src="<?php echo $imageArray[0]; ?>" alt="<?php echo $row["name"]; ?>" />
										</a>
										<a href="<?php echo $imageArray[1]; ?>" data-lightbox="<?php echo $row["name"]; ?>">
											<img class="imgLightbox" src="<?php echo $imageArray[1]; ?>" alt="<?php echo $row["name"]; ?>" />
										</a>
										<a href="<?php echo $imageArray[2]; ?>" data-lightbox="<?php echo $row["name"]; ?>">
											<img class="imgLightbox" src="<?php echo $imageArray[2]; ?>" alt="<?php echo $row["name"]; ?>" />
										</a>
									</div>
									<div class="col-lg-8">
										<p>
											Address: <?php echo $row["address"]; ?>
											<br>
											Phone: <?php echo $row["contact"]; ?>
										</p>
										<div class="more-panel">
											<div class="moreInfo-panel">
												<blockquote>
													<?php echo $row["description"]; ?>
												</blockquote>
											</div>
											<a href="javascript:void(0)" class="btn btn-primary moreInfo">More Info</a>
										</div>
									</div>
								</div>
							</div>
						</div>
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
		<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
		<!-- Latest compiled and minified JavaScript --> 
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
		<script src="js/lightbox.js"></script> 
		<script src="js/googleMapAPI.js"></script>
		<script src="js/main.js"></script>
		<script>
		/* Hide/Show More Info */
		$(document).ready(function() {
			$('.moreInfo').click(function() {
				var button = $(this);
				$(button).closest('.more-panel').find('.moreInfo-panel').slideToggle('fast', function() {
					if ($(this).is(':visible')) {
						button.text('Hide');
					} else {
						button.text('More Info');
					}
				});
			});
		});
		/* Prevents Enter Key from sending the form for AJAX handler. */

	// 	$(window).keydown(function(event){
	// 		if(event.keyCode == 13) {
	// 			event.preventDefault();
	// 			return false;
	// 		}
	// 	});
	// });
</script>
</body>
</html>
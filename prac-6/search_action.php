<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title>Search Action</title>
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
	<?php require("azure_db_config.php"); ?>
</head>

<body>
	<?php
	$q = $_GET["q"]; //get q from the address bar, also escaping the string
	$sql = "SELECT * FROM `markers` WHERE CONCAT(`name`, `address`, `contact`) LIKE '%$q%'";
	$result = $conn->query($sql);

	if ($result->rowCount() > 0) {
		$i=0;
		while($row = $result->fetch()) {
			$images = $row["imgURL"];
			$imageArray = explode("#", $images);
			?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="badge"><?php echo $i; ?></span>
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
	else
	{
		?>
		<table class="table table-striped">
			<tr>
				<th rowspan="8" style="text-align:center;">No entries found!</th>
			</tr>
		</table>
		<?php
	}
	?>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script> 
	<!-- Latest compiled and minified JavaScript --> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
	<script src="js/lightbox.js"></script> 
	<script src="js/googleMapAPI.js"></script>
	<script>
	/* Hide/Show More Info */
	$(document).ready(function() {
		$(".moreInfo").click(function() {
			var button = $(this);
			$(button).closest(".more-panel").find(".moreInfo-panel").slideToggle("fast", function() {
				if ($(this).is(":visible")) {
					button.text("Hide");
				} else {
					button.text("More Info");
				}
			});
		});
	});
	</script>
</body>
</html>
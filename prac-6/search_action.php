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
	$q = $_GET['q']; //get q from the address bar, also escaping the string
	$sql = "SELECT * FROM `markers` WHERE CONCAT(`name`, `address`, `contact`) LIKE '%" . $q . "%'";
	$result = $conn->query($sql);

	if ($result->fetchColumn() > 0) {
		$i=0;
		while($row = $result->fetch()) {
			$images = $row["imgURL"];
			$imageArray = explode("#", $images);
			echo "<div class=\"panel panel-default\">";
			echo "<div class=\"panel-heading\">";
			echo "<span class=\"badge\">" . $row["id"] . "</span><b>" . $row["name"] . "</b>";
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
	else
	{
		echo "<table class=\"table table-striped\">";
		echo "<tr>";
		echo "<th rowspan=\"8\" style=\"text-align:center;\">No entries found!";
		echo "</th>";
		echo "</tr>";
		echo "</table>";
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
	</script>
</body>
</html>
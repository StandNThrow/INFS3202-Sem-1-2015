<?php
require("db_config.php");

$name = mysql_escape_string($_POST["name"]) ;
$address = mysql_escape_string($_POST["address"]);
$phoneno = mysql_escape_string($_POST["phoneno"]);
$images = mysql_escape_string($_POST["imgURL"]);
$latitude = mysql_escape_string($_POST["lat"]);
$longtitude = mysql_escape_string($_POST["lng"]);
$description = mysql_escape_string($_POST["description"]);

echo $name, $address, $phoneno, $images, $latitude, $longtitude, $description;

$sql = "INSERT INTO `markers`(`id`, `name`, `address`, `contact`, `imgURL`, `lat`, `lng`, `description`) VALUES ('', '$name','$address','$phoneno','$images','$lat','$lng','$description')";

$result = mysqli_query($connect, $sql);
header("Location: admin.php");
?>
<?php
require("db_config.php");

$name = mysql_escape_string($_POST["name"]) ;
$address = mysql_escape_string($_POST["address"]);
$phoneno = mysql_escape_string($_POST["phoneno"]);
$images = mysql_escape_string($_POST["images"]);
$latitude = mysql_escape_string($_POST["latitude"]);
$longtitude = mysql_escape_string($_POST["longtitude"]);
$description = mysql_escape_string($_POST["description"]);

echo $name, $address, $phoneno, $images, $latitude, $longtitude, $description;

$sql = "INSERT INTO `restaurant-data`(`id`, `name`, `address`, `contact`, `image-url`, `latitude`, `longtitude`, `description`) VALUES ('', '$name','$address','$phoneno','$images','$latitude','$longtitude','$description')";

$result = mysqli_query($connect, $sql);
header("Location: admin.php");
?>
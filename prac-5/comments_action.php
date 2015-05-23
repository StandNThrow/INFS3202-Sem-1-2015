<?php
require ("db_config.php");

date_default_timezone_set("Australia/Brisbane");
$commentDateTime = date("d M Y, H:i");

$sessionUsername = isset($_SESSION["username"]);
if ($sessionUsername == 0) {
	$sessionUsername = "Guest";	
} else {
	$sessionUsername = $_SESSION["username"];
}
// echo $sessionUsername . "<br>";

$placeID = $_POST["placeID"];
$placeName = $_POST["placeName"];
$placeComments = $_POST["placeComments"];
// echo $placeID . "<br>";
// echo $placeComments . "<br>";

$sql = mysqli_query($connect, "INSERT INTO `places`(`cid`, `placeID`, `placeName`, `placeComments`, `username`, `lastUpdated`) VALUES ('', '$placeID', '$placeName', '$placeComments', '$sessionUsername', '$commentDateTime')");
$result = mysqli_query($connect, "SELECT * FROM `places` WHERE `placeID`='$placeID' ORDER BY `lastUpdated` DESC");

echo "<table class=\"table table-striped\">";
echo "<thead>";
echo "</thead>";
echo "<tbody>";

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
	echo "</tbody>";
	echo "</table>";
} else {
	echo "<tr>";
	echo "<td>";
	echo "<b><center>No comments added yet. Be the first to comment!</center></b>";
	echo "</td>";
	echo "</tr>";
	echo "</tbody>";
	echo "</table>";
}
?>
<?php 
require("azure_db_config.php");
/* Set timezone to Brisbane */
date_default_timezone_set("Australia/Brisbane");
session_start();

/* Check Login form submitted */
if(isset($_POST["submit"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = $conn->prepare("SELECT * FROM `users` WHERE `username`=:username AND `password`=:password");
	$result->bindParam(":username", $username);
	$result->bindParam(":password", $password);
	$result->execute();

	$rows = $result->fetch(PDO::FETCH_NUM);

	if ($rows > 0) {
		$_SESSION["username"] = $username;
		//header("location: admin.php");
		echo $_SESSION["username"];
	} else {
		echo "Invalid login";
	}
}
?>
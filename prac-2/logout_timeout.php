<?php 
session_start();
session_destroy(); /* Destroy started session */

date_default_timezone_set("Australia/Brisbane");
$log  = date("Y-m-d H:i") . " " . $_SESSION["Username"] . " Logout by timer" . PHP_EOL;

file_put_contents("../logs/log.txt", $log, FILE_APPEND);

//header("location:index.php?handler=" . urlencode(base64_encode("Session timed out.")));
header("Location: index.php");
?>
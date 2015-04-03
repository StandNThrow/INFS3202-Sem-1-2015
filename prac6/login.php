<?php
session_start();
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['countdown_time'] = $countdown_time;

date_default_timezone_set('Australia/Brisbane');
$date = date('d/m/y');
$time = date('G:i:s');

$content = "\r\n" . "User: " . $_SESSION['username']." logged-in  on ". $date . " at " . $time ;
$fileopen = fopen($_SERVER['Document_ROOT'] . "/tmp/test.txt","a");
fwrite($fileopen,$content);
fclose($fileopen);
header("Location: http://infs3202-013.uqcloud.net/prac6/home.php");
?>
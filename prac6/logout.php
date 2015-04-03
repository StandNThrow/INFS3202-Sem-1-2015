<?php
session_start();

date_default_timezone_set('Australia/Brisbane');
$date = date('d/m/y');
$time = date('G:i:s');

$content = "\r\n" . "User: " . $_SESSION['username']." logged-out on ". $date . " at " . $time;
$fileopen = fopen($_SERVER['Document_ROOT'] . "/tmp/test.txt","a");
fwrite($fileopen,$content);
fclose($fileopen);

unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['countdown_time']);
header("Location: http://infs3202-013.uqcloud.net/prac6/login_page.php");
?>
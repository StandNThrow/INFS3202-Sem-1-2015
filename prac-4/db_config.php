<?php
session_start();
$dbhost = "localhost";
$dbuser = "infs3202_admin";
$dbpass = "password";
$dbname = "infs3202";

$connect=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die (mysql_errno() . ": <b>" . mysql_error() . "</b>");
//mysql_select_db($dbname, $connect) or die (mysql_errno().":<b> ".mysql_error()."</b>");
?>
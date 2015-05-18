<?php

$dbhost = "au-cdbr-azure-east-a.cloudapp.net";
$dbuser = "ba47d46104b83c";
$dbpassword = "7b8d6e77";
$dbname = "infs3202";

$conn = sqlsrv_connect($server, array("UID"=>$user, "PWD"=>$pwd, "Database"=>$db));

if($conn === false){
	die(print_r(sqlsrv_errors()));
}
?>
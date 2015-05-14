<?php

$server = "tcp:irz5rmmmas.database.windows.net,1433";
$user = "infs3202_admin@irz5rmmmas";
$pwd = "Passworda@";
$db = "infs3202";

$conn = sqlsrv_connect($server, array("UID"=>$user, "PWD"=>$pwd, "Database"=>$db));

if($conn === false){
	die(print_r(sqlsrv_errors()));
}

echo "Connected successfully.";
?>
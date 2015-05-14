<?php

$server = "tcp:bdkzfvt0vn.database.windows.net,1433";
$user = "infs3202_admin@bdkzfvt0vn";
$pwd = "Passworda@";
$db = "infs3202";

$conn = sqlsrv_connect($server, array("UID"=>$user, "PWD"=>$pwd, "Database"=>$db));

if($conn === false){
	die(print_r(sqlsrv_errors()));
}
?>
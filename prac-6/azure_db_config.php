<?php

$dbhost = "au-cdbr-azure-east-a.cloudapp.net";
$dbuser = "ba47d46104b83c";
$dbpassword = "7b8d6e77";
$dbname = "infs3202";

// Connect to database.
try {
	$conn = new PDO( "mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	echo "Connected successfully.";
}
catch(Exception $e){
	die(var_dump($e));
}

?>
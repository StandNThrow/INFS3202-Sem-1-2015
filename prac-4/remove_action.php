<?php
require("db_config.php");

$id = $_POST["id"];

$sql = "DELETE FROM markers WHERE id='$id'";

$result	= mysqli_query($connect, $sql);
header("Location: admin.php");
?>
<?php
require("azure_db_config.php");

$id = $_POST["id"];

$sql = "DELETE FROM markers WHERE id='$id'";
$result = $conn->query($sql);

header("Location: admin.php");
?>
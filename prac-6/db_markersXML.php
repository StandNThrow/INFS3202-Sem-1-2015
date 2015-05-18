<?php
require("azure_db_config.php");

// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Select all the rows in the markers table
$sql = "SELECT * FROM markers";
// $result = mysqli_query($connect, $sql);
$result = $conn->query($sql);
if (!$result) {
	//die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
//while ($row = @mysql_fetch_array($result)) {
while ($row = $result->fetch_object()) {
// ADD TO XML DOCUMENT NODE
	$node = $dom->createElement("marker");
	$newNode = $parnode->appendChild($node);
	$newNode->setAttribute("id", $row->id);
	$newNode->setAttribute("name", $row->name);
	$newNode->setAttribute("address", $row->address);
	$newNode->setAttribute("contact", $row->contact);
	$newNode->setAttribute("image", $row->imgURL);
	$newNode->setAttribute("lat", $row->lat);
	$newNode->setAttribute("lng", $row->lng);
	$newNode->setAttribute("description", $row->description);
}
echo $dom->saveXML();
?>
<?php
$mysqli = new mysqli('localhost', 'root', 'root', 'csci6441_stocks');
if ($mysqli->connect_error) {
	echo "Failed to connnect to MySQL:(" . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
}
?>
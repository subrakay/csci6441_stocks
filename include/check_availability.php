<?php
include('db.php');
$check = $mysqli->real_escape_string($_POST['check']);
if ($check == 'username') {
	$username = $mysqli->real_escape_string($_POST['username']);
	if ($username) {
		$result = $mysqli->query("SELECT username FROM users WHERE username='$username'");
		if ($result->num_rows > 0) {
			echo 0;
		} else {
			echo 1;
		}
	}
}
?>
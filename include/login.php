<?php
include('db.php');
$username = $mysqli->escape_string($_POST['username']);
$password = md5($mysqli->escape_string($_POST['password']));
$result = $mysqli->query("SELECT * FROM users WHERE username='$username'");
if ($result->num_rows != 0) {
	$result = $mysqli->query("SELECT username FROM users WHERE username='$username' AND passwd='$password'");
	if ($result->num_rows != 0) {
		$user = $result->fetch_assoc();
		setcookie($username);
		print json_encode($user);
	} else {
		echo 0;
	}
} else {
	echo 1;
}
?>

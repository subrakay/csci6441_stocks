<?php
$ticker = $_GET['ticker'];
include './include/db.php';

$query = "SELECT date, open, high, low, close, volume FROM transactions WHERE ticker = '$ticker' ORDER BY date ASC";
$rows = array();

if ($result = $mysqli->query($query)) {
	while ($r = $result->fetch_row()) {
		# format the data
		$r[0] = strtotime($r[0]) . '000';
		$r[0] = intval($r[0]);
		$r[1] = intval($r[1]);
		$r[2] = intval($r[2]);
		$r[3] = intval($r[3]);
		$r[4] = intval($r[4]);
		$r[5] = intval($r[5]);
		array_push($rows, $r);
	}
	print json_encode($rows);
}
?>
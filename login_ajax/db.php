<?php
$user = 'root'; $password = ''; $db = 'upand_running'; $host = '127.0.0.1'; $port = 3308;

$conn = mysqli_connect(
   $host, $user, $password, $db, $port
);
$mysqli = new mysqli($host, $user, $password, $db, $port);

if (mysqli_connect_errno()) {
	die("database connection failed:" .mysqli_connect_error().
	"(".mysqli_connect_errno().")"
	);
}
?>
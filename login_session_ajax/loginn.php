<?php
session_start();

if (!isset($_SESSION['button'])) {
    header('location: indez.php');
    exit();
}

?>

<a href = 'logout.php'>Log out</a><br>
amakuru<?php echo 'welcome';?>
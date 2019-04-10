<?php
session_start();

if (!isset($_SESSION['key'])) {
    header('location: login.php');
    exit();
}

echo "Welcome ".$_SESSION['firstnameajax'];

?>
<br>
<a href = 'logout.php'>Log out</a><br>
amakuru<?php echo 'welcome';?>
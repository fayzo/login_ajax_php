<?php
session_start();

session_unset($_SESSION['key']);
session_destroy();
header ("location: login.php");

?>
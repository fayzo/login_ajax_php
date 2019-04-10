<?php
session_start();

session_unset($_SESSION['button']);
session_destroy();
header ("location: indez.php");
// $_SESSION['email'] = $email;


?>
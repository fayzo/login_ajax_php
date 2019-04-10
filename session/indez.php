<?php
session_start();

$_SESSION['name'] = 234;
echo $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset ="UTF-8">
     <meta name ="viewport" content="width=device-width","initial-scale=1.0">
	 <link href="/.css" rel="stylesheet">
</head>
<body>
      <a href ='ind3.php'>login</a>
      <a href ='ind2.php'>login</a>
</body>
</html>
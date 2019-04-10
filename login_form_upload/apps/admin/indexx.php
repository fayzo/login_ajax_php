<?php
namespace apps\admin;
require dirname(__FILE__). '/../../vendor/autoload.php';

use apps\admin\Control as control;
use apps\admin\Navbar as navbar;

$control= new control("nmbr of post", "nmbr of admin", "nmbr of comments","imyenda",323.23);

// $control->post="nmbr of post";
// $control->dmin ="nmbr of admin";
// $control->comments ="nmbr of comments";
echo $control->display();
echo "<br>";
echo control::get_time();
echo "<br>";
echo  Control::query();
echo "<br>";

$navbar= new navbar("amakuru", "bite", "ndaho", "bite", "ndaho");
echo $navbar->display();
?>
<!-- <form action="" method="post">
  <label for=""></label>
  <input type="text" name="name" value = "imyenda" id="" aria-describedby="helpId" placeholder="">
  <input type="text" name="price" value = "fayzo" id="" aria-describedby="helpId" placeholder="">
  <input type="submit" value="button">
</form>  -->
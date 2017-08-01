<?php
$dbc=mysqli_connect('localhost','root','12345','sysintg');

if (!$dbc) {
 die('Could not connect: '.mysql_error());
}

?>
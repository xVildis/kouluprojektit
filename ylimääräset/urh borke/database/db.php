<?php

$username = "20silvil";
$password = "salasana";
$dbname = $username;

$con = mysqli_connect("samarium", $username, $password, $dbname);
mysqli_set_charset($con, "utf8");
 
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
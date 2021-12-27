<?php
session_start();
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "DMSG"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  echo "Connection failed: " . mysqli_connect_error();
  die("Connection failed: " . mysqli_connect_error());
  
}
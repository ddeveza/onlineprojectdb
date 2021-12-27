<?php

global $con;
session_start();
include 'D:\xampp\htdocs\dmsg\config\config.php';
if(!$con){
	echo "Database connect error".mysqli_error($con);
}


$UniqueID =$_POST['unique'];

echo $UniqueID;

$delete = "DELETE FROM weeklystatus Where ID='".$UniqueID."';";

$result = mysqli_query($con,$delete);

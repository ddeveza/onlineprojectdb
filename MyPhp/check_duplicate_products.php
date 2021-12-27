<?php

include 'D:\xampp\htdocs\dmsg\config\config.php';
session_start();

$DeviceID = mysqli_real_escape_string($con,$_POST['DeviceID']);

$sql ="Select Device_ID From Products where Device_ID='$DeviceID'";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) > 0){
	echo 1;
}else{ echo 0;};
<?php

include'../../config/config.php';
session_start();

$DeviceID = mysqli_real_escape_string($con,$_POST['DeviceID']);

$sql ="SELECT DeviceID From hardwarews where DeviceID='$DeviceID'";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) > 0){
	echo 1;
}else{ echo 0;};
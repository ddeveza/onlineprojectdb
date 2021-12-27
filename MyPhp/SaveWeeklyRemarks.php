<?php

global $con;
session_start();
include 'D:\xampp\htdocs\dmsg\config\config.php';
if(!$con){
	echo "Database connect error".mysqli_error($con);
}

$ID = $_POST['UniqueId'];
$Remark = $_POST['Remarks'];




$update = "UPDATE projects SET Weekly_Remarks='$Remark' where Project_ID=$ID";

$result = mysqli_query($con,$update);

echo $result;
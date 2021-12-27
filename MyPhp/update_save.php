<?php

global $con;
session_start();
include 'D:\xampp\htdocs\dmsg\config\config.php';
if(!$con){
	echo "Database connect error".mysqli_error($con);
}

$Workweek = $_POST['WWeek'];
$ProjYear = $_POST['projyear'];
$ProjDetail = $_POST['projdetail'];
$ProjID =$_POST['projID'];



$update = "UPDATE weeklystatus SET Detailed_Status_Update='".$ProjDetail."' WHERE Week_number ='".$Workweek."' AND project_year='".$ProjYear."' AND Project_ID ='".$ProjID."';";

$result = mysqli_query($con,$update);


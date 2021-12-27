<?php

include 'D:\xampp\htdocs\dmsg\config\config.php';
session_start();
$ID= mysqli_real_escape_string($con,$_POST['ID']);
$DeviceID = mysqli_real_escape_string($con,$_POST['DeviceID']);
$Monicker = mysqli_real_escape_string($con,$_POST['Monicker']);
$PTI = mysqli_real_escape_string($con,$_POST['PTI']);
$Customer = mysqli_real_escape_string($con,$_POST['Customer']);
$DeviceOwner = mysqli_real_escape_string($con,$_POST['DeviceOwner']);
$ReleaseCode = mysqli_real_escape_string($con,$_POST['ReleaseCode']);
$WSLocation = mysqli_real_escape_string($con,$_POST['WSLocation']);
$FTLocation = mysqli_real_escape_string($con,$_POST['FTLocation']);
$AssemblyLocation = mysqli_real_escape_string($con,$_POST['AssemblyLocation']);
$FABLocation = mysqli_real_escape_string($con,$_POST['FABLocation']);
$PrimaryTDE = mysqli_real_escape_string($con,$_POST['PrimaryTDE']);
$ProgramManager = mysqli_real_escape_string($con,$_POST['ProgramManager']);

$add_sql = "
	UPDATE products SET
	  Device_ID='$DeviceID',
	  Description='$Monicker',
	  PTI2='$PTI',
	  Customer='$Customer',
	  Device_Owner='$DeviceOwner',
	  Release_Code='$ReleaseCode',
	  WS_Location='$WSLocation',
	  FT_Location='$FTLocation',
	  Assembly_Location='$AssemblyLocation',
	  FAB_Location='$FABLocation',
	  Primary_TDE='$PrimaryTDE',
	  Program_Manager='$ProgramManager'
	  
	  WHERE ID='$ID';
";	
$result= mysqli_query($con,$add_sql);
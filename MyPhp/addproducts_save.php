<?php

include 'D:\xampp\htdocs\dmsg\config\config.php';
session_start();

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
	INSERT INTO products(
	  Device_ID,
	  Description,
	  PTI2,
	  Customer,
	  Device_Owner,
	  Release_Code,
	  WS_Location,
	  FT_Location,
	  Assembly_Location,
	  FAB_Location,
	  Primary_TDE,
	  Program_Manager
	)
	VALUES(
	  '$DeviceID',
	  '$Monicker',
	  '$PTI',
	  '$Customer',
	  '$DeviceOwner',
	  '$ReleaseCode',
	  '$WSLocation',
	  '$FTLocation',
	  '$AssemblyLocation',
	  '$FABLocation',
	  '$PrimaryTDE',
	  '$ProgramManager'
	  
	)
";

$result = mysqli_query($con,$add_sql);
echo $result;
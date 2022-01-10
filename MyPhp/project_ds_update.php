<?php

include 'D:\xampp\htdocs\dmsg\config\config.php';
session_start();


$unique = $_POST['Unique'];
$ProjectName = $_POST['ProjName'];
$businesscase = $_POST['businesscase'];
$projtype = $_POST['projtype'];
$OSPITE = utf8_decode($_POST['OSPITE']);
$OSPISUPTE = $_POST['OSPISUPTE'];
$DeviceID = $_POST['DeviceID'];
$ReleaseMethod = $_POST['ReleaseMethod'];
$ProjectStatus = $_POST['ProjectStatus'];
$tester = $_POST['tester'];
$Devicepackage = $_POST['Devicepackage'];
$PrimaryTE = $_POST['PrimaryTE'];
$Priority = $_POST['Priority'];

$ecosubmitteddate = $_POST['ecosubmitteddate'];
$ecoreleasedddate = $_POST['ecoreleasedddate'];
$OSPI_PE = $_POST['OSPIPE'];


$cabnumber = $_POST['cabnumber'];
$cabapprovedate = $_POST['cabapprovedate'];


$handler1 = $_POST['handler'];
$noofsites1 = $_POST['noofsites'];								

$qualcompleteddate = $_POST['qualcompleteddate'];
$tprdate = $_POST['tprdate'];
$bin1date = $_POST['bin1date'];












$update =" UPDATE Projects SET 
	CAB_Number = '$cabnumber',
	CAB_Approved_Date = '$cabapprovedate',
	
	Project_Name = '$ProjectName',
	Project_Type = '$projtype',
	Project_Description='$businesscase',
	OSPI_Test_Engineer='$OSPITE',
	Support_TE= '$OSPISUPTE',
	Device_ID ='$DeviceID',
	Release_Method = '$ReleaseMethod',
	Project_Status ='$ProjectStatus',
	tester = '$tester',
	package = '$Devicepackage',
	Primary_Test_Engineer = '$PrimaryTE',
	Priority = '$Priority',
	

	ECO_Submitted = '$ecosubmitteddate',

	ECO_Released = '$ecoreleasedddate',

	OSPI_PE = '$OSPI_PE',
	
	handler = '$handler1',
	sites = '$noofsites1',
	TestItemReceived_Date ='$tprdate' ,
	Bin1_Date = '$bin1date',
	QualCompletion_Date = '$qualcompleteddate'


	
	WHERE Project_ID='$unique';
	";


/*if ($Tray){



}else if ($KIT){

}else if ($CUHSocket){

}
*/
	
$result= mysqli_query($con,$update);


echo $result;

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
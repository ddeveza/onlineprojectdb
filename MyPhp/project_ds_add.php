<?php

include 'D:\xampp\htdocs\dmsg\config\config.php';
session_start();

$businesscase = mysqli_real_escape_string($con,$_POST['businesscase']);
$projtype = mysqli_real_escape_string($con,$_POST['projtype']);
$OSPITE = utf8_decode($_POST['OSPITE']);
$OSPISUPTE = utf8_decode($_POST['OSPISUPTE']);
$DeviceID = mysqli_real_escape_string($con,$_POST['DeviceID']);
$ReleaseMethod = $_POST['ReleaseMethod'];
$ProjectStatus = mysqli_real_escape_string($con,$_POST['ProjectStatus']);
$tester = mysqli_real_escape_string($con,$_POST['tester']);
$Devicepackage = mysqli_real_escape_string($con,$_POST['Devicepackage']);
$PrimaryTE = mysqli_real_escape_string($con,$_POST['PrimaryTE']);
$Priority = mysqli_real_escape_string($con,$_POST['Priority']);
$devtstartdate = mysqli_real_escape_string($con,$_POST['devtstartdate']);
$qualstartdate = mysqli_real_escape_string($con,$_POST['qualstartdate']);
$cabdate = mysqli_real_escape_string($con,$_POST['cabdate']);
$ecosubmitteddate = mysqli_real_escape_string($con,$_POST['ecosubmitteddate']);
$ecoreleasedddate = mysqli_real_escape_string($con,$_POST['ecoreleasedddate']);
$ProjName = mysqli_real_escape_string($con,$_POST['ProjectName']);
$OSPI_PE = mysqli_real_escape_string($con,$_POST['OSPIPE']);


$handler = mysqli_real_escape_string($con,$_POST['handler']);
$noofsites = mysqli_real_escape_string($con,$_POST['noofsites']);




$prpdate = $_POST['prpdate'];
$cabnumber = $_POST['cabnumber'];
$cabapprovedate = $_POST['cabapprovedate'];
$cabapproved = $_POST['cabapproved'];
//$data = $RapidTypeofChange;

if ($ReleaseMethod == 'RapidRelease') {
	$RapidTypeofChange = $_POST['RapidValue'];

	if ($RapidTypeofChange !=''){
			$businesscase = $businesscase ."<br><br><b>Rapid Release Type of Change: <b>". $RapidTypeofChange;
			$data = 1;
	}else{
		$data = 2; //2 for doesnt have type of cahnge of rapid relaese. To catch empty
	}
}else{

		$data = 1;

}
//compute cycle time
$date1=date_create($devtstartdate);
$date2=date_create(date('m/d/Y'));
$diff=date_diff($date1,$date2);
$devtcycletime = $diff->format("%a");

$date1=date_create($qualstartdate);
$date2=date_create(date('m/d/Y'));
$diff=date_diff($date1,$date2);
$qualcycletime = $diff->format("%a");

$date1=date_create($ecosubmitteddate);
$date2=date_create(date('m/d/Y'));
$diff=date_diff($date1,$date2);
$ecosubmitcycletime = $diff->format("%a");

$date1=date_create($ecoreleasedddate);
$date2=date_create(date('m/d/Y'));
$diff=date_diff($date1,$date2);
$ecoapprovecycletime = $diff->format("%a");


$add_sql="
    INSERT INTO projects (
	Project_Name,
	Project_Type,
	Project_Description,
	OSPI_Test_Engineer,
	Support_TE,
	Device_ID,
	Release_Method,
	Project_Status,
	tester,
	package,
	Primary_Test_Engineer,
	Priority,
	Development_Start_Date,
	Development_Cycle_Time,
	Qualification_Start_Date,
	Qualification_Cycle_Time,
	CAB_Date,
	ECO_Submitted,
	ECO_Submit_Cycle_Time,
	ECO_Released,
	ECO_Approve_Cycle_Time,
	OSPI_PE,
	CAB_Approved_Date,
	CAB_Approved,
	CAB_Number,
	PRP_Date,
	handler,
	sites

	
	
	)
	VALUES(
	'$ProjName',
	'$projtype',
	'$businesscase',
	'$OSPITE',
	'$OSPISUPTE',
	'$DeviceID',
	'$ReleaseMethod',
	'$ProjectStatus',
	'$tester',
	'$Devicepackage',
	'$PrimaryTE',
	'$Priority',
	'$devtstartdate',
	'$devtcycletime',
	'$qualstartdate',
	'$qualcycletime',
	'$cabdate',
	'$ecosubmitteddate',
	'$ecosubmitcycletime',
	'$ecoreleasedddate',
	'$ecoapprovecycletime',
	'$OSPI_PE',
	'$cabapprovedate',
	'$cabapproved',
	'$cabnumber',
	'$prpdate',
	'$handler',
	'$noofsites'

	
	
	
	)";

	

if ($data == 1){

	$result = mysqli_query($con,$add_sql);

}else if ($data ==2 ) {

	$result = 2;
}




/* $Monicker_sql = "Select Description from products where Device_ID='$DeviceID';";

$result = mysqli_query($con,$Monicker_sql);
$row = mysqli_fetch_array($result);
$Monicker = $row['Description']; */


/* if( $ReleaseMethod != "N/A" ){

$ProjectName = "Update projects SET Project_Name = '$projtype - $ReleaseMethod - $DeviceID ($Monicker) $Devicepackage $tester' where Project_ID = LAST_INSERT_ID();";

$result = mysqli_query($con,$ProjectName);
}else
{
	
$ProjectName = "Update projects SET Project_Name = '$projtype - $DeviceID ($Monicker) $Devicepackage $tester' where Project_ID = LAST_INSERT_ID();";
$result = mysqli_query($con,$ProjectName);	
	
}*/
echo $result; 
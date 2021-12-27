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
$devtstartdate = $_POST['devtstartdate'];
$qualstartdate = $_POST['qualstartdate'];
$cabdate = $_POST['cabdate'];
$ecosubmitteddate = $_POST['ecosubmitteddate'];
$ecoreleasedddate = $_POST['ecoreleasedddate'];
$OSPI_PE = $_POST['OSPIPE'];

$prpdate = $_POST['prpdate'];
$cabnumber = $_POST['cabnumber'];
$cabapprovedate = $_POST['cabapprovedate'];
$cabapproved = $_POST['cabapproved'];

$handler1 = $_POST['handler'];
$noofsites1 = $_POST['noofsites'];								

					
/* $Monicker_sql = "Select Description from products where Device_ID='$DeviceID';";

$result_monicker = mysqli_query($con,$Monicker_sql);
$row_monicker = mysqli_fetch_array($result_monicker);
$Monicker = $row_monicker['Description'];


if( $ReleaseMethod != "Not Applicable" ){

$ProjectName = $projtype." - ".$ReleaseMethod." - ".$DeviceID."(".$Monicker.")". $Devicepackage." ".$tester;


}else
{
$ProjectName = $projtype." - ".$DeviceID."(".$Monicker.")". $Devicepackage." ".$tester;	


	
} */
function dateDiffInDays($date1, $date2)  
{ 
	// Calulating the difference in timestamps 
	$diff = strtotime($date2) - strtotime($date1); 
	
	// 1 day = 24 hours 
	// 24 * 60 * 60 = 86400 seconds 
	return round($diff / 86400); 
}




//$diff = strtotime($date2) - strtotime($date1); 
$devtcycletime = dateDiffInDays($devtstartdate,$qualstartdate);
$qualcycletime = dateDiffInDays($qualstartdate,$cabdate);
$ecosubmitcycletime = dateDiffInDays($cabdate,$ecosubmitteddate);
$ecoapprovecycletime = dateDiffInDays($ecosubmitteddate,$ecoreleasedddate);




$update =" UPDATE Projects SET 
	CAB_Number = '$cabnumber',
	CAB_Approved_Date = '$cabapprovedate',
	CAB_Approved ='$cabapproved',
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
	Development_Start_Date = '$devtstartdate',
	Development_Cycle_Time = '$devtcycletime',
	Qualification_Start_Date = '$qualstartdate',
	Qualification_Cycle_Time = '$qualcycletime',
	CAB_Date = '$cabdate',
	ECO_Submitted = '$ecosubmitteddate',
	ECO_Submit_Cycle_Time = '$ecosubmitcycletime',
	ECO_Released = '$ecoreleasedddate',
	ECO_Approve_Cycle_Time = '$ecoapprovecycletime',
	OSPI_PE = '$OSPI_PE',
	PRP_Date = '$prpdate',
	handler = '$handler1',
	sites = '$noofsites1'
	
	WHERE Project_ID='$unique';
	";


/*if ($Tray){



}else if ($KIT){

}else if ($CUHSocket){

}
*/
	
$result= mysqli_query($con,$update);


echo $result;

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

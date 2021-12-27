<?php
//include ('C:\wamp\www\config\config.php');
include 'D:\xampp\htdocs\dmsg\config\config.php';
if(!$con){
	echo "Database connect error".mysqli_error($con);
}
	$engineer = mysqli_real_escape_string($con,$_POST['engineer']);
	$workweek = mysqli_real_escape_string($con,$_POST['workweek']);
    $YearProj = mysqli_real_escape_string($con,$_POST['YearProj']);
    $ids = mysqli_real_escape_string($con,$_POST['ids']);
    $projectstatus= mysqli_real_escape_string($con,$_POST['projectstatus']);
	
	
	
	
	$check_duplicate_ww = "select Project_ID,Week_Number, project_YEAR  from weeklystatus where Project_ID='".$ids."' AND Week_Number='".$workweek."' AND project_YEAR='".$YearProj."';";
	$result = mysqli_query($con,$check_duplicate_ww);
	if(mysqli_num_rows($result)>0){
		echo $workweek." is already existing"; //duplicate workweek exist
	}else{
		$save_data = "INSERT INTO weeklystatus(Week_Number,project_YEAR,Project_ID,OSPI_Test_Engineer,Detailed_Status_Update)values('$workweek','$YearProj','$ids','$engineer','$projectstatus')";
		
		$result = mysqli_query($con,$save_data);
		
		echo "Project Status Update for ".$workweek." has been added";
	
	    
	}
	
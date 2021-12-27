<?php 

global $con;
session_start();
include 'D:\xampp\htdocs\dmsg\config\config.php';
if(!$con){
	echo "Database connect error".mysqli_error($con);
}
$unique = mysqli_real_escape_string($con,$_POST['UniqueId']);

$fetch = "select * from weeklystatus where id='".$unique."';";
$result = mysqli_query($con,$fetch);

if(mysqli_num_rows($result)>0){
	$row =mysqli_fetch_array($result);
	
	$ProjID=$row['Project_ID'];
	$WeekNumber=$row['Week_Number'];
	$year=$row['project_year'];
	$projDetail=$row['Detailed_Status_Update'];

}



$getproj_name = "Select Project_Name from projects where Project_ID='".$ProjID."';";
$result = mysqli_query($con,$getproj_name);
if(mysqli_num_rows($result)>0){
	$row =mysqli_fetch_array($result);
	$project_name = $row['Project_Name'];
	
}




$result = mysqli_query($con,$fetch);
if(mysqli_num_rows($result)>0){
	
	$row =mysqli_fetch_array($result);
	 $output = "<b>Project Title: </b>".$project_name."<br><br><b>WorkWeek: </b>".$row['Week_Number']."<br><br><b>Status Updates:<br></b>".$row['Detailed_Status_Update'];
	 echo $output;
}
?>
  
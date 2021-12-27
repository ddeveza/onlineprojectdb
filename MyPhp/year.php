

	
	

<?php
include 'D:\xampp\htdocs\dmsg\config\config.php';
session_start();
$id = mysqli_real_escape_string($con,$_POST['id']);

$sql = "Select Project_Name, Project_ID, Project_Description FROM Projects where Project_ID='".$id."';";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)==1){
   session_regenerate_id();
   $row = mysqli_fetch_array($result);
   $_SESSION["TEProjName"]= $row['Project_Name'];
   $_SESSION['TEID']= $row['Project_ID'];
   
   echo $row['Project_Description'];
   
   
  
   
}


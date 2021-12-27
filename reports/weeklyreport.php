<?php

include 'D:\xampp\htdocs\dmsg\config\config.php';


//$Engr = mysqli_real_escape_string($con,$_POST['OspiEngr']);
//$Status = mysqli_real_escape_string($con,$_POST['ProjStatus']);
console.log("Dennis");
$result = mysqli_query($con,"Select Project_Name, Project_Type, Project_Status, Device_ID FROM Projects");

$rows = array();
	while($row=mysqli_fetch_array($result)){
		$rows[] = $row;
	}
echo json_encode($rows);

?>
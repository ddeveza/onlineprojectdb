<?php

//include 'D:\xampp\htdocs\dmsg\config\config.php';
session_start();
$con=mysqli_connect('localhost','root','','dmsg')
    or die("connection failed".mysqli_errno());

$request=$_REQUEST;
$col =array(
    0   =>  'Project_ID',
    1   =>  'Device_ID',
    2   =>  'Project_Name',
    3   =>  'Project_Type',
	4   =>   'Project_Status'
);  

$TE_Name = $_SESSION["TEName"];

$fetch_proj = "SELECT  Project_ID,Device_ID, Project_Name, Project_Type, Project_Status 
			   FROM projects 
			   WHERE OSPI_Test_Engineer='Dennis Deveza';";
$result = mysqli_query($con,$fetch_proj);
$data=array();
$totaldata= mysqli_num_rows($result);

while($row=mysqli_fetch_array($result)){
    $subdata=array();
    $subdata[]=$row[0]; //id
    $subdata[]=$row[1]; //name
    $subdata[]=$row[2]; //salary
	$subdata[]=$row[3]; //salary
    $subdata[]=$row[4]; //age           //create event on click in button edit in cell datatable for display modal dialog           $row[0] is id in table on database
    
	$subdata[]='<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$row[0].'"><i class="glyphicon glyphicon-pencil">&nbsp;</i>Edit</button>
                <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash">&nbsp;</i>Delete</button>';
    $data[]=$subdata;
}


echo json_encode($TE_Name);

?>

<script>
	alert("dennis");
</script>
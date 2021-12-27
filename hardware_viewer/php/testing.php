<?php


	$con = mysqli_connect("localhost","root","","dmsg");
	
					$sql = 'SELECT * from projects limit 10';


$result = mysqli_query($con,$sql); 

//$sql = "SELECT Project_ID, Project_ID from projects";
//$result = mysqli_query($con,$sql);
//echo $result;
$rows = array('data' =>  array() );
while($row=mysqli_fetch_array($result)){
	
	$Remarks = '<textarea class="Dennis" rows="3" cols="50" id="'.$row['Project_ID'].'" >'.$row['Weekly_Remarks'].'</textarea>  ' ;


	$rows ['data'][] = array(

		'Project_ID' => $row['Project_ID'],
		$row['Project_Name'],
		$row['Project_Status']
	);

	
}

/*
echo '<pre>';
print_r(($rows));
echo '</pre>';
*/
echo json_encode($rows);


?>
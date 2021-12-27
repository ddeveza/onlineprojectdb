<?php


include '../config/config.php';

$engineer = $_POST['engineer'];


$fetchproj = "SELECT Project_ID, Project_Name ,Project_Description FROM projects where Project_Status = 'Ongoing' AND OSPI_Test_Engineer = '$engineer'";


$result = mysqli_query($con, $fetchproj);




while($row=mysqli_fetch_array($result)){

	$data[]=array (

		'ID' => $row['Project_ID'],
		'ProjectName' => $row['Project_Name'],
		'BusinessCase' => $row ['Project_Description']



	);

}

/*echo '<pre>';

print_r($data);
echo '</pre>';
*/

echo json_encode($data);

?>
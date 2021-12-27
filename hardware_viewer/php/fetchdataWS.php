<?php


	$con = mysqli_connect("localhost","root","","dmsg");
	
	$sql = 'SELECT * from hardwarews';


$result1 = mysqli_query($con,$sql); 

//$sql = "SELECT ID, ID from projects";
//$result = mysqli_query($con,$sql);
//echo $result;
$rowsws = array('data' =>  array() );
while($row=mysqli_fetch_array($result1)){
	$ID = $row['ID'];
	$udpate = '<button type="button" class="btn btn-primary viewWS" id="'.$ID.'">'.$ID.'</button>';
	$qualstartdate = $row['PCQSD'];

	if ($qualstartdate == '0000-00-00') $qualstartdate='';


	$rowsws ['data'][] = array(

			$udpate,
			$row['DeviceID'],
			$row['Local_TE'],
			$row['Corp_TE'],
			$row['Monicker'],
			$row['PCBVendor'],
			$row['PCVendor'],
			$row['NeedleCount'],
			$row['Gramforce'],
			$row['ProbeTech'],
			$row['TechType'],
			$row['ProbeDepth'],
			$row['ProbeNeedleMat'],
			$row['CleaningMat'],
			$row['Elteso'],
			$row['WaferType'],
			$row['ProbecardPN'],
			$row['Setup'],
			$row['Insertion'],
			$row['Temperature'],
			$row['ProbecardQty'],
			$row['Tester'],
			$row['Sites'],
			$row['Configuration'],
			$qualstartdate,
			$row['PCHMMS'],
			$row['PCRemarks']



		);
}

// echo '<pre>';
// print_r($rowsws);
// echo '</pre>';
echo json_encode($rowsws);

?>
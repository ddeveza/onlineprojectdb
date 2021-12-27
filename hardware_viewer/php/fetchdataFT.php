<?php


	$con = mysqli_connect("localhost","root","","dmsg");
	
	$sql = 'SELECT * from hardwareft';


$result = mysqli_query($con,$sql); 

//$sql = "SELECT ID, ID from projects";
//$result = mysqli_query($con,$sql);
//echo $result;
$rows = array('data' =>  array() );
while($row=mysqli_fetch_array($result)){
	$ID = $row['ID'];
	$udpate = '<button type="button" class="btn btn-primary view" id="'.$ID.'">'.$ID.'</button>';
	$CUHSoc_QSD = $row['CUHSoc_QSD'];
	$Kit_QSD = $row['Kit_QSD'];
	$tray_QSD=$row['tray_QSD'];

	if ($CUHSoc_QSD == '0000-00-00') $CUHSoc_QSD='';
	if ($Kit_QSD == '0000-00-00') $Kit_QSD='';
	if ($tray_QSD == '0000-00-00') $tray_QSD='';

	$rows ['data'][] = array(

		 $udpate,
		 $row['Local_TE'],
		 $row['Device_ID'],
		 $row['Monicker'],
		 $row['Temp'],
		 $row['cuh'],
		 $row['packagetype'],
		 $row['packagesize'],
		 $row['leadcount'],
		 $row['handler'],
		 $row['Tester'],
		 $row['cs_hmms'],
		 $CUHSoc_QSD,
		 $row['cs_remarks'],
		 $row['SocPN'],
		 $row['CUHSN'],
		 $row['SocType'],
		 $row['PinType'],
		 $row['Pitch'],
		 $row['PTBRecep'],
		 $row['Package'],
		 $row['LF'],
		 $row['NoSite'],
		 $row['SocQty'],
		 $row['Kit'],
		 $Kit_QSD,
		 $row['kit_hmms'],
		 $row['kit_remarks'],
		 $row['tray'],
		 $tray_QSD,
		 $row['tray_status']
		
		
	);

	
}


//echo '<pre>';
//print_r(($rows));
//echo '</pre>';

echo json_encode($rows);


?>


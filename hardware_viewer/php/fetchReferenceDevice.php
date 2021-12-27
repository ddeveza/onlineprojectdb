<?php
	

	include'../../config/config.php';

	$refdevice = explode(':',$_POST['Device_ID']);



	$sql = "SELECT * FROM hardwareft WHERE Device_ID='$refdevice[0]' AND packagetype='$refdevice[1]' ";
	$result = mysqli_query($con,$sql); 
	while($row=mysqli_fetch_array($result)){

		$data = array (
				 
			'RefDevice' => $row['Device_ID'],
			 			   
			'PackageType'	=>			 $row['packagetype'],
			'PackageSize'	=>		 $row['packagesize'],
			'LeadCount'		=>		 $row['leadcount'],
			'handler'		=>		 $row['handler'],
			'tester'		=>		 $row['Tester'],
			'socpn'			=>	 $row['SocPN'],
			'cuhsn'			=>	 $row['CUHSN'],
			'soctype'		=>		 $row['SocType'],
			'pintype'		=>		 $row['PinType'],
			'pitch'			=>	 $row['Pitch'],
			'ptbrecep'		=>		 $row['PTBRecep'],
			'package'		=>		 $row['Package'],
			'lf'			=>	 $row['LF']
				
				
				


		);
	}

	echo json_encode($data);

	
?>
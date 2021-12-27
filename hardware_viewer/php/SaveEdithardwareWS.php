<?php


include'../../config/config.php';



session_start();


	if(isset($_POST)){
		//$deviceid=$_POST['deviceid'];
		//$ospite=$_POST['ospite'];
		$ID = $_POST['ID'];
		$corpte=$_POST['corpte'];
		$monicker=$_POST['monicker'];
		$pcbvendor=$_POST['pcbvendor'];
		$pcvendor=$_POST['pcvendor'];
		$needlecount=$_POST['needlecount'];
		$gf=$_POST['gf'];
		$probetech=$_POST['probetech'];
		$techtype=$_POST['techtype'];
		$probedepth=$_POST['probedepth'];
		$elteso=$_POST['elteso'];
		$needlemat=$_POST['needlemat'];
		$cleanmat=$_POST['cleanmat'];
		$wafertype=$_POST['wafertype'];
		$pcpn=$_POST['pcpn'];
		$setup=$_POST['setup'];
		$insertion=$_POST['insertion'];
		$temp=$_POST['temp'];
		$pcqyt=$_POST['pcqyt'];
		$tester=$_POST['tester'];
		$pcnoofsites=$_POST['pcnoofsites'];
		$pcconfig=$_POST['pcconfig'];
		$pcqsd=$_POST['pcqsd'];
		$pchmms=$_POST['pchmms'];
		$pcremarks=$_POST['pcremarks'];


	}

	$update_sql = "
	UPDATE hardwarews SET

	  	Corp_TE='$corpte',
		Monicker='$monicker',
		PCBVendor='$pcbvendor',
		PCVendor='$pcvendor',
		NeedleCount='$needlecount',
		Gramforce='$gf',
		ProbeTech='$probetech',
		TechType='$techtype',
		ProbeDepth='$probedepth',
		ProbeNeedleMat='$needlemat',
		CleaningMat='$cleanmat',
		Elteso='$elteso',
		WaferType='$wafertype',
		ProbecardPN='$pcpn',
		Setup='$setup',
		Insertion='$insertion',
		Temperature='$temp',
		ProbecardQty='$pcqyt',
		Tester='$tester',
		Sites='$pcnoofsites',
		Configuration='$pcconfig',
		PCQSD='$pcqsd',
		PCHMMS='$pchmms',
		PCRemarks='$pcremarks'


	  
	  WHERE ID='$ID';
";	
$result= mysqli_query($con,$update_sql);

echo $result;



?>
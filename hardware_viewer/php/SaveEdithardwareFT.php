<?php 

	include'../../config/config.php';




	if(isset($_POST)){

	$ID = $_POST['ID'];
	$ospite=$_POST['ospite'];
	$deviceid=$_POST['deviceid'];
	$corpte=$_POST['corpte'];
	$monicker=$_POST['monicker'];
	$temp=$_POST['temp'];

	
	$packtype=$_POST['packtype'];
	$packsize=$_POST['packsize'];
	$leadcount=$_POST['leadcount'];
	$handler=$_POST['handler'];
	$cuhnewold=$_POST['cuhnewold'];


	$soctech=$_POST['soctech'];
	$socpn=$_POST['socpn'];
	$pinpn=$_POST['pinpn'];
	$pitch=$_POST['pitch'];
	$socqty=$_POST['socqty'];
	$ptbrecep=$_POST['ptbrecep'];
	$packagelps=$_POST['packagelps'];
	$lf=$_POST['lf'];
	$noofsites=$_POST['noofsites'];
	$cuhsn=$_POST['cuhsn'];
	$tester=$_POST['tester'];
	$cuhsocqualtype=$_POST['cuhsocqualtype'];
	$cabype=$_POST['cabype'];
	$cuhsocqsd=$_POST['cuhsocqsd'];


	

	$cuhsocremarks=$_POST['cuhsocremarks'];
	$cuhsochmms=$_POST['cuhsochmms'];


	if ($_POST['cuhqualstatus'] === 'true'){
		$cuhqualstatus = 1;
	}else{
		$cuhqualstatus = 0;
	}

	if ($_POST['socqualstatus'] === 'true'){
		$socqualstatus = 1;
	}else{
		$socqualstatus = 0;
	}

	if ($_POST['kitqualstatus'] === 'true'){
		$kitqualstatus = 1;
	}else{
		$kitqualstatus = 0;
	}
	


	$kitnewold=$_POST['kitnewold'];
	$kitsn=$_POST['kitsn'];
	$kitqsd=$_POST['kitqsd'];
	
	$kitremarks=$_POST['kitremarks'];
	$kithmms=$_POST['kithmms'];

	$trayqsd=$_POST['trayqsd'];
	$traynewold=$_POST['traynewold'];
	$trayhmms=$_POST['trayhmms'];




		
	}


$update_sql = "
	UPDATE hardwareft SET
	Local_TE='$ospite',
	Corp_TE='$corpte',
	Device_ID='$deviceid',
	Monicker='$monicker',
	Temp='$temp',
	cuh='$cuhnewold',
	packagetype='$packtype',
	packagesize='$packsize',
	leadcount='$leadcount',
	handler='$handler',
	SocType='$soctech',
	SocPN='$socpn',
	PinType='$pinpn',
	Pitch='$pitch',
	SocQty='$socqty',
	PTBRecep='$ptbrecep',
	Package='$packagelps',
	LF='$lf',
	NoSite='$noofsites',
	CUHSN='$cuhsn',
	Tester='$tester',
	Qual_Category='$cuhsocqualtype',
	CAB='$cabype',
	CUHSoc_QSD='$cuhsocqsd',
	cs_cuhqualstatus=$cuhqualstatus,
	cs_socqualstatus=$socqualstatus,
	cs_hmms='$cuhsochmms',
	cs_remarks='$cuhsocremarks',
	Kit='$kitnewold',
	Kit_SN='$kitsn',
	Kit_QSD='$kitqsd',
	kit_qualstatus=$kitqualstatus,
	kit_hmms='$kithmms',
	kit_remarks='$kitremarks',
	tray='$traynewold',
	tray_QSD='$trayqsd',
	tray_status='$trayhmms'

	  
	  WHERE ID='$ID';
";	
$result= mysqli_query($con,$update_sql);

echo $result;
?>
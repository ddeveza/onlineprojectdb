<?php
	
	include'../../config/config.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require '../class/PHPMailer-master/src/Exception.php';
	require '../class/PHPMailer-master/src/PHPMailer.php';
	require '../class/PHPMailer-master/src/SMTP.php';

	session_start();
	

	if(isset($_POST)){

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
	
	//$kitqualstatus=$_POST['kitqualstatus'];
	$kitremarks=$_POST['kitremarks'];
	$kithmms=$_POST['kithmms'];

	$trayqsd=$_POST['trayqsd'];
	$traynewold=$_POST['traynewold'];
	$trayhmms=$_POST['trayhmms'];




		
	}


	$addFThardware=
		"INSERT INTO hardwareFT(
			Local_TE,
			Corp_TE,
			Device_ID,
			Monicker,
			Temp,
			cuh,
			packagetype,
			packagesize,
			leadcount,
			handler,
			SocType,
			SocPN,
			PinType,
			Pitch,
			SocQty,
			PTBRecep,
			Package,
			LF,
			NoSite,
			CUHSN,
			Tester,
			Qual_Category,
			CAB,
			CUHSoc_QSD,
			cs_cuhqualstatus,
			cs_socqualstatus,
			cs_hmms,
			cs_remarks,
			Kit,
			Kit_SN,
			Kit_QSD,
			kit_qualstatus,
			kit_hmms,
			kit_remarks,
			tray,
			tray_QSD,
			tray_status



		)
		VALUES(
			'$ospite',
			'$corpte',
			'$deviceid',
			'$monicker',
			'$temp',
			'$cuhnewold',
			'$packtype',
			'$packsize',
			'$leadcount',
			'$handler',
			'$soctech',
			'$socpn',
			'$pinpn',
			'$pitch',
			'$socqty',
			'$ptbrecep',
			'$packagelps',
			'$lf',
			'$noofsites',
			'$cuhsn',
			'$tester',
			'$cuhsocqualtype',
			'$cabype',
			'$cuhsocqsd',
			'$cuhqualstatus',
			'$socqualstatus',
			'$cuhsochmms',
			'$cuhsocremarks',
			'$kitnewold',
			'$kitsn',
			'$kitqsd',
			'$kitqualstatus',
			'$kithmms',
			'$kitremarks',
			'$traynewold',
			'$trayqsd',
			'$trayhmms'


		)

	";
	$mail = new PHPMailer(true);
	$result = mysqli_query($con,$addFThardware);
	 $last_id = mysqli_insert_id($con);


	 $RequestorEmail = array (

	 		'Brix Requina'=>'Brix.Requina@onsemi.com',
			'Carl Malimban'=>'Carl.Malimban@onsemi.com',
			'Dennis Deveza'=>'Dennis.Deveza@onsemi.com',
			'Domingo Uclaray Jr'=>'Domingo.UclarayJr@onsemi.com',
			'Erick Fetizanan'=>'Erick.Fetizanan@onsemi.com',
			'Gus Lim'=>'Gus.Lim@onsemi.com',
			'Jeren Lubay'=>'Jeren.Lubay@onsemi.com',
			'Joemz Corod'=>'Joemz.Corod@onsemi.com',
			'John Salud'=>'John.Salud@onsemi.com',
			'Nelson Banguis'=>'Nelson.Banguis@onsemi.com',
			'Raynard Vasquez'=>'Raynard.Vasquez@onsemi.com',
			'Rex Bullag'=>'Raynard.Vasquez@onsemi.com',
			'Denis Pincaro'=>'Denis.Pincaro@onsemi.com',
			'Guest'=>'Brix.Requina@onsemi.com'





	 );

	$Requestor =  $RequestorEmail[$ospite];


	try{
		//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    	$mail->isSMTP();    
    	$mail->Host       = 'smtp.onsemi.com';                    // Set the SMTP server to send through
    	//$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    	//$mail->Username   = 'online.projdb@gmail.com';                     // SMTP username
    	//$mail->Password   = 'onsemi123';                               // SMTP password
    	//$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  
    	//$mail->SMTPSecure = "tls";       // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    	$mail->Port       = 25;  




    	  //Recipients
    $mail->setFrom('DMSG.OJT@onsemi.com', 'Online-ProjectDB');
    $mail->addAddress('Brix.Requina@onsemi.com', 'Brix Requina'); 
    
        // Add a recipient
   
   // $mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
   	$mail->addCC($Requestor, $ospite);
  	$mail->addCC('Dennis.Deveza@onsemi.com','Dennis Deveza');
    $mail->addCC('Ian.Soliven@onsemi.com','Ian Soliven');
    $mail->addCC('Manny.Mandac@onsemi.com','Manny Mandac');
    $mail->addCC('Jeren.Lubay@onsemi.com','Jeren Lubay');
    $mail->addCC('Denis.Pincaro@onsemi.com', 'Denis Pincaro'); 


   


    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'FT - Online Project DB (Hardware Request) - '.$monicker.' '.$deviceid.' '.$packtype.' '.$packsize;
    $mail->Body    = '<b>Hi Brix</b> <br><br><br> '.'<b>Request ID: '. $last_id.'</b><br><b>'.$deviceid.'</b> Hardware request in FT has been added in HW DB by '.$ospite.' .<br> Please help to populate other information.  <a href="http://10.243.61.33:8080/dmsg/hardware/Accordion.php"> Click Here </a><br><br> Thanks!';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    
    //echo 'Message has been sent';
	}catch(Exception $e){
		 // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
	//$mail = new PHPMailer\PHPMailer\PHPMailer();

	/*  $to = "dennis.deveza@onsemi.com";
		$subject = "Online-Project DB - Hardware Request";
		$message = $deviceid." is added in hardware database by ".$ospite."\nPlease populate information";
		$from = 'dennis.deveza@onsemi.com';
	$headers = 'From:  $from' ;
	if (mail($to, $subject, $message, $headers, "-f " . $from)){
			echo 'success';
		}else{
			echo 'fail';
		}*/




	if ($result==1){
		
		/*$to = "dennis.deveza@onsemi.com";
		$subject = "Online-Project DB - Hardware Request";
		$message = "Hi Brix,\n\n".$deviceid." is added in hardware database by ".$ospite."\nPlease populate information";
		$from = 'dennis.deveza@onsemi.com';
		$headers = 'From:  $from' ;
		if (mail($to, $subject, $message, $headers, "-f " . $from)){
			echo 1;
		}else{
			echo 'fail';
		}
		*/

		$mail->send();
		echo 1;
	

	}else{
		echo 0;
	}


?>



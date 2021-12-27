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
		$deviceid=$_POST['deviceid'];
		$ospite=$_POST['ospite'];
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


	$addFThardware=
		"INSERT INTO hardwarews(
			DeviceID,
			Local_TE,
			Corp_TE,
			Monicker,
			PCBVendor,
			PCVendor,
			NeedleCount,
			Gramforce,
			ProbeTech,
			TechType,
			ProbeDepth,
			Elteso,
			ProbeNeedleMat,
			CleaningMat,
			WaferType,
			ProbecardPN,
			Setup,
			Insertion,
			Temperature,
			ProbecardQty,
			Tester,
			Sites,
			Configuration,
			PCQSD,
			PCHMMS,
			PCRemarks



		)
		VALUES(
			'$deviceid',
			'$ospite',
			'$corpte',
			'$monicker',
			'$pcbvendor',
			'$pcvendor',
			'$needlecount',
			'$gf',
			'$probetech',
			'$techtype',
			'$probedepth',
			'$elteso',
			'$needlemat',
			'$cleanmat',
			'$wafertype',
			'$pcpn',
			'$setup',
			'$insertion',
			'$temp',
			'$pcqyt',
			'$tester',
			'$pcnoofsites',
			'$pcconfig',
			'$pcqsd',
			'$pchmms',
			'$pcremarks'



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
			'Guest'=>'Gus.Lim@onsemi.com'




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
    $mail->addAddress('Gus.Lim@onsemi.com', 'Gus Lim');     // Add a recipient
   // $mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC($Requestor, $ospite);
    $mail->addCC('Dennis.Deveza@onsemi.com','Dennis Deveza');
   	$mail->addCC('Ian.Soliven@onsemi.com','Ian Soliven');
    $mail->addCC('Manny.Mandac@onsemi.com','Manny Mandac');
    $mail->addCC('Jeren.Lubay@onsemi.com','Jeren Lubay');
   // $mail->addBCC('ddeveza@example.com'); 


    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Sort - Online Project DB (Hardware Request) - '.$deviceid.' '.$monicker;
    $mail->Body    = '<b>Hi Gus</b> <br><br><br> '.'<b>Request ID: '. $last_id.'</b><br><b>'.$deviceid.'</b> hardware request in Sort has been added in HW DB by '.$ospite.' .<br> Please help to populate other information.  <a href="http://10.243.61.33:8080/dmsg/hardware/Accordion.php"> Click Here </a><br><br> Thanks!';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    
    //echo 'Message has been sent';
	}catch(Exception $e){
		 // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}






	if ($result==1){
		
		$mail->send();
		echo 1;
	

	}else{
		echo 0;
	}


	
?>
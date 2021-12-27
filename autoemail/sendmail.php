<?php 


	$downloadTrigger = $_POST['downloadTrigger'];

	

	


    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer-master/src/Exception.php';
	require 'PHPMailer-master/src/PHPMailer.php';
	require 'PHPMailer-master/src/SMTP.php';



	$trigger = $_POST['downloadTrigger'];
    $year = date('Y');
    $newWW = date('W');
	

  sleep(10);// 5s wait time to donwload first the file
	$mail = new PHPMailer(true);

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
    	
    	$mail->addAddress('Manny.Mandac@onsemi.com','Manny Mandac');
    
        // Add a recipient
   
   		 $mail->addAddress('ellen@example.com');               // Name is optional
   		 $mail->addReplyTo('info@example.com', 'Information');
   			$mail->addCC($Requestor, $ospite);
  		$mail->addAddress('Dennis.Deveza@onsemi.com','Dennis Deveza');
   	  $mail->addCC('Ian.Soliven@onsemi.com','Ian Soliven');
   	  $mail->addCC('Brix.Requina@onsemi.com', 'Brix Requina'); 
   		$mail->addCC('Jeren.Lubay@onsemi.com','Jeren Lubay');
   		$mail->addCC('Gus.Lim@onsemi.com', 'Gus Lim'); 
      $mail->addCC('Rex.Bullag@onsemi.com','Rex Bullag');
   		$mail->addCC('Denis.Pincaro@onsemi.com', 'Denis Pincaro'); 


   
  		$mail->addAttachment('D:\hardwareTrackingFiles\FTHardware_'.$year.'WW'.$newWW.'.xlsx','FTHardware_'.$year.'WW'.$newWW.'.xlsx');
  		$mail->addAttachment('D:\hardwareTrackingFiles\hardwareWS_'.$year.'WW'.$newWW.'.xlsx','WSHardware_'.$year.'WW'.$newWW.'.xlsx');


    	$mail->isHTML(true);                                  // Set email format to HTML
    	$mail->Subject = 'ASG CTPE Carmona - Hardware Tracking File';
    	$mail->Body    = '<br><br>Do not reply auto email for weekly hardware tracking files<br><br><br>';
      //$mail->Body    = '<br><br>Ignore this email , trial version only for auto-email of weekly hardware tracking files<br><br><br>';
    	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    
    //echo 'Message has been sent';
	}catch(Exception $e){
		  // "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}

        
	if($trigger == '1'){

		$mail->send();

		echo 'triggered , successfully sent';
		

	}
   
	





?>
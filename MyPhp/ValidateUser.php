<?php
include 'D:\xampp\htdocs\dmsg\config\config.php';
if(!$con){
	echo "Database connect error".mysqli_error($con);
} //database setup	
session_start();

	$user = mysqli_real_escape_string($con,$_POST['loginuser']);
	$pass = mysqli_real_escape_string($con,$_POST['loginpassword']);
	
	if($user == "" || $pass ==""){
		echo "Both Username and Password must be filled in!";
	}else{
		//echo $user;
		//echo $pass;
		$sql_query = "Select OSPI_Test_Engineer,OndexID,UserType FROM testengineer where OndexID='".$user."' and CID='".$pass."'";
		$result = mysqli_query($con,$sql_query);
		//$row = mysqli_fetch_array($result);
		
		
		if(mysqli_num_rows($result) ==1){
		 
		   session_regenerate_id();
		   $row=mysqli_fetch_array($result);
		   $_SESSION["TEName"] = utf8_encode($row['OSPI_Test_Engineer']);
		   $_SESSION["TEOndex"] = $row['OndexID'];
		   $_SESSION["TEType"] = $row['UserType'];
		   session_write_close();
		   if ($_SESSION["TEName"] == 'Ian Soliven' || $_SESSION["TEName"] == 'Domingo Uclaray Jr'){

		   		echo 2; //admin user

		   }else if ($_SESSION["TEName"] == 'OJT') {
		   		
		   		echo 3;

		   }else if ($_SESSION["TEName"]=='Manny Mandac'){
		   		echo 4;
		   }
		   else echo 1;
		   
		}else{
			echo 0;
		}
	}
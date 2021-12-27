<?php

if(isset($_GET['ActionBtn']))
{
	if($_GET['ActionBtn']=='Save'){
		
		$head = "Location: ../CreateReport.php?Status=".$_GET['ActionBtn'];
		//header("$head");
		echo $_GET['WeeklyStatus_Update']. " is super Ganda at Sexy";
	
	}else{
		
		$head = "Location: ../CreateReport.php?Status=".$_GET['ActionBtn'];
		//header("$head");
		echo $_GET['WeeklyStatus_Update'] . " is super Ganda at Sexy";
	}
}

?>



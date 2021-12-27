<?php 
    session_start();
    require_once("../MyPhp/Manipulate.class.php");
	$manipulator = new Manipulate();
	require_once("../MyPhp/auth.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>DMSG WAR</title>
	<link href="../MyCss/MyCss.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../MyJs/MyJs.js"></script>
</head>
<body>
	<tr>  
	<div class="header"><table width="1084" align="left"><tr>
	<td width="1035">
	<p><h1>Welcome <?php $news = ", ".$_SESSION['SESS_POSITION'];
		echo $_SESSION['SESS_FIRSTNAME'] .", ".$_SESSION['SESS_LASTNAME'].$news ?>!
	</h1> 
	</td>
	</tr>
	</table>
	</p>
	<br />
	</div>
	<div class="divpart">
		HOME | <a href="CreateReport.php" onclick = "<?php $_SESSION['SESS_REPORTID'] = ''; $manipulator->ClearReportErrorSession(); $manipulator->ClearReportSession();?>">
		Weekly Status Update</a> | <a href="PreviewReport.php">
		Add Projects</a> |<a href="#userPart" onClick="MakeRequest('../MyForms/ChangePass.php','UserPartDiv')">
		Add Products</a>| <a href="../MyForms/LogOut.php">
		LOGOUT</a> </div>
		
		
	
</body>
<html>
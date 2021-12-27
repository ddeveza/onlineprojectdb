<?php
	//session_start();
    require_once('../MyPhp/report_top.php');
	require_once('../MyPhp/Manipulate.class.php');
	$manipulator = new Manipulate();
	require_once("../MyPhp/auth.php");	
	
	require_once('../MyPhp/config.php');
	
	$query = "SELECT Project_Name, Project_ID FROM Projects WHERE OSPI_TEST_ENGINEER ='".$_SESSION['SESS_FIRSTNAME']."';";
	$connect =mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
	$result = mysqli_query($connect,$query);
	//$row = mysqli_fetch_array($result);
	//echo $row['Project_Name'];
	//echo $query;
	//echo $_SESSION['SESS_FIRSTNAME'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Create WAR</title>
<link href="../MyCss/MyCss.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../MyJs/MyJs.js"></script>
<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	width:615px;
	height:555px;
	z-index:1;
	left: 41px;
	top: 220px;
}
-->
</style>
</head>
<body onload="CreateReportLoad()">
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
	</tr>


<div class="divpart"><a href="../User/User.php">HOME</a> | CREATE WAR |<a href="../MyForms/LogOut.php">LOGOUT</a></div>


<form name="SaveStatus" method="" action="../User/Action/ActionWeeklyStatus.php" >
<input type="submit" name="ActionBtn" value="Save" class="button">
<input type="submit" name="ActionBtn" value="Updated" class="button">
<textarea id="WeeklyStatus_Update" name="WeeklyStatus_Update" cols="10" rows="20"  ></textarea>

<select>
	<option value="All">All</option>
	<option value="Ongoing">Ongoing</option>
	<option value="Completed">Completed</option>
	<option value="Incoming">Incoming</option>
</select>
<select size="10" multiple onchange="showWW(this.value)">
	<?php while($row = mysqli_fetch_array($result)):;?>
	<option value="<?php echo $row['Project_ID'];?>"><?php echo $row['Project_ID'];?> </option>
	<?php endwhile;?>
</select>

<div id='testing'>Will show here</div>

</form>
<script>
function showWW(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("testing").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("testing").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "../Action/WorkWeek.php?q="+str, true);
  xhttp.send();
}
</script>

</body>
</html>

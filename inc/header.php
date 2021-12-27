<?php include '..\dmsg\config/config.php'; 

	session_start();
  //will check if logged in
  if(!$_SESSION['TEName']){
  	header('location: http://10.243.61.117:8080/dmsg/index.php');
  }
  $sql = "select * from quotes order by RAND() limit 1";
  $result = mysqli_query($con,$sql);
  //echo $result;
  $row = mysqli_fetch_assoc($result);
  $quote = $row['Quote'];
  $a = htmlentities($quote);
?>
<!DOCTYPE html>
<html>
<head>
	<title>DMSG</title>
	<link rel="stylesheet" type="text/css" href="../dmsg/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../dmsg/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../dmsg/css/style.css">
	<link rel="stylesheet" type="text/css" href="../dmsg/css/dataTables.min.css">
	<link rel="stylesheet" href="../dmsg/css/jquery-ui.css">
	<link rel="stylesheet" media="screen" href="../dmsg/css/main-clock.css"/>
	<link rel="stylesheet" type="text/css" href="../dmsg/css/select.bootstrap.min.css">

	

	<script src="../dmsg/js/google.jquery.js"></script>
	<script src="../dmsg/js/jquery-3.3.1.min.js"></script>
	<script src="../dmsg/js/jquery-1.12.4.js"></script>
	<script src="../dmsg/js/jquery-ui.js"></script>
	<script src="../dmsg/js/font-awesome.min.js"></script>
    <script src="../dmsg/js/bootstrap.min.js"></script>
   <script src="../dmsg/js/dataTables.min.js"></script>
	<script src="../dmsg/js/select.bootstrap.min.js"></script>
	
	<script src="../dmsg/ckeditor/ckeditor.js"></script>
	
    <script language="javascript" type="text/javascript" src="../dmsg/js/jquery.thooClock.js"></script> 
	
</head>
<body>
 <script type="text/javascript">
	 $(document).ready(function(){
		
      function logout() {
        document.location = "logout.php";
      }
        logoutbutton.addEventListener('click', logout, false);
	 });
</script>

<script type="text/javascript">
	 $(document).ready(function(){
	
	$("#report").click(function(){
			
				window.location = "createwar.php";
		});
		
		$("#AddProjects").click(function(){
			   
				window.location = "../dmsg/addupdateprojects.php";
		});
		
		$("#AddProducts").click(function(){
			
				window.location = "../dmsg/addupdateproducts.php";
		});


      $("#Tools").click(function(){
      
        window.location = "../nico/testing.php";
    });

    $("#AllProjectStatus").click(function(){
      
        window.location = "../dmsg/IansAllProjectStatusViewer.php";
    });
    $("#HWDB").click(function(){
      
        window.location = "../dmsg/hardware/Accordion.php";
    });

     $("#KPI").click(function(){
      
        window.location = "../dmsg/kpi/report.php";
    });

      $("#Viewer").click(function(){
      
        window.location = "../dmsg/weeklyupdateviewer.php";
    });
	 
	 
	 
		
	 });
</script>
	<style>
.btn {
    border: none;
    display: inline-block;
    padding: 8px 16px;
    vertical-align: middle;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    background-color: inherit;
    text-align: center;
    cursor: pointer;
    white-space: nowrap;
}
.topnav {
    position: relative;
    z-index: 10;
    font-size: 20px;
    background-color: #5f5f5f;
    color: #f1f1f1;
    width: 100%;
    padding: 5px;
    letter-spacing: 2px;
    font-family: "Segoe UI",Arial,sans-serif;
}
.tablehead {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  cursor: pointer;
  text-align: center;
}


.top {
  background-color: #666;
  padding: 10px;
  text-align: center;
  font-size: 20px;
  color: white;
  text-align: center;
  margin-block-start: 0em;
    margin-block-end: 0em;
}
.subhead {
   background-color: #A9A9A9;
  padding: 10px;
  text-align: left;
  font-size: 20px;
  color: white;
 
  margin-block-start: 0em;
    margin-block-end: 0em;
	margin-top: 0;
    margin-bottom: 0;
}
.btn {
    padding: 10px 18px;
    float: left;
    width: auto;
   // border: none;
    display: block;
    outline: 1;
	
}

</style>

<!-----Header on every page----START---->

<header class="top">
	<h1>Online Project-DB Report</h1>
</header>


<h2 class="subhead"><marquee scrollamount="8"  >Welcome, <?php echo $_SESSION["TEName"].'('.$_SESSION["TEOndex"].') : '.$quote; ?></marquee></h2>




<!-----Header on every page----END---->	



<!--------Header For Weeklystatus Update--->
<div id="DMSG-header">
	<table class="tablehead">
	  <tr  class="topnav">
		  <th id="report" class="btn">Weekly Status Report</th>
      <th id = "AddProjects" class="btn">Add/Update Projects</th>
      <th id = "AddProducts" class="btn">Add/Update Products</th>
      <th id = "HWDB" class="btn">HW DB</th>
      <th id="KPI" class="btn">KPI Chart</th>
      <th class="btn" id="logoutbutton">Logout</th>
	  </tr>
	</table>
</div>
<!--------Header For Weeklystatus Update END!!!---->
		
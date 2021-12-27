<?php include '..\dmsg\config/config.php'; 

	session_start();
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
	<script src="../dmsg/js/nicEdit.js"></script>
	<script src="../dmsg/ckeditor/ckeditor.js"></script>
	
    <script language="javascript" type="text/javascript" src="../dmsg/js/jquery.thooClock.js"></script> 
	
</head>

<style>
html, body {
    height: 100%;
}

html {
    display: table;
    margin: auto;
}

	body {
    display: table-cell;
    vertical-align: middle;
}
</style>
<body>
 <script type="text/javascript">
	 $(document).ready(function(){
		
      function logout() {
        document.location = "../logout.php";
      }
        logoutbutton.addEventListener('click', logout, false);
	 });
</script>
	
	<style>

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
  text-align: center;
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
<div class="container text-center">
	<h1 class="top">Online Project-DB Report</h1>
	
</div>



<!-----Header on every page----END---->	
		
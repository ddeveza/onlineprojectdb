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
	
	<script src="../dmsg/ckeditor/ckeditor.js"></script>
	
    <script language="javascript" type="text/javascript" src="../dmsg/js/jquery.thooClock.js"></script> 
	
</head>
<body>


<script>

</script>
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
			 //   alert("dennis");
				window.location = "../dmsg/addupdateprojects.php";
		});
		
		$("#AddProducts").click(function(){
			
				window.location = "../dmsg/addupdateproducts.php";
		});
		
		$("#Tools").click(function(){
			
				window.location = "../nico/testing.php";
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

<header class="top">
<img src="<?php 
              
              switch($_SESSION["TEOndex"]){
                case "zbghxr": 
                    echo"../dmsg/img/Dennis.jpeg";
                    break;
                case "ffxyfb": 
                    echo"../dmsg/img/Agot.jpeg";
                    break;
                case "ffxtwt": 
                    echo"../dmsg/img/Carl.jpeg";
                    break;
                case "ffxwdb": 
                    echo"../dmsg/img/Erick.jpeg";
                    break;
                case "ffyxxr": 
                    echo"../dmsg/img/Jeren.jpeg";
                    break;
                case "ffwxfy": 
                    echo"../dmsg/img/Joemz.jpeg";
                    break;
                case "ffx6nb": 
                    echo"../dmsg/img/JP.jpeg";
                    break;
                case "zbdnhg": 
                    echo"../dmsg/img/Nelson.jpeg";
                    break;
                case "fg73dw": 
                    echo"../dmsg/img/Raynard.jpeg";
                    break;
                case "ffjc3x": 
                    echo"../dmsg/img/Rex.jpeg";
                    break;
                case "ffx4bn": 
                    echo"../dmsg/img/Jong.jpeg";
                    break;
                default;
              }
          ?>"" 
alt="Image not Found" width="200" height="200">
<h1>DMSG Weekly Status Report</h1>
</header>


<marquee><h2 class="subhead">Welcome, <?php echo $_SESSION["TEName"]."(".$_SESSION["TEOndex"].")"; ?></h2></marquee>




<!-----Header on every page----END---->	




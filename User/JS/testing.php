<!DOCTYPE html>

<?php 
	session_start();
	define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'dmsg');
	
	
	//require_once("../MyPhp/auth.php");	
	//require_once('../MyPhp/config.php');
	
	$query = "SELECT Project_Name, Project_ID FROM Projects WHERE OSPI_TEST_ENGINEER ='Dennis Deveza' ORDER BY Project_Name ASC";
	$connect =mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
	$result = mysqli_query($connect,$query);

?>

<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
	
</head>
<style>
#projStatus {
  border : 5px solid black;
  border-collapse: collapse;
   padding: 5px;
   width: 10%;
  
 
}
#Project {border : 5px solid black;
  border-collapse: collapse;
   padding: 5px;
   width: 40%;
 
   }
th,td {
  padding: 5px;
}
</style>
<body>

<form action="">

<div class="container">

<select id="projStatus" >
	<option disabled selected>-Select-</option>
	<option value="All" required >All</option>
	<option value="Incoming">Incoming</option>
	<option value="Hold">Hold</option>
	<option value="Ongoing">Ongoing</option>
	<option value="Completed">Completed</option>
	
</select>

<div >
<div id="project1">
<select id="Project" name="dennis" multiple size=10 >
</select>
</div>

<div id="Year">
<select id="Year" >
	<option>--Select Year--</option>
</select>
</div>
<select id="WW" multiple size=15>
	<option>--Select WW--</option>
</select>

<button>New Status</button>
<button>Save</button>
<button>Update</button>

</div>
</form>



<script>
	$(document).ready(function(){
		
    $("select#projStatus").change(function(){
		
        var projselect = $(this).children("option:selected").val();
		$.ajax({
				type: 'post',
				url:'/MyPhp/ProjectStatus.php',
				data:{
					'projectstatus':projselect
					
				},
				
				success:function(data){
					//alert(data);
					$("div#project1").html(data);
						
				
				}
		});
		
		
       
    });
	
	
	
});
</script>
<script>
$("#ProjectList").addClass('ProjectList');
</script>



</body>
</html>

<script src="D:\xampp\htdocs\dmsg/js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="D:\xampp\htdocs\dmsg/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="D:\xampp\htdocs\dmsg/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="D:\xampp\htdocs\dmsg/css/select.bootstrap.min.css">

<script src="D:\xampp\htdocs\dmsg/js/jquery-1.12.4.js"></script>
<script src="D:\xampp\htdocs\dmsg/js/bootstrap.min.js"></script>

<?php
include 'D:\xampp\htdocs\dmsg\config/config.php'; //database setup	
session_start();
		
		//$row = mysqli_fetch_array($result);
		$status = $_POST['projstatus'];
	
		if($status != "All"){
			 
			$sql_query = "Select Project_Name,Project_ID, Project_Status FROM projects where (OSPI_TEST_ENGINEER ='".utf8_decode($_SESSION["TEName"])."' OR Support_TE='".$_SESSION["TEName"]."') AND Project_Status='".$status."' ORDER BY Project_Name ASC;";
			
			$result = mysqli_query($con,$sql_query);
			if(mysqli_num_rows($result)!=0){
			 
			 $output = "<select id='Project1' class='form-control selectpicker' style='width: 700px'>";
			 $output = $output."<option value='selectfirst' disabled>Select Project:</option>";
			while($row = mysqli_fetch_array($result)){
				
				$output = $output."<option value='".$row['Project_ID']."'>".$row['Project_Name']."</option>";
			}
	         $output .= "</select>";
			echo  $output;
		  }else {
			    $output = "<select id='Project1' class='form-control selectpicker' >";
			   $output = $output."<option value='selproj' disabled selected>No Projects Under This Status</option></select>";
			   
			echo $output;
			  }
		}else{
			 $sql_query = "Select Project_Name,Project_ID, Project_Status FROM projects where OSPI_TEST_ENGINEER ='".utf8_decode($_SESSION["TEName"])."' OR Support_TE='".$_SESSION["TEName"]."' ORDER BY Project_Status DESC, Project_ID DESC ;";
			$result = mysqli_query($con,$sql_query);
		  if(mysqli_num_rows($result)>0){
			 $output = "<select id='Project1' class='form-control selectpicker' style='width: 700px'>";
			 $output = $output."<option disabled>Select Project:</option>";
			while($row = mysqli_fetch_array($result)){
				
				$output = $output."<option value='".$row['Project_ID']."'>".$row['Project_Name']."----".$row['Project_Status']."</option>";
			}
			$output .= "</select>";
			echo $output;
			}
		}

?>


 <script src="../dmsg/js/dataTables.min.js"></script>
<script>
	$(document).ready(function(){
		
		 
			var id = $('select#Project1').children("option:selected").val();
			 
			if(id =='selproj'){
				$("#AddWarBtn").attr("disabled", true);
				$("#dennis").html("<h1 style='color:red; text-align:center;'>No Projects</h1>"); //no project list under status of this project
			}else if(id=='selectfirst'){
				$("#dennis").html("");
			}
			else{
			$.ajax({
				type: 'post',
				url:'/dmsg/MyPhp/year.php',
				data:{
					'id':id	
				},
				success:function(data){
					//alert("hello");
					//$('#dennis').reload();
					console.log(data);
					$('#dennis').load(location.href + ' #dennis',function(){ $("#emptable").dataTable({'order' :[0,'desc']});});
					$("#moda").load(location.href + " #moda");
					
					
					
					
				}
			});
			} 
		 	
		 
		 
		 
		  $("select#Project1").change(function(){
		  	$('#BusinessCase').remove();
			$("#AddWarBtn").attr("disabled", false); //enable button onchange of project
			var id = $(this).children("option:selected").val();
			
			if(id =='selproj'){

				$("#dennis").html("");
			}else{
			$.ajax({
				type: 'post',
				url:'/dmsg/MyPhp/year.php',
				data:{
					'id':id	
				},
				success:function(data){
					//alert("hello");
					
					
					$('#AddWAR').after("<div id='BusinessCase'><br><br><br><strong>Business Case: </strong>"+data+"</div>");
					
					$('#dennis').load(location.href +  ' #dennis',function(){ $("#emptable").dataTable({'order' :[0,'desc']});})
					
					$("#moda").load(location.href + " #moda");
					
					
				}
			});
			}
		 });	
		 
		 
		 
	 
		
	});
</script>









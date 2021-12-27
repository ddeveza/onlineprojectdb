
<?php 
	include_once 'config/config.php';

	require('../dmsg/inc/header.php');

?>






<!DOCTYPE html>
<html>
<head>
	<title>Viewer</title>
	<?php  include_once 'hardware/header/header.php'; ?>
</head>
<body>
	
<div style="padding: 40px">	
	<select id='engineer' class="mdb-select md-form">
		<option value="" disabled selected>Select Engineer</option>
	<?php 

			$EngineerSql = "SELECT * FROM testengineer where 
			OSPI_Test_Engineer != 'Brix Requina' AND
			OSPI_Test_Engineer != 'Gus Lim' AND
			OSPI_Test_Engineer != 'Ian Soliven' AND
			OSPI_Test_Engineer != 'Manny Mandac' AND
			OSPI_Test_Engineer != 'OJT'";

		$result = mysqli_query($con,$EngineerSql);
		while($row=mysqli_fetch_array($result)){

			$Engineer = $row['OSPI_Test_Engineer'];
			

		
	?>
	<option><?php echo $Engineer; ?></option>
		

	<?php } ?>
	
	</select>

	<select id='Projects' class="mdb-select md-form">
		<option value="" disabled selected>Select Projects</option>
	</select>


</div>
	<div id='dennis'>
		<!-- <table id="weeklytable">
			<thead>
				<tr>
					<td>ID</td>
					<td>Work Week</td>
					<td>Weekly Update</td>
				</tr>
			</thead>
			<tbody></tbody>
			<tfoot>
				<tr>
					<td>ID</td>
					<td>Work Week</td>
					<td>Weekly Update</td>
				</tr>
			</tfoot>
		</table> -->

	</div>

</body>
</html>


<script type="text/javascript">




	/*var datatable = $('#weeklytable').DataTable({
			"serverSide": true,
			"processing" : true,
			'ajax' : {
                "url" : "MyPhp/fetchprojectsweeklystatus.php",
                 "data": function ( d ) {
                		d.myKey = 108;
                // d.custom = $('#myInput').val();
                // etc
            }
                
               
                
          }

	});
				*/	


</script>

<script type="text/javascript">
	$(document).ready(function(){

		$('select#engineer').change(function(e){
			$('#dennis').hide();	
			$('select#Projects').empty();
			var engineer = $(this).children("option:selected").val();

			$.ajax({
				type:'post',
				url:'MyPhp/fetchprojects.php',
				data:{engineer:engineer},
				success:function(data){

					var data = JSON.parse(data);
					console.log(data);
					$('select#Projects').append('<option value="" disabled selected>Select Projects</option>');
					$.each(data,function(k,v){
						$('select#Projects').append('<option id="del" value="'+v.ID+'">'+v.ProjectName+'</option>');
						
					});


				}
			});
		})
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('select#Projects').change(function(){
			var ID = $(this).children("option:selected").val();
			//table.ajax.url( 'newData.json' ).load();

			

			$.ajax({
				type:'post',
				url:'MyPhp/fetchprojectsweeklystatus.php',
				data:{ID:ID},
				success:function(data){

					$('#dennis').show();
					$('#dennis').html(data,function(){


					});
					
			

				}
			});
		});

	});
</script>

<script type="text/javascript">
	
</script>

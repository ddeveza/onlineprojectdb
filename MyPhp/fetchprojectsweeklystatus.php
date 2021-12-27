<?php 

include '../config/config.php';

$ID = $_POST['ID'];

$fetchweeklystatus = "SELECT * FROM weeklystatus where Project_ID='$ID' order by ID DESC";

$result = mysqli_query($con, $fetchweeklystatus);
//$rows = array('data'=>array());
$fetchproj = "SELECT Project_Description FROM projects where Project_Status = 'Ongoing' AND Project_ID='$ID'";

$result1 = mysqli_query($con, $fetchproj); //businesscase 
$row1=mysqli_fetch_array($result1)
?>


<div >
	<h3><strong>Business Case: </strong></h3> <?php echo $row1['Project_Description'];?>
</div>
<br><br>
<table id="weeklytable" class="table table-bordered hover" widh='100%'>
			<thead>
				<tr>
					
					<td>ID</td>
					<td>Work Week</td>
					<td>Weekly Update</td>
					
				</tr>
			</thead>
			<tbody>
					
					<?php 

					while($row=mysqli_fetch_array($result)){

					$weeknumber = $row['Week_Number'] ."'".$row['project_year'];
					/*$rows['data'][]=array (

						$row['ID'],
						$weeknumber,
						$row["Detailed_Status_Update"]
						


					);*/

				?>

				<tr>
					<td><?php echo $row['ID']?></td>
					<td><?php echo $weeknumber;?></td>
					
					<td><?php echo $row['Detailed_Status_Update']?></td>

				</tr>






				
			<?php } ?>

			</tbody>
			<tfoot>
				<tr>
					
					<td>ID</td>
					<td>Work Week</td>
					<td>Weekly Update</td>
					
				</tr>
			</tfoot>
</table>




<script type="text/javascript">
	var table = $('#weeklytable').DataTable({
		 "order": [[ 0, 'desc' ]]
	});
</script>
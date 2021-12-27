<?php

include '../config/config.php';

$ID= mysqli_real_escape_string($con,$_POST['UniqueId']);


$sql = "Select * FROM weeklystatus where Project_ID='$ID' ORDER BY  project_year DESC , Week_Number DESC ;";
$result = mysqli_query($con,$sql);



?>
<style type="text/css">
	 tr,td {
		border: 1px solid black;
		padding: 5px;
		
    	
	}

</style>
	
<table id='weeklyUpdatesTable'>
		
		
			<tr>
				<th>WorkWeek</th>
				<th>Update</th>
			</tr>
		
		<tbody>
			<?php while($row=mysqli_fetch_array($result)){

					$WWYY = $row['Week_Number'].'Y'.$row['project_year'];
					$Update = $row['Detailed_Status_Update']; 
			?>
			<tr>
				<td><?php echo $WWYY; ?></td>
				<td><?php echo $Update; ?></td>
			</tr>

			<?php } ?>
		</tbody>

</table>






	








<?php



include 'D:\xampp\htdocs\dmsg\config\config.php';
session_start();

$unique = $_POST['Unique'];


$del_sql = "SELECT Project_Name FROM Projects where Project_ID='$unique';";

$result = mysqli_query($con,$del_sql);
If(mysqli_num_rows($result) == 1){
	$row = mysqli_fetch_array($result);
	
	
}
?>
<input type="hidden" class="del_unique" id="<?php echo $unique; ?>"></input>
<label><b><center><?php echo $row['Project_Name']; ?></center></b></label>


<?php



include 'D:\xampp\htdocs\dmsg\config\config.php';
session_start();

$ID = $_POST['ID'];


$del_sql = "SELECT Device_ID FROM Products where ID='$ID';";

$result = mysqli_query($con,$del_sql);
If(mysqli_num_rows($result) == 1){
	$row = mysqli_fetch_array($result);
	
	
}
?>
<input type="hidden" class="del_unique" id="<?php echo $ID; ?>"></input>
<label><b><center><?php echo $row['Device_ID']; ?></center></b></label>
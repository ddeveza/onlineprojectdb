<?php
	
	session_start();
	global $con;
	
	include 'D:\xampp\htdocs\dmsg\config\config.php';
	if(!$con){
	echo "Database connect error".mysqli_error($con);
	}
	
	$unique = $_POST['UniqueId'];
	

    $fetch = "select * from weeklystatus where id='".$unique."';";
    $result = mysqli_query($con,$fetch);

   if(mysqli_num_rows($result)>0){
	$row =mysqli_fetch_array($result);
	
	$ProjID=$row['Project_ID'];
	$WeekNumber=$row['Week_Number'];
	$year=$row['project_year'];
	$projDetail=$row['Detailed_Status_Update'];

}
$getproj_name = "Select Project_Name from projects where Project_ID='".$ProjID."';";
$result = mysqli_query($con,$getproj_name);
if(mysqli_num_rows($result)>0){
	$row =mysqli_fetch_array($result);
	$project_name = $row['Project_Name'];
	
}

	
?>
 
 
 <script src="../dmsg/ckeditor/ckeditor.js"></script>
 <input type="hidden" name="del_id" id="del_id" value="<?php echo $unique;?>">
 <div class="form-group"  >
						<input type="hidden" name="del_id" value="<?php echo $unique?>">
						<div class="form-control">
							<label><b>WorkWeek</b></label>
							<input   type="text" name="WWeek_edit" id="WWeek_edit" style="width:100px" value="<?php echo $WeekNumber;?>" readonly></input>
							
							<label><b>Year</b></label>
							<input  style="width:100px"  type="text" name="YearProj_edit" id="YearProj_edit" value="<?php echo $year?>" readonly></input>
							<label id="lblYearProj" style="color:red"></label>
						</div>
					</div>
				
					<div id="moda"> 
						<div class="form-group">
							
							<input type="text" name="ProjectID" id="ProjectID" hidden value="<?php echo $ProjID; ?>" readonly></input>
							
						</div>
						<div class="form-group">
							<label><b>Project Name</b></label>
							<input class="form-control" type="text" name="ProjName" id="ProjectName" value="<?php echo $project_name; ?> " readonly></input>
							<label id="lblYearProj" style="color:red"></label>
						</div>
					</div>
					
					<input type="text" name="Engineer" id="Engineer" hidden value="<?php echo $_SESSION['TEName']?>" readonly></input>
				
					<label><b>Detailed Project Status</b></label>
					<textarea class="ckeditor" id="area5" style="width:300px; height:100px;" readonly ><?php echo $projDetail;?></textarea>

			
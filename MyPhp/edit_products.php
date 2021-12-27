<?php

include 'D:\xampp\htdocs\dmsg\config\config.php';
session_start();
$ID= mysqli_real_escape_string($con,$_POST['ID']);

$sql = "SELECT * FROM Products WHERE ID='$ID';";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_array($result);
	$DeviceID = $row['Device_ID'];
	$Monicker = $row['Description'];
	$PTI2 = $row['PTI2'];
	$Customer = $row['Customer'];
	$DeviceOwner = $row['Device_Owner'];
	$ReleaseCode = $row['Release_Code'];
	$WSLocation = $row['WS_Location'];
	$FTLocation = $row['FT_Location'];
	$AssemblyLocation = $row['Assembly_Location'];
	$FABLocation = $row['FAB_Location'];
	$PrimaryTDE = $row['Primary_TDE'];
	$ProgramManager = $row['Program_Manager'];
}
?>


<input type="hidden" id="IDedit" value="<?php echo $ID;?>"></input>


<table class="table table-striped" >
					<tr>
					<td><label><b>DeviceID:</b><br></td>
					<td><input type="text" id="DeviceIDedit" style="text-transform:uppercase" readonly value="<?php echo $DeviceID; ?>"></input><td>
					<td><label><b>Monicker:</b><br></td>
					<td><input type="text" id="Monickeredit" value="<?php echo $Monicker; ?>"></input><td>
					</tr>
					<tr>
					<td><label><b>PTI2:</b><br></td>
					<td><input type="text" id="PTI2edit" style="text-transform:uppercase" value="<?php echo $PTI2; ?>"></input><td>
					<td><label><b>Customer:</b><br></td>
					<td><input type="text" id="Customeredit" value="<?php echo $Customer; ?>"></input><td>
					</tr>
					<tr>
					<td><label><b>Device Owner:</b><br></td>
					<td><input type="text" id="DeviceOwneredit" value="<?php echo $DeviceOwner; ?>"></input><td>
					<td><label><b>Release Code:</b><br></td>
					<td><input type="text" id="ReleaseCodeedit" style="text-transform:uppercase" value="<?php echo $ReleaseCode; ?>"></input><td>
					</tr>
					<tr>
					<td><label><b>WS Location:</b><br></td>
					<td><input type="text" id="WSLocationedit" style="text-transform:uppercase" value="<?php echo $WSLocation; ?>"></input><td>
					<td><label><b>FT Location:</b><br></td>
					<td><input type="text" id="FTLocationedit" style="text-transform:uppercase" value="<?php echo $FTLocation; ?>"></input><td>
					</tr>
					<tr>
					<td><label><b>Assembly Location:</b><br></td>
					<td><input type="text" id="AssemblyLocationedit" style="text-transform:uppercase" value="<?php echo $AssemblyLocation; ?>"></input><td>
					<td><label><b>FAB Location:</b><br></td>
					<td><input type="text" id="FABLocationedit" style="text-transform:uppercase" value="<?php echo $FABLocation; ?>"></input><td>
					</tr>
					<tr>
					<td><label><b>Primary TDE:</b><br></td>
					<td><input type="text" id="PrimaryTDEedit" value="<?php echo $PrimaryTDE; ?>"></input><td>
					<td><label><b>Program Manager:</b><br></td>
					<td><input type="text" id="ProgramManageredit" value="<?php echo $ProgramManager; ?>"></input><td>
					</tr>
				</table>
<?php

session_start();
	global $con;
	
	include 'D:\xampp\htdocs\dmsg\config\config.php';
	include '..\phpfunction\date.php';
	if(!$con){
	echo "Database connect error".mysqli_error($con);
	}
	
	$unique = $_POST['UniqueId'];
	$fetch = "select * from projects where project_id='".$unique."';";
    $result = mysqli_query($con,$fetch);
	if(mysqli_num_rows($result)>0){

			$row =mysqli_fetch_array($result);
			$projectName = $row['Project_Name'];
			$BusinessCase = $row['Project_Description'];
			$releaseMethod1 = $row['Release_Method'];
			$ProjectType1 = $row['Project_Type'];
			$TE1 = $row['OSPI_Test_Engineer'];
			$Sup_TE1 =$row['Support_TE'];
			$primTE= $row['Primary_Test_Engineer'];
			$deviceID1 =$row['Device_ID']; 
			$Status1 = $row['Project_Status'];
			$devtstartdate = $row['Development_Start_Date'];
			$devtcycletime = $row['Development_Cycle_Time'];
			$qualstartdate = $row['Qualification_Start_Date'];
			$qualcycletime = $row['Qualification_Cycle_Time'];
			$cabdate = $row['CAB_Date'];
			$ecosubmitteddate = $row['ECO_Submitted'];
			$ecosubmitcycletime = $row['ECO_Submit_Cycle_Time'];
			$ecoapproveddate= $row['ECO_Released'];
			$ecoapprovecycletime = $row['ECO_Approve_Cycle_Time'];
		    $priority = $row['Priority'];
			$tester = $row['tester'];
			$package= $row['package'];
			$OSPIPE=$row['OSPI_PE'];
			$cabnumber = $row['CAB_Number'];
			$cabapprovedate = $row['CAB_Approved_Date'];
			$cabapproved = $row['CAB_Approved'];
			$prpdate = $row['PRP_Date'];
			$handler = $row['handler'];
			$noofsites = $row['sites'];
	}


	



if ($prpdate=='0000-00-00' || $prpdate == Null) {
	

	$devtcycletime = dateDiffInDays($qualstartdate,date('Y-m-d')); //get the difference between today - qual start date
	$qualcycletime = 0; // 0 because no prp date yet so equal cycle time is increasing.

}elseif ($qualstartdate=='0000-00-00' || $qualstartdate  == NUll){
	
	$devtcycletime = 0; //get the difference between today - qual start date
	$qualcycletime = 0;
}
else {
	
	$devtcycletime = max (0, MinDate($prpdate,$cabapprovedate) - Day($qualstartdate) );

	$qualcycletime = max(0, Day($cabapprovedate) -  MaxDate($prpdate,$qualstartdate));
}






?>




<div id="updateproj">

    <input type="hidden" class="uniqueid" id="<?php echo $unique;?>"></input>

    <label><b>Project Name : </b></label><input type="text" id="projectnameedit" class="form-control"
        value="<?php echo $projectName;?>"></input> <br>
    <label><b>Business Case : </b><br>
        <textarea class="ckeditor" name="BusinessCase1"
            style="resize: none; width:500px; height:200px; border:solid 1px orange;"><?php echo 	$BusinessCase;?></textarea><br>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
                <th>
                    <tr>
                        <center>Project Details</center>
                    <tr>
                </th>
            </thead>
            <tr>
                <td><label><b>Release Method</b></label></td>
                <td><select id="ReleaseMethodedit" name="ReleaseMethodedit">
                        <option value="releasemethodempty" disabled>Selected Release Method</option>
                        <option value="RapidRelease" <?php if($releaseMethod1=='RapidRelease') echo 'selected';?>>Rapid
                            Release</option>
                        <option value="FullPartRelease" <?php if($releaseMethod1=='FullPartRelease') echo 'selected';?>>
                            Full Part Release</option>
                        <!-- <option value="MQUAL"  <?php if($releaseMethod1=='MQUAL') echo 'selected';?>>MQUAL</option>	 -->
                        <option value="N/A" <?php if($releaseMethod1=='N/A') echo 'selected';?>>Not Applicable</option>

                    </select></td>

                <td><label><b>Project Type</b></label></td>

                <?php
						$sql = "Select Project_Type FROM Projecttype ORDER BY Project_Type ASC";
						$result = mysqli_query($con,$sql);
						
						if(mysqli_num_rows($result)!=0){ 
							$output = "<td><select id='ProjectTypeedit' >";
							$output = $output."<option value='selectfirst' disabled selected>Select Project Type:</option>";
							while ($row=mysqli_fetch_array($result)){
							   if ($ProjectType1 == $row['Project_Type']){
							   $output = $output."<option value='".$row['Project_Type']."' selected>".$row['Project_Type']."</option>";
							   }else{
								    $output = $output."<option value='".$row['Project_Type']."' >".$row['Project_Type']."</option>";
							   }
							}
						}
						echo  $output."</select></td>";
					?>
            </tr>
            <tr>
                <td><label><b>OSPI TE :</b></label></td>
                <?php
						$sql = "Select OSPI_Test_Engineer FROM testengineer";
						$result = mysqli_query($con,$sql);
						
						if(mysqli_num_rows($result)!=0){
							$output = "<td><select id='OSPITEedit' >";
							$output = $output."<option value='selectfirst' disabled selected>Select OSPI TE:</option>";
							while ($row=mysqli_fetch_array($result)){
							if ($row['OSPI_Test_Engineer'] != 'Manny Mandac'){
							    if ($TE1 == $row['OSPI_Test_Engineer']){
									$output = $output."<option value='".utf8_encode($row['OSPI_Test_Engineer'])."' selected>".utf8_encode($row['OSPI_Test_Engineer'])."</option>";
								}else{
									$output = $output."<option value='".utf8_encode($row['OSPI_Test_Engineer'])."'>".utf8_encode($row['OSPI_Test_Engineer'])."</option>";
								}
							}
							}
						}    
						echo  $output."</select></td>";
					?>
                <td><label><b>OSPI Support TE :</b></label></td>
                <?php
						$sql = "Select OSPI_Test_Engineer FROM testengineer";
						$result = mysqli_query($con,$sql);
						
						if(mysqli_num_rows($result)!=0){
							
							$output = "<td><select id='OSPISUPTEedit' >";
							$output = $output."<option value='selectfirst' disabled selected>Select OSPI Support TE:</option>";
							while ($row=mysqli_fetch_array($result)){
								if ($row['OSPI_Test_Engineer'] != 'Manny Mandac'){
									 if ($Sup_TE1 == $row['OSPI_Test_Engineer']){
									$output = $output."<option value='".utf8_encode($row['OSPI_Test_Engineer'])."' selected>".utf8_encode($row['OSPI_Test_Engineer'])."</option>";
								}else{
									$output = $output."<option value='".utf8_encode($row['OSPI_Test_Engineer'])."'>".utf8_encode($row['OSPI_Test_Engineer'])."</option>";
								}
								
							}
							}
							if ($Sup_TE1==""){
							$output = $output."<option value='N/A' selected>N/A</option>";
							}else{
								$output = $output."<option value='N/A' >N/A</option>";
							}
						}
						echo  $output."</select><td>";
					?>
            </tr>
            <tr>
                <td> <label><b>Primary TE</b></td>
                <td>
    </label><input type="text" value="<?php echo $primTE; ?>" id="PrimaryTEedit"></input> </td>
    <td><label><b>Device ID</b></label></td>
    <?php
						$sql = "Select Device_ID FROM products Order By Device_ID";
						$result = mysqli_query($con,$sql);
						
						if(mysqli_num_rows($result)!=0){
							$output = "<td><select id='DeviceIDedit' >";
							$output = $output."<option value='selectfirst' disabled selected>Select Product:</option>";
							while ($row=mysqli_fetch_array($result)){
								if($deviceID1 ==$row['Device_ID']){
									$output = $output."<option value='".$row['Device_ID']."' selected>".$row['Device_ID']."</option>";
								}else{
									$output = $output."<option value='".$row['Device_ID']."' >".$row['Device_ID']."</option>";
								}
							}
							
						}
						echo  $output."</select><td>";
					?>
    </tr>
    <tr>
        <td><label><b>Project Status</b></label></td>
        <td><select id="ProjectStatusedit" name="statusproject1">
                <option value="SelectFirst" disabled>Selected Project Status</option>
                <option value="Ongoing" <?php if($Status1=='Ongoing') echo 'selected';?>>Ongoing</option>
                <option value="Incoming" <?php if($Status1=='Incoming') echo 'selected';?>>Incoming</option>
                <option value="Hold" <?php if($Status1=='Hold') echo 'selected';?>>On Hold</option>
                <option value="Canceled" <?php if($Status1=='Canceled') echo 'selected';?>>Canceled</option>
                <option value="Completed" <?php if($Status1=='Completed') echo 'selected';?>>Completed</option>
            </select></td>
        <td><label><b>Priority #</b></label></td>
        <td><input type="text" id="Priorityedit" value="<?php echo $priority; ?>"></input></td>
    </tr>

    <tr>
        <td><label><b>Tester</b></label></td>
        <td><input type="text" id="testeredit" value="<?php echo $tester; ?>"></input></td>
        <td><label><b>Package</b></label></td>
        <td><input type="text" id="Devicepackageedit" value="<?php echo $package; ?>"></input></td>
    </tr>


    <tr>
        <td><label><b>Handler/Prober</b></label></td>
        <td><input type="text" id="handleredit" value='<?php echo $handler; ?>'></td>

        <td><label><b>No of Sites</b></label></td>
        <td><input type="number" id="noofsitesedit" value='<?php echo $noofsites; ?>'></td>
    </tr>

    <tr>
        <td><label><b>OSPI PE</b></label></td>
        <td><input type="text" id="OSPI_PEedit" value="<?php echo $OSPIPE; ?>"></td>
    </tr>

    </table>


    <br>
    <br>

    <table table class="table table-striped">
        <thead>
            <tr>
                <center>Project Approve/Release Dates</center>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>PRP Date</td>
                <td><input type="date" id="prpdateedit" value="<?php echo $prpdate; ?>"></input></td>
            </tr>
            <tr>
                <td><label><b>Devt Start Date</b></label></td>
                <td><input id="devtstartdateedit" type="date" value="<?php echo $devtstartdate; ?>"></input> </td>
                <td><label><b>Qual Start Date</b></label></td>
                <td><input id="qualstartdateedit" type="date" value="<?php echo $qualstartdate; ?>"></input> </td>
            </tr>

            <tr>
                <td><label><b>CAB Date</b></label></td>
                <td><input id="cabdateedit" type="date" value="<?php echo $cabdate; ?>"></input> </td>

                <td><label><b>CAB Approved Date</b></label></td>
                <td><input type="date" id="cabapprovedateedit" value="<?php echo $cabapprovedate; ?>"></input> </td>



            </tr>


            <tr>
                <td><label><b>CAB Approved? </b></label></td>
                <td>
                    <select id='cabapprovededit'>
                        <option value=''>Select</option>
                        <option value='yes' <?php if($cabapproved=='yes'){ echo 'selected';}?>>Yes</option>
                        <option value='no' <?php if($cabapproved=='no'){ echo 'selected';}?>>No</option>
                    </select>
                </td>

                <td><label><b>ECO Submitted</b></label></td>
                <td><input id="ecosubmitteddateedit" type="date" value="<?php echo $ecosubmitteddate; ?>"></input></td>
            </tr>

            <tr>
                <td><label><b>ECO Released</b></label></td>
                <td><input id="ecoreleasedddateedit" type="date" value="<?php echo $ecoapproveddate; ?>"></input> </td>
                <td><label><b>CAB Number </b></label></td>
                <td><input type="text" id='cabnumberedit' value='<?php echo $cabnumber; ?>'></input> </td>
            </tr>




        </tbody>




    </table>


    <table table class="table table-striped">
        <thead>
            <tr>
                <center>Project Timeline</center>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><label><b>Devt Cycle Time</b></label></td>
                <td><input type="text" class="cycletime" value="<?php echo$devtcycletime; ?>" readonly></input> </td>
                <td><label><b>Qual Cycle Time</b></label></td>
                <td><input type="text" class="cycletime" value="<?php echo$qualcycletime; ?>" readonly></input> </td>
            </tr>

            <tr>
                <td><label><b>ECO Submit Cycle Time</b></label></td>
                <td><input type="text" class="cycletime" value="<?php echo$ecosubmitcycletime; ?>" readonly></input>
                </td>
                <td><label><b>ECO Approve Cycle Time</b></label></td>
                <td><input type="text" class="cycletime" value="<?php echo$ecoapprovecycletime; ?>" readonly></input>
                </td>
            </tr>

            <tr>
                <td><label><b>Post Release Cycle Tim</b></label></td>
                <td><input type="text" class="cycletime"></input> </td>
                <td><label><b>Overall Cycle Time </b></label></td>
                <td><input type="text" class="cycletime"></input> </td>
            </tr>
        </tbody>
    </table>


</div>
<script>
CKEDITOR.replace('BusinessCase1', CKEDITOR.editorConfig);
/*disable because causing error in iansprojectviewer*/
/*$('.date').datepicker({
	changeMonth: true,
		changeYear: true
});*/
</script>
</script>
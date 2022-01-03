<?php
	require('../dmsg/inc/header.php');
	
?>
<link rel="stylesheet" type="text/css" href="../dmsg/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../dmsg/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../dmsg/css/select.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">






<br>
<br>

<div id="container">

    <style type="text/css">
    #project {
        margin: 10px;
        position: absolute;
        left: 19%;
    }

    @media screen and (min-width: 768px) {
        .modal-dialog {
            width: 700px;
            /* New width for default modal */
        }

        .modal-sm {
            width: 350px;
            /* New width for small modal */
        }
    }

    @media screen and (min-width: 992px) {
        .modal-lg {
            width: 800px;
            /* New width for large modal */
        }
    }
    </style>





    <button type="button" class="btn btn-primary btn-lg project" style="padding-top: 1px; padding-right: 1px; padding-bottom: 1px; width: 200px; height: 50px; padding-left: 1px; font-size:15px;
	position:relative;
    top:50%; 
    left:40%;"> Add New Projects</button>



    <!----Create New Status Moda---->
    <div class="modal fade" id="project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-lg" role="document">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Projects</h4>
                    </div>
                    <div class="modal-body" id="projectdetails">

                        <label><b>Project Name : </b><br>
                            <input type="text" id="projectname" size="70"></input>
                            <label><b>Business Case : </b><br>
                                <textarea name="BusinessCase"
                                    style="resize: none; width:500px; height:200px; border:solid 1px orange;"></textarea><br>
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
                                        <td><select id="ReleaseMethod" name="statusproject1">
                                                <option value="releasemethodempty" disabled selected>Selected Release
                                                    Method</option>
                                                <option value="RapidRelease">Rapid Release</option>
                                                <option value="FullPartRelease">Full Part Release</option>
                                                <!-- <option value="MQUAL">MQUAL</option> -->
                                                <option value="N/A">Not Applicable</option>
                                            </select></td>

                                        <td><label><b>Project Type</b></label></td>

                                        <?php
						$sql = "Select Project_Type FROM Projecttype ORDER BY Project_Type ASC";
						$result = mysqli_query($con,$sql);
						
						if(mysqli_num_rows($result)!=0){
							$output = "<td><select id='ProjectType' >";
							$output = $output."<option value='projecttypeempty' disabled selected>Select Project Type:</option>";
							while ($row=mysqli_fetch_array($result)){
							$output = $output."<option value='".$row['Project_Type']."'>".$row['Project_Type']."</option>";
							}
						}
						echo  $output."</select></td>";
					?>
                                    </tr>
                                    <tr>
                                        <td><label><b>OSPI TE :</b></label></td>
                                        <td><input type="text" value="<?php echo $_SESSION['TEName']; ?>" id="OSPITE"
                                                readonly></input> </td>
                                        <?php
					/* 	$sql = "Select OSPI_Test_Engineer FROM testengineer";
						$result = mysqli_query($con,$sql);
						
						if(mysqli_num_rows($result)!=0){
							$output = "<td><select id='OSPITE' >";
							$output = $output."<option value='selectfirst' disabled selected>Select OSPI TE:</option>";
							while ($row=mysqli_fetch_array($result)){
							if ($row['OSPI_Test_Engineer'] != 'Manny Mandac'){
							   $output = $output."<option value='".$row['OSPI_Test_Engineer']."'>".$row['OSPI_Test_Engineer']."</option>";
							}
							}
						}    
						echo  $output."</select></td>"; */
					?>
                                        <td><label><b>OSPI Support TE :</b></label></td>
                                        <?php
						$sql = "Select OSPI_Test_Engineer FROM testengineer";
						$result = mysqli_query($con,$sql);
						
						if(mysqli_num_rows($result)!=0){
							
							$output = "<td><select id='OSPISUPTE' >";
							$output = $output."<option value='N/A' disabled selected>Select OSPI Support TE:</option>";
							while ($row=mysqli_fetch_array($result)){
								if ($row['OSPI_Test_Engineer'] != 'Manny Mandac' or $row['OSPI_Test_Engineer'] != 'OJT'){
									$output = $output."<option value='".utf8_encode($row['OSPI_Test_Engineer'])."'>".utf8_encode($row['OSPI_Test_Engineer'])."</option>";
								}
							}
							$output = $output."<option value='N/A' >N/A</option>";
						}
						echo  $output."</select><td>";
					?>
                                    </tr>
                                    <tr>
                                        <td> <label><b>Primary TE</b></label></td>
                                        <td><input type="text" id="PrimaryTE"></input> </td>
                                        <td><label><b>Device ID</b></label></td>
                                        <?php
						$sql = "Select Device_ID FROM products Order By Device_ID";
						$result = mysqli_query($con,$sql);
						
						if(mysqli_num_rows($result)!=0){
							$output = "<td><select id='DeviceID' >";
							$output = $output."<option value='deviceidempty' disabled selected>Select Product:</option>";
							while ($row=mysqli_fetch_array($result)){
							$output = $output."<option value='".$row['Device_ID']."'>".$row['Device_ID']."</option>";
							}
							$output = $output."<option value='AddProducts' >AddNewProduct</option>";
						}
						echo  $output."</select><td>";
					?>
                                    </tr>
                                    <tr>
                                        <td><label><b>Project Status</b></label></td>
                                        <td><select id="ProjectStatus" name="statusproject1">
                                                <option value="projectstatusempty" disabled selected>Selected Project
                                                    Status</option>
                                                <option value="Ongoing">Ongoing</option>
                                                <option value="Incoming">Incoming</option>
                                                <option value="Hold">On Hold</option>
                                                <option value="Canceled">Canceled</option>
                                                <option value="Completed">Completed</option>
                                            </select></td>
                                        <td><label><b>Priority #</b></label></td>
                                        <td><input type="text" id="Priority"></input></td>
                                    </tr>
                                    <tr>
                                        <td><label><b>Tester</b></label></td>
                                        <td>
                                            <input type="text" id="tester" style="text-transform:uppercase"
                                                list='testerlist'></input>
                                            <datalist id="testerlist">
                                                <?php 
									$sqltester = 'SELECT DISTINCT tester from projects ORDER BY tester ASC';

									$resulttester = mysqli_query($con,$sqltester); 

									while($row=mysqli_fetch_array($resulttester)){

									$tester = strtoupper($row['tester']);

								?>
                                                <option value='<?php echo $tester; ?>'>

                                                    <?php } ?>
                                            </datalist>

                                        </td>
                                        <td><label><b>Package</b></label></td>
                                        <td><input type="text" id="Devicepackage" style="text-transform:uppercase"
                                                list="Devicepackagelist"></input>
                                            <datalist id="Devicepackagelist">
                                                <?php 
										$sqlpackagetype = 'SELECT DISTINCT package from projects ORDER BY package ASC';

										$resultpackagetype = mysqli_query($con,$sqlpackagetype); 

										while($row=mysqli_fetch_array($resultpackagetype)){

										$packagetype = strtoupper($row['package']);

									?>
                                                <option value='<?php echo $packagetype; ?>'>

                                                    <?php } ?>
                                            </datalist>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td><label><b>Handler/Prober</b></label></td>
                                        <td><input type="text" id="handler" style="text-transform:uppercase"
                                                list='handlerlist'>
                                            <datalist id="handlerlist">
                                                <?php 
										$sqlhandler = 'SELECT DISTINCT handler from projects ORDER BY handler ASC';

										$resulthandler = mysqli_query($con,$sqlhandler); 

										while($row=mysqli_fetch_array($resulthandler)){

										$handler = strtoupper($row['handler']);

									?>
                                                <option value='<?php echo $handler; ?>'>

                                                    <?php } ?>
                                            </datalist>



                                        </td>

                                        <td><label><b>No of Sites</b></label></td>
                                        <td><input type="number" id="noofsites"></td>
                                    </tr>

                                    <tr>
                                        <td><label><b>OSPI PE</b></label></td>
                                        <td id='dennis'><input type="text" id="OSPI_PE"></td>
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
                                            <td><input type="date" id="prpdate"></input></td>
                                        </tr>
                                        <tr>
                                            <td><label><b>Devt Start Date</b></label></td>
                                            <td><input type="date" id="devtstartdate"></input> </td>
                                            <td><label><b>Qual Start Date</b></label></td>
                                            <td><input type="date" id="qualstartdate"></input> </td>
                                        </tr>

                                        <tr>
                                            <td><label><b>CAB Date</b></label></td>
                                            <td><input type="date" id="cabdate"></input> </td>

                                            <td><label><b>CAB Approved Date</b></label></td>
                                            <td><input type="date" id="cabapprovedate"></input> </td>


                                        </tr>
                                        <tr>
                                            <td><label><b>CAB Approved? </b></label></td>
                                            <td>
                                                <select id='cabapproved'>
                                                    <option value=''>Select</option>
                                                    <option value='yes'>Yes</option>
                                                    <option value='no'>No</option>
                                                </select>
                                            </td>



                                            <td><label><b>CAB Number </b></label></td>
                                            <td><input type="text" id="cabnumber"></input> </td>
                                        </tr>

                                        <tr>
                                            <td><label><b>ECO Submitted</b></label></td>
                                            <td><input type="date" id="ecosubmitteddate"></input></td>
                                            <td><label><b>ECO Released</b></label></td>
                                            <td><input type="date" id="ecoreleasedddate"></input> </td>

                                        </tr>




                                    </tbody>




                                </table>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                        <button type="button" class="btn btn-primary addproj" id="save" data-toggle="modal"> Save
                            Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- The EDIT Modal -->
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" method="post" id="updateForm">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Project DashBoard</h4>

                    </div>
                    <!-- Modal body -->
                    <div class="modal-body" id="editprojectdetails">

                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning update" id="<?php echo $ProjectID ;?>">
                            Update</button>
                    </div>
                    <form>
            </div>
        </div>
    </div>




    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" method="post" id="updateForm">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Do you want to delete this project?</h4>

                    </div>
                    <!-- Modal body -->
                    <div class="modal-body" id="deletedetails">

                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger delete" id="<?php echo $ProjectID ;?>">
                            Delete</button>
                    </div>
                    <form>
            </div>
        </div>
    </div>




    <br>
    <br>
    <div id="projectlist">
        <table id="tableAddproj" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Project ID</th>
                    <th>Device ID</th>
                    <th>Project Name</th>
                    <th>Business Case</th>
                    <th>OSPI Project Owner</th>
                    <th>Project Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="timeline">
                <?php
			$TE_Name = utf8_decode($_SESSION["TEName"]);
			
			if($TE_Name != ""){
				$sql ="SELECT * FROM projects WHERE OSPI_Test_Engineer='$TE_Name' or Support_TE ='$TE_Name' ORDER BY Project_ID DESC;";
				$result = mysqli_query($con,$sql);
				while($row=mysqli_fetch_array($result)){
				 
				  $ProjectID=$row['Project_ID'];
				  $DeviceID=$row["Device_ID"];
				  $ProjectName =$row["Project_Name"];
				  $BusinessCase=$row["Project_Description"];
				  $ProjectStatus=$row["Project_Status"];
				  $OSPI_TE = $row["OSPI_Test_Engineer"];
			?>

                <tr>
                    <td><?php echo $ProjectID; ?></td>
                    <td><?php echo $DeviceID; ?></td>
                    <td><?php echo $ProjectName; ?></td>
                    <td><?php echo $BusinessCase; ?></td>
                    <td><?php echo utf8_encode($OSPI_TE ); ?></td>
                    <td><?php echo $ProjectStatus; ?></td>
                    <td> <button type="button" class="btn btn-warning btn-xs edit_data"
                            id="<?php echo $ProjectID ;?>"><i class="glyphicon glyphicon-pencil"></i> update</button>
                        <button type="button" class="btn btn-danger btn-xs del" id="<?php echo $ProjectID ;?>"><i
                                class="glyphicon glyphicon-trash"></i>delete</button>
                    </td>
                </tr>
                <?php }}?>
            </tbody>

        </table>


    </div>

</div>



<?php
	require('../dmsg/inc/footer.php');
	
?>



<script>
$("#tableAddproj").dataTable({

    ordering: true,
    "order": [
        [0, 'desc']
    ]

});
</script>
<script>
$(document).on('click', '.project', function() {
    //$('#ReleaseMethod').val('RapidRelease').attr('selected',true);
    $('#project').modal('show');
});
</script>

<script>
$('.cycletime').attr("readonly", true);
// Turn off automatic editor creation first.
CKEDITOR.disableAutoInline = false;

CKEDITOR.replace("BusinessCase", {
    height: 100,


});
</script>
<script>
$('.date').datepicker({
    changeMonth: true,
    changeYear: true
});
</script>
<script>
//Update Project status
$(document).on('click', '.edit_data', function() {
    var Unique = $(this).attr('id');

    $.ajax({
        type: 'post',
        url: '/dmsg/MyPhp/project_ds_edit.php',
        data: {
            'UniqueId': Unique
        },
        async: false,
        success: function(data) {
            $("#editprojectdetails").html(data, function() {

            });

            $("#EditModal").modal('show');
        }
    });

}); //end of modal in edit data button

$(document).on('click', '.update', function() {
    //get value from select
    var Unique = $('.uniqueid').attr('id');
    var ProjName = $('#projectnameedit').val();
    var businesscase = CKEDITOR.instances.BusinessCase1.getData();
    var projtype = $('select#ProjectTypeedit').children("option:selected").val();
    var OSPITE = $('#OSPITEedit').val();
    var OSPISUPTE = $('select#OSPISUPTEedit').children("option:selected").val();
    var DeviceID = $('select#DeviceIDedit').children("option:selected").val();
    var ReleaseMethod = $('select#ReleaseMethodedit').children("option:selected").val();
    var ProjectStatus = $('select#ProjectStatusedit').children("option:selected").val();
    var OSPIPE = $('#OSPI_PEedit').val();

    //get value from input text box
    var tester = $('#testeredit').val();
    var Devicepackage = $('#Devicepackageedit').val();
    var PrimaryTE = $('#PrimaryTEedit').val();
    var Priority = $('#Priorityedit').val();
    var prpdate = $('#prpdateedit').val();

    var handler = $('#handleredit').val();
    var noofsites = $('#noofsitesedit').val();
    /*alert(handler);
    alert(noofsites);*/
    //get date value from datepicker
    var devtstartdate = $('#devtstartdateedit').val();
    //var devtstartdate = $('#devtstartdate').datepicker('getDate');
    var qualstartdate = $('#qualstartdateedit').val();
    var cabdate = $('#cabdateedit').val();
    var cabapprovedate = $('#cabapprovedateedit').val();
    var cabapproved = $('select#cabapprovededit').children("option:selected").val();
    var cabnumber = $('#cabnumberedit').val();
    var ecosubmitteddate = $('#ecosubmitteddateedit').val();
    var ecoreleasedddate = $('#ecoreleasedddateedit').val();





    if (tester == "") {
        alert("Please Enter Tester item!");
    } else if (businesscase == "") {
        alert('Please enter your project business case!');
    } else if (Devicepackage == "") {
        alert("Please Enter Device Package! item!");
    } else if (projtype == "projecttypeempty") {
        alert("Please Select Project Type! ");
    } else if (DeviceID == "deviceidempty") {
        alert("Please Select Device ID! ");
    } else if (ReleaseMethod == "releasemethodempty") {
        alert("Please Select Release Method or Select Not Applicable!");
    } else if (ProjectStatus == "projectstatusempty") {
        alert("Please Select Project Status!");
    } else {
        if (ProjectStatus == "Completed" && (projtype == 'FT NPI' || projtype == 'WS NPI')) {
            if (prpdate == "" || qualstartdate == "" || cabapprovedate == "" || cabdate == "" ||
                ecosubmitteddate == "" || ecoreleasedddate == "") {
                alert("Please complete dates prior project Completion!");
            } else {
                $.ajax({
                    type: 'post',
                    url: '/dmsg/MyPhp/project_ds_update.php',
                    data: {
                        noofsites: noofsites,
                        handler: handler,
                        prpdate: prpdate,
                        cabnumber: cabnumber,
                        cabapprovedate: cabapprovedate,
                        cabapproved: cabapproved,
                        OSPIPE: OSPIPE,
                        ProjName: ProjName,
                        Unique: Unique,

                        businesscase: businesscase,
                        projtype: projtype,
                        OSPITE: OSPITE,
                        OSPISUPTE: OSPISUPTE,
                        DeviceID: DeviceID,
                        ReleaseMethod: ReleaseMethod,
                        ProjectStatus: ProjectStatus,


                        tester: tester,
                        Devicepackage: Devicepackage,
                        PrimaryTE: PrimaryTE,
                        Priority: Priority,

                        devtstartdate: devtstartdate,
                        qualstartdate: qualstartdate,
                        cabdate: cabdate,
                        ecosubmitteddate: ecosubmitteddate,
                        ecoreleasedddate: ecoreleasedddate





                    },
                    success: function(data) {
                        //alert(data);
                        if (data == 1) {

                            alert('Project has been successfully updated');


                            $("#projectlist").load(location.href + " #projectlist", function() {
                                $("#tableAddproj").dataTable({
                                    "order": [
                                        [0, 'desc']
                                    ]
                                });

                            });
                            $('#EditModal').modal('hide');


                        } else {

                            console.log('Error');
                        }


                    }
                });
            }
        } else {
            //alert(OSPITE);
            $.ajax({
                type: 'post',
                url: '/dmsg/MyPhp/project_ds_update.php',
                data: {
                    noofsites: noofsites,
                    handler: handler,
                    prpdate: prpdate,
                    cabnumber: cabnumber,
                    cabapprovedate: cabapprovedate,
                    cabapproved: cabapproved,
                    OSPIPE: OSPIPE,
                    ProjName: ProjName,
                    Unique: Unique,

                    businesscase: businesscase,
                    projtype: projtype,
                    OSPITE: OSPITE,
                    OSPISUPTE: OSPISUPTE,
                    DeviceID: DeviceID,
                    ReleaseMethod: ReleaseMethod,
                    ProjectStatus: ProjectStatus,


                    tester: tester,
                    Devicepackage: Devicepackage,
                    PrimaryTE: PrimaryTE,
                    Priority: Priority,

                    devtstartdate: devtstartdate,
                    qualstartdate: qualstartdate,
                    cabdate: cabdate,
                    ecosubmitteddate: ecosubmitteddate,
                    ecoreleasedddate: ecoreleasedddate





                },
                success: function(data) {
                    if (data == 1) {

                        alert('Project has been successfully updated');


                        $("#projectlist").load(location.href + " #projectlist", function() {
                            $("#tableAddproj").dataTable({
                                "order": [
                                    [0, 'desc']
                                ]
                            });

                        });
                        $('#EditModal').modal('hide');


                    } else {

                        console.log('Error');
                    }

                }
            });
        }
    }

}); //end of saving updated projects

$(document).on('click', '.del', function() {

    var Unique = $(this).attr('id');


    $.ajax({
        type: 'post',
        url: '/dmsg/MyPhp/project_ds_del_confirm.php',
        data: {
            Unique: Unique
        },
        success: function(data) {
            $('#deletedetails').html(data);
            $('#DelModal').modal('show');
        }
    });

}); //end of updating weekly status


$(document).on('click', '.delete', function() {

    var Unique = $('.del_unique').attr('id');


    $.ajax({
        type: 'post',
        url: '/dmsg/MyPhp/project_ds_del.php',
        data: {
            'unique': Unique
        },
        success: function(data) {

            alert('Successfully Deleted');
            location.reload();
        }
    });

});
</script>


<!--------Adding projects---->
<script>
$(document).ready(function() {
    /*$("select#ReleaseMethod").change(function(){
		var ReleaseMethod=$('select#ReleaseMethod').children("option:selected").val();
		$("#projectname").val(ReleaseMethod);
		$("select#ProjectType").change(function(){
			var projtype=$('select#ProjectType').children("option:selected").val();
    	//alert('testing');
				$("#projectname").val(ReleaseMethod + '-' + projtype );
    
        
		});
	});*/




    /* var Devicepackage =$('#Devicepackage').val();
    var tester = $('#tester').val();
    $("select#DeviceID").change(function(){
    	 var DeviceID=$('select#DeviceID').children("option:selected").val();
    	 $("#projectname").val(DeviceID);
    	 $("select#ReleaseMethod").change(function(){
    		 var ReleaseMethod=$('select#ReleaseMethod').children("option:selected").val();
    		 $("#projectname").val(DeviceID + "-" + ReleaseMethod );
    		 $("select#ProjectType").change(function(){
    			 var projtype=$('select#ProjectType').children("option:selected").val();
    			 $("#projectname").val(DeviceID + "-" + ReleaseMethod +"-" +projtype );
    		 });
    	 });
    	
    }); */

    /* var ReleaseMethod = "";
    var projtype = "";
    var DeviceID = "";
    var tester = "";
     */

    $("select#ReleaseMethod").change(function() {

        var ReleaseMethod = $('select#ReleaseMethod').children("option:selected").val();
        var projtype = $('select#ProjectType').children("option:selected").val();
        var DeviceID = $('select#DeviceID').children("option:selected").val();
        var tester = $('#tester').val();
        var Devicepackage = $('#Devicepackage').val();
        if (ReleaseMethod == 'N/A') {
            //var Devicepackage =$('#Devicepackage').val();
            $("#projectname").val(DeviceID + " (" + Devicepackage + " " + tester + ") " + " - " + " " +
                projtype);
        } else {
            $("#projectname").val(DeviceID + " (" + Devicepackage + " " + tester + ") " + " - " +
                ReleaseMethod + " " + projtype);
        }

        if (ReleaseMethod == 'RapidRelease') {

            $('<td id="rapid"><label><b>Rapid Release Type of Change:</b></label></td><td  id="rapid"><textarea id="RapidValue"></textarea></td>')
                .insertAfter('#dennis');
        } else {
            $('#rapid').remove();
            $('#rapid').remove();
        }

    });


    $("select#ProjectType").change(function() {
        var ReleaseMethod = $('select#ReleaseMethod').children("option:selected").val();
        var projtype = $('select#ProjectType').children("option:selected").val();
        var DeviceID = $('select#DeviceID').children("option:selected").val();
        var tester = $('#tester').val();
        var Devicepackage = $('#Devicepackage').val();

        if (ReleaseMethod == 'N/A') {
            //var Devicepackage =$('#Devicepackage').val();
            $("#projectname").val(DeviceID + " (" + Devicepackage + " " + tester + ") " + " - " + " " +
                projtype);
        } else {
            $("#projectname").val(DeviceID + " (" + Devicepackage + " " + tester + ") " + " - " +
                ReleaseMethod + " " + projtype);
        }
        //var Devicepackage =$('#Devicepackage').val();

        //$("#projectname").val(DeviceID+" ("+Devicepackage+" "+tester+") "+" - "+ ReleaseMethod +" " +projtype );
    });
    $("select#DeviceID").change(function() {
        var ReleaseMethod = $('select#ReleaseMethod').children("option:selected").val();
        var projtype = $('select#ProjectType').children("option:selected").val();
        var DeviceID = $('select#DeviceID').children("option:selected").val();
        var tester = $('#tester').val();
        var Devicepackage = $('#Devicepackage').val();

        if (ReleaseMethod == 'N/A') {
            //var Devicepackage =$('#Devicepackage').val();
            $("#projectname").val(DeviceID + " (" + Devicepackage + " " + tester + ") " + " - " + " " +
                projtype);
        } else {
            $("#projectname").val(DeviceID + " (" + Devicepackage + " " + tester + ") " + " - " +
                ReleaseMethod + " " + projtype);
        }
        //var Devicepackage =$('#Devicepackage').val();

        //$("#projectname").val(DeviceID+" ("+Devicepackage+" "+tester+") "+" - "+ ReleaseMethod +" " +projtype );
    });
    $("#tester").on('keyup', function() {
        var ReleaseMethod = $('select#ReleaseMethod').children("option:selected").val();
        var projtype = $('select#ProjectType').children("option:selected").val();
        var DeviceID = $('select#DeviceID').children("option:selected").val();
        var tester = $('#tester').val();
        var Devicepackage = $('#Devicepackage').val();

        if (ReleaseMethod == 'N/A') {
            //var Devicepackage =$('#Devicepackage').val();
            $("#projectname").val(DeviceID + " (" + Devicepackage + " " + tester + ") " + " - " + " " +
                projtype);
        } else {
            $("#projectname").val(DeviceID + " (" + Devicepackage + " " + tester + ") " + " - " +
                ReleaseMethod + " " + projtype);
        }
        //var Devicepackage =$('#Devicepackage').val();

        //$("#projectname").val(DeviceID+" ("+Devicepackage+" "+tester+") "+" - "+ ReleaseMethod +" " +projtype );
    });
    $("#Devicepackage").on('keyup', function() {
        var ReleaseMethod = $('select#ReleaseMethod').children("option:selected").val();
        var projtype = $('select#ProjectType').children("option:selected").val();
        var DeviceID = $('select#DeviceID').children("option:selected").val();
        var tester = $('#tester').val();
        var Devicepackage = $('#Devicepackage').val();

        if (ReleaseMethod == 'N/A') {
            //var Devicepackage =$('#Devicepackage').val();
            $("#projectname").val(DeviceID + " (" + Devicepackage + " " + tester + ") " + " - " + " " +
                projtype);
        } else {
            $("#projectname").val(DeviceID + " (" + Devicepackage + " " + tester + ") " + " - " +
                ReleaseMethod + " " + projtype);
        }
        //var Devicepackage =$('#Devicepackage').val();

        //$("#projectname").val(DeviceID+" ("+Devicepackage+" "+tester+") "+" - "+ ReleaseMethod +" " +projtype );
    });


    /* if (tester == "" ){alert("Please Enter Tester item!");}
    	else if (businesscase ==""){alert('Please enter your project business case!');}
    	else if (Devicepackage==""){ alert("Please Enter Device Package! item!");}
    	else if (projtype =="projecttypeempty"){alert("Please Select Project Type! ");}
    	else if (DeviceID =="deviceidempty"){alert("Please Select Device ID! ");}
    	else if (ReleaseMethod=="releasemethodempty"){alert("Please Select Release Method or Select Not Applicable!");}
    	else if (ProjectStatus=="projectstatusempty"){alert("Please Select Project Status!");}	 */

    $("#projectname").attr("readonly", true);

    $('#projectname').on('click', function() {

        var ReleaseMethod = $('select#ReleaseMethod').children("option:selected").val();
        var projtype = $('select#ProjectType').children("option:selected").val();
        var DeviceID = $('select#DeviceID').children("option:selected").val();
        var tester = $('#tester').val();
        var Devicepackage = $('#Devicepackage').val();
        //alert(ReleaseMethod);	

        if (ReleaseMethod == "releasemethodempty") {
            alert("Please Select Release Method Before Edit!");
        } else if (projtype == "projecttypeempty") {
            alert("Please Enter Project Type Before Edit!");
        } else if (DeviceID == "deviceidempty") {
            alert("Please Select Device ID Before Edit! ");
        } else if (tester == "") {
            alert("Please Input tester Before Edit! ");
        } else if (Devicepackage == "") {
            alert("Please Input Device Package Before Edit");
        } else {
            $("#projectname").attr("readonly", false);
        }
    });

    /* If ((ReleaseMethod =="")){
     
    }else {$("#projectname").attr("disabled",false);} */

});

$(document).ready(function() {


    $('.addproj').on('click', function(event) {

        //get value from select
        var businesscase = CKEDITOR.instances.BusinessCase.getData();
        var projtype = $('select#ProjectType').children("option:selected").val();
        var OSPITE = $('#OSPITE').val();
        var OSPISUPTE = $('select#OSPISUPTE').children("option:selected").val();
        var DeviceID = $('select#DeviceID').children("option:selected").val();
        var ReleaseMethod = $('select#ReleaseMethod').children("option:selected").val();
        var ProjectStatus = $('select#ProjectStatus').children("option:selected").val();
        var ProjectName = $('#projectname').val();

        //added local ospi pe if project is FT or WS Prod Support
        var OSPIPE = $('#OSPI_PE').val();


        //get value from input text box
        var tester = $('#tester').val();
        var Devicepackage = $('#Devicepackage').val();
        var PrimaryTE = $('#PrimaryTE').val();
        var Priority = $('#Priority').val();
        var handler = $('#handler').val();
        var noofsites = $('#noofsites').val();


        //get date value from datepicker
        var prpdate = $('#prpdate').val();
        var devtstartdate = $('#devtstartdate').val();
        //var devtstartdate = $('#devtstartdate').datepicker('getDate');
        var qualstartdate = $('#qualstartdate').val();
        var cabdate = $('#cabdate').val();
        var ecosubmitteddate = $('#ecosubmitteddate').val();
        var ecoreleasedddate = $('#ecoreleasedddate').val();
        var RapidValue = $('#RapidValue').val();
        var cabapprovedate = $('#cabapprovedate').val();
        var cabapproved = $('select#cabapproved').children("option:selected").val();
        var cabnumber = $('#cabnumber').val();




        //Checking the required field for the project creation
        //if (tester == "" ){alert("Please Enter Tester item!");}
        if (businesscase == "") {
            alert('Please enter your project business case!');
        } else if (ProjectName == "") {
            alert("Please Enter Project Name!");
        } else if (projtype == "projecttypeempty") {
            alert("Please Select Project Type! ");
        } else if (DeviceID == "deviceidempty") {
            alert("Please Select Device ID! ");
        } else if (ReleaseMethod == "releasemethodempty") {
            alert("Please Select Release Method or Select Not Applicable!");
        } else if (ProjectStatus == "projectstatusempty") {
            alert("Please Select Project Status!");
        } else if (tester == "") {
            alert("Please Input tester Before AddProject ");
        } else if (Devicepackage == "") {
            alert("Please Input Device Package Before AddProject");
        } else if (handler == "") {
            alert("Please Input handler Before AddProject");
        } else if (noofsites == "") {
            alert("Please Input No of Sites Before AddProject");
        } else if (projtype == 'FT PROD SUPPORT' || projtype == 'WS PROD SUPPORT') {

            if (OSPIPE == '') {
                alert('Please enter LOCAL PE IF Projecs IS FT/WS PROD SUPPORT.');
            } else {
                $.ajax({
                    type: 'post',
                    url: '/dmsg/MyPhp/project_ds_add.php',
                    data: {
                        handler: handler,
                        noofsites: noofsites,
                        prpdate: prpdate,
                        cabnumber: cabnumber,
                        cabapprovedate: cabapprovedate,
                        cabapproved: cabapproved,
                        OSPIPE: OSPIPE,
                        ProjectName: ProjectName, //added projectname
                        RapidValue: RapidValue,
                        businesscase: businesscase,
                        projtype: projtype,
                        OSPITE: OSPITE,
                        OSPISUPTE: OSPISUPTE,
                        DeviceID: DeviceID,
                        ReleaseMethod: ReleaseMethod,
                        ProjectStatus: ProjectStatus,


                        tester: tester,
                        Devicepackage: Devicepackage,
                        PrimaryTE: PrimaryTE,
                        Priority: Priority,

                        devtstartdate: devtstartdate,
                        qualstartdate: qualstartdate,
                        cabdate: cabdate,
                        ecosubmitteddate: ecosubmitteddate,
                        ecoreleasedddate: ecoreleasedddate





                    },
                    success: function(data) {
                        //alert(data);
                        if (data == 1) {
                            alert("New Project has been added successfuly");
                            $("#projectlist").load(location.href + " #projectlist",
                                function() {
                                    $("#tableAddproj").dataTable({
                                        "order": [
                                            [0, 'desc']
                                        ]
                                    });

                                });
                            $("#project").modal('hide');
                            location.reload();
                        } else if (data == 2) {
                            alert(
                                "This is a Rapid Ralease Project. Please type of Change :"
                                );
                        }
                    }
                });

            }
            // IF not prod support or ws support
        } else {


            $.ajax({
                type: 'post',
                url: '/dmsg/MyPhp/project_ds_add.php',
                data: {

                    handler: handler,
                    noofsites: noofsites,
                    prpdate: prpdate,
                    cabnumber: cabnumber,
                    cabapprovedate: cabapprovedate,
                    cabapproved: cabapproved,
                    OSPIPE: OSPIPE,
                    ProjectName: ProjectName, //added projectname
                    RapidValue: RapidValue,
                    businesscase: businesscase,
                    projtype: projtype,
                    OSPITE: OSPITE,
                    OSPISUPTE: OSPISUPTE,
                    DeviceID: DeviceID,
                    ReleaseMethod: ReleaseMethod,
                    ProjectStatus: ProjectStatus,


                    tester: tester,
                    Devicepackage: Devicepackage,
                    PrimaryTE: PrimaryTE,
                    Priority: Priority,

                    devtstartdate: devtstartdate,
                    qualstartdate: qualstartdate,
                    cabdate: cabdate,
                    ecosubmitteddate: ecosubmitteddate,
                    ecoreleasedddate: ecoreleasedddate





                },
                success: function(data) {
                    //alert(data);
                    if (data == 1) {
                        alert("New Project has been added successfuly");
                        $("#projectlist").load(location.href + " #projectlist", function() {
                            $("#tableAddproj").dataTable({
                                "order": [
                                    [0, 'desc']
                                ]
                            });

                        });
                        $("#project").modal('hide');
                        location.reload();
                    } else if (data == 2) {
                        alert("This is a Rapid Ralease Project. Please type of Change :");
                    }
                }
            });


        }

    });
});
//end of adding new project
</script>

<script>
$("select#DeviceID").change(function() {
    var DeviceID = $(this).children("option:selected").val();
    if (DeviceID == "AddProducts") {
        window.location = "../dmsg/addupdateproducts.php";


    }
});
</script>

<script type="text/javascript">
$(document).ready(function() {

    $('input').attr('autocomplete', 'off');

});
</script>
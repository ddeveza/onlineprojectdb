<?php
	require('../dmsg/inc/header.php');
	
	
	global $projyears;
	global $default;
	
?>

<script src="../dmsg/js/jquery-3.3.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="../dmsg/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../dmsg/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../dmsg/css/select.bootstrap.min.css">
<script src="../dmsg/js/jquery-1.12.4.js"></script>
<script src="../dmsg/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">


<!-- React Dependency -->

<script crossorigin src="https://unpkg.com/react@17/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.25.0/babel.min.js"></script>

<!-- End of React Dependency -->






<!-----------START OF WEEKLY STATUS UPDATE---->




<div style="min-height: 400px;" class="panel-body">
    <!-- pandel body start -->

    <div class="container">
        <div class="col-md-4">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onload="this.form.submit();">
                <select id="statusproject" class="form-control selectpicker" name="statusproject1">
                    <option value="SelectFirst">Select Status</option>
                    <option value="All">All</option>
                    <option value="Incoming">Incoming</option>
                    <option value="On Hold">Hold</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Cancelled">Canceled</option>
                    <option value="Completed">Completed</option>

                </select>
            </form>


        </div>
        <div id="projstatus" class="col-md-4">
            <form method="post" id="multiple_select_form">
                <select class="form-control selectpicker testing" id="Project1" style="width: 700px">
                    <option selected disabled value='empyfirst'>Select Project Status First.</option>
                </select>
            </form>


        </div>
        <br>
        <br>
        <br>
        <br>


        <button type="button" class="btn btn-primary btn-lg" id="AddWarBtn" style="padding-top: 1px; padding-right: 1px; padding-bottom: 1px; width: 200px; height: 50px; padding-left: 1px; font-size:15px;
	position:relative;
    top:50%; 
    left:40%;"> Create New Weekly Status</button>



        <!----Create New Status Moda---->
        <div class="modal fade" id="AddWAR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Create Weekly Status Report</h4>
                        </div>
                        <div class="modal-body" id="addnewwar">
                            <div class="form-group">
                                <div class="form-control">
                                    <label><b>WorkWeek</b></label>
                                    <input type="text" name="WWeek" id="WWeek" style="width:100px"
                                        value="WW<?php echo date('W',strtotime("0 week"))?>"></input>
                                    <label id="lblWWeek" style="color:red"></label>
                                    <label><b>Year</b></label>
                                    <input style="width:100px" type="text" name="YearProj" id="YearProj"
                                        value="<?php echo date('Y')?>" readonly></input>
                                    <label id="lblYearProj" style="color:red"></label>
                                </div>
                            </div>

                            <div id="moda">
                                <div class="form-group">

                                    <input type="text" name="ProjectID" id="ProjectID" hidden
                                        value="<?php echo  $_SESSION['TEID']; ?>" readonly></input>

                                </div>
                                <div class="form-group">
                                    <label><b>Project Name</b></label>
                                    <input class="form-control" type="text" name="ProjName" id="ProjectName"
                                        value="<?php echo $_SESSION["TEProjName"]?> " readonly></input>
                                    <label id="lblYearProj" style="color:red"></label>
                                </div>
                            </div>

                            <input type="text" name="Engineer" id="Engineer" hidden
                                value="<?php echo $_SESSION['TEName']?>" readonly></input>

                            <label><b>Detailed Project Status</b></label>
                            <textarea class="ckeditor" name="area3" style="width:500px; height:200px;">
							<p>	        	
							<b>Goal:</b><br>
								-	This is the objective of the project/activity/task
							<br>
							<b>Accomplishment/Status:</b><br>
								-	This is where we state the current stage/situation/accomplishment of the project/activity/task.<br>
								-	Accomplishment could be zero or none, but we need to state the status
							<br>
							<b>Issue:</b><br>
								-	Issue encounter during the project/activity/task
								<br>
								<b>Next Step:</b><br>
										-	Where is the project, activity or task is heading
										-	If the project/activity/task is complete, we should state it as “Done”
								</p>
							
					
							</textarea>
                            <label id="lblprojectdetail" style="color:red"></label>

                            <!-- <?php //include_once("MyPhp/weeklytasks.php")?>  This is for jong -->

                        </div>
                        <div id="root"></div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                            <button type="button" class="btn btn-default" id="save" data-toggle="modal"> Save
                                Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!----Create New Status Modal END---->








        <!-- The View Modal -->
        <div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="" method="post" id="ViewForm">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">View Status Update</h4>

                        </div>
                        <!-- Modal body -->
                        <div class="modal-body" id="updatemymodal">
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        <form>
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
                            <h4 class="modal-title">Edit Status Update</h4>

                        </div>
                        <!-- Modal body -->
                        <div class="modal-body" id="editprojectdetails">

                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-warning" id="update"> Update</button>
                        </div>
                        <form>
                </div>
            </div>
        </div>


        <!-- The Delete Modal -->
        <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="" method="post" id="deleteForm">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Delete</h4>

                        </div>
                        <!-- Modal body -->
                        <div class="modal-body" id="delDetails">

                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">

                            <button type="button" class="btn btn-danger" id="delete"> Delete</button>
                        </div>
                        <form>
                </div>
            </div>
        </div>



    </div>




    <div id="dennis">
        <table class="table table-striped" id="emptable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>WorkWeek</th>
                    <th>Year</th>
                    <th>Weekly Status</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                <?php 
			  
			  if($default !='All' and $_SESSION['TEID']!="" ){
			  $select = "Select * From weeklystatus where Project_ID='".$_SESSION['TEID']."' ORDER BY ID desc ;";
			  
			  $result = mysqli_query($con,$select);
			  $i=0;
			  while($row=mysqli_fetch_array($result)){
				
				  $WorkWeek=$row['Week_Number'];
				  $projYears=$row["project_year"];
				  $weeklystatus =$row["Detailed_Status_Update"];
				  $uniqueID=$row["ID"];
				  
			?>
                <tr>
                    <td width="1%"><?php echo $uniqueID; ?></td>

                    <td width="1%" class="myworkweek"><?php echo $WorkWeek; ?></td>
                    <td width="1%"><?php echo $projYears; ?></td>
                    <td width="10%"><?php echo $weeklystatus; ?></td>
                    <td width="10%">
                        <!--<button type="button" class="btn btn-success btn-xs view_data" id="<?php //echo $uniqueID ?>">view <br> </button>-->
                        <button type="button" class="btn btn-warning btn-xs edit_data" id="<?php echo $uniqueID ;?>"><i
                                class="glyphicon glyphicon-pencil"></i> update</button>
                        <button type="button" class="btn btn-danger btn-xs delete" id="<?php echo $uniqueID ?>"><i
                                class="glyphicon glyphicon-trash"></i>del</button>
                    </td>
                </tr>
                <?php } }  ?>
            </tbody>
        </table>
    </div>
</div>

</div><!-- pandel body End -->



<script type="text/babel">

</script>

<?php
	include'../dmsg/inc/footer.php'; 
?>
<script src="../dmsg/js/dataTables.min.js"></script>
<script>
$("#emptable").dataTable({
    ordering: false
});
</script>
<script type="text/javascript">
$('#AddWarBtn').click(function() {
    $('#AddWAR').modal('show');
});
</script>

<script>
//List all projects depending on Project Status
$(document).ready(function() {
    $("select#statusproject").change(function() {

        //alert('nico');
        var projselect = $(this).children("option:selected").val();

        if (projselect != 'SelectFirst') {
            $("#AddWarBtn").attr("disabled", false);
            $.ajax({
                type: 'post',
                url: '/dmsg/MyPhp/ProjectStatus.php',
                data: {
                    'projstatus': projselect
                },
                success: function(data) {
                    $("div#projstatus").html(data, function() {
                        $("#emptable").dataTable({
                            "order": [0, 'desc']
                        });

                    });


                }
            });
        }

    });

    //save status update
    $(document).on('click', '#save', function() {


        var ProjID = $('#ProjectID').val();
        var WeekNumber = $('#WWeek').val();
        var Projectyear = $('#YearProj').val();
        var OSPIEngr = $('#Engineer').val();
        var projectdetailstatus = CKEDITOR.instances.area3.getData();





        if (WeekNumber == "") {
            $('#lblWWeek').html("Enter Workweek number");

        } else if (projectdetailstatus == "") {
            $('#lblprojectdetail').html("Enter Project Status Update")
        } else {
            $.ajax({
                type: 'post',
                url: '/dmsg/MyPhp/save_projectstatus.php',
                data: {
                    'projectstatus': projectdetailstatus,
                    'engineer': OSPIEngr,
                    'workweek': WeekNumber,
                    'YearProj': Projectyear,
                    'ids': ProjID
                },
                success: function(data) {

                    $("#dennis").load(location.href + " #dennis", function() {
                        $("#emptable").dataTable({
                            "order": [0, 'desc']
                        });

                    });
                    $("#moda").load(location.href + " #moda");

                    //this will notify duplicate updates
                    if (data.indexOf("existing") >= 0) {
                        alert(data);

                    } else {
                        alert(data);
                        $("#AddWAR").modal('hide');
                        $("#addnewwar").load(location.href + " #addnewwar", function() {
                            CKEDITOR.replace('area3');
                            //$('area3').html(' <div id="root"></div>')
                        });




                    }




                }
            });
        }

    }); //end of saving update status;




});
</script>

<script>
$(document).ready(function() {

    $('#dennis').on('click', '.view_data', function() {
        var UniqueId = $(this).attr('id');

        $.ajax({
            type: 'post',
            url: '/dmsg/MyPhp/fetch.php',
            data: {

                'UniqueId': UniqueId

            },
            async: false,
            success: function(data) {

                $("#updatemymodal").html(data);

                $("#ViewModal").modal('show');



            }
        });

    }); //end of modal in view button


    //Update Weeklys status
    $('#dennis').on('click', '.edit_data', function() {
        var Unique = $(this).attr('id');
        $.ajax({
            type: 'post',
            url: '/dmsg/MyPhp/update_data.php',
            data: {
                'UniqueId': Unique
            },
            async: false,
            success: function(data) {
                $("#editprojectdetails").html(data);
                CKEDITOR.replace('area4');
                $("#EditModal").modal('show');
            }
        });
    }); //end of modal in edit data button

    //Save Update Weeklys status
    $(document).on('click', '#update', function() {
        var projectdetailstatus = CKEDITOR.instances.area4.getData();
        var WeekNumber = $('#WWeek_edit').val();
        var Projectyear = $('#YearProj_edit').val();
        var ProjID = $('#ProjectID').val();

        $.ajax({
            type: 'post',
            url: '/dmsg/MyPhp/update_save.php',
            data: {
                'WWeek': WeekNumber,
                'projyear': Projectyear,
                'projdetail': projectdetailstatus,
                'projID': ProjID
            },
            success: function(data) {

                alert('Successfully Updated');
                $("#EditModal").modal('hide');
                $("#dennis").load(location.href + " #dennis", function() {
                    $("#emptable").dataTable({
                        "order": [0, 'desc']
                    });

                });
            }
        });

    }); //end of updating weekly status



    //Delete Weekly Status
    $('#dennis').on('click', '.delete', function() {
        var Unique = $(this).attr('id');
        $.ajax({
            type: 'post',
            url: '/dmsg/MyPhp/del_data.php',
            data: {
                'UniqueId': Unique
            },
            async: false,
            success: function(data) {
                $("#delDetails").html(data);
                CKEDITOR.replace('area5');
                $("#delModal").modal('show');
            }
        });
    }); //end of modal in delete view_data button

    $(document).on('click', '#delete', function() {

        var unique = $('#del_id').val();
        if (confirm('Do you want to delete?')) {
            $.ajax({
                type: 'post',
                url: '/dmsg/MyPhp/delete_confirm.php',
                data: {
                    'unique': unique
                },
                success: function(data) {

                    alert('Successfully deleted');
                    $("#delModal").modal('hide');
                    $("#dennis").load(location.href + " #dennis", function() {
                        $("#emptable").dataTable({
                            "order": [0, 'desc']
                        });

                    });
                }
            });
        }
    }); //end of updating weekly status

});
</script>

<!-- Weekly Status Dates -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>

<script type="text/babel" data-presets="es2016,react" src='js/weeklyupdate_dates.jsx'></script>
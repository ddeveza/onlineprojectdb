
<?php

include '..\config\config.php'; 

	session_start();
  //will check if logged-in
  if(!isset($_SESSION['TEName'])){
   	$TE = 'Guest';
  }else{
  	$TE = $_SESSION['TEName'];
  }

/******************************************************************REVISION*********************************************************************
	
	RevA	3/05/2020		Dennis 			Initial Release


















																																					*/

?>



<!DOCTYPE html>

<html >

<head>
	<title>Hardware Report</title>

	<?php  include '..\hardware\header\header.php'?>


</head>

<style type="text/css">
	input:not([name = 'ospite']):not([name = 'lf']) {
  			text-transform: uppercase;

	}


</style>


<body>
		<!--Welcome Note -->
		<div>
			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item active" aria-current="page"><center><h1>Welcome, <?php echo $TE ?></h1><center></li>
				  </ol>
			</nav>
		</div>
		<!--END-->

		<!--Navigation bar-->
		<div >
					<ul class="nav nav-tabs">
					  <li class="nav-item">
					    <a class="nav-link " href="/dmsg/home.php">Home</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link active" href="#">Hardware Report</a>
					  </li>
					</ul>

		</div> 
		<!--END-->




		<!--Button to Add Hardware--> 

		<div style="padding: 20px">
				<center>
					<button type="button" class="btn btn-primary addhardware" data-toggle="modal" data-target="#AddHardware"> <i class="fas fa-plus"></i>   Add Hardware</button>
				</center>
		</div>

		<div style="padding: 20px">
			<select class='form-control col-md-3 selecttable'>
				<option id='Select' value='N/A' selected disabled>Select Table </option>
				<option id='FinalTest' value='FT'>Final Test</option>
				<option id='WaferSort' value='WS'>WS</option>
				<option id='TableAll' value='All'>Display All</option>
			</select>
		</div>




<!-------Sort and FT Table---->
		<?php include 'component/table.php'?>
<!-------End of Table------->






<!-- Modal For Adding Hardware -->
		
		
		<?php include 'modal/modalAddHardware.php'?>

<!---End of Modal Adding Hardware--->



<!-- Modal For Update Hardware -->
<div class="modal fade" id="editHardware" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">	<i class="fas fa-plus"></i> Add Hardware</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id='editformFT' novalidate>

      <div class="modal-body" id='editHardwareForm'>
	

		</div> <!--End of Modal Body-->
      <div class="modal-footer editedsuccess">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-primary"  data-toggle="modal" id='editsave'>Save changes</button> -->
    </div>
</form>
    </div>
      </div>
    </div>
  </div>
</div>




<!---End of Modal Update Hardware--->




<!-- Modal For Update Hardware for WS -->
<div class="modal fade" id="editHardwareWS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">	<i class="fas fa-plus"></i> Add Hardware</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id='editformWS' novalidate>

      <div class="modal-body" id='editHardwareFormWS'>
	

		</div> <!--End of Modal Body-->
      <div class="modal-footer editedsuccess">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <!--   <button type="submit" class="btn btn-primary"  data-toggle="modal" id='editsavews'>Save changes</button> -->
    </div>
</form>
    </div>
      </div>
    </div>
  </div>
</div>


<!---End of Modal Update Hardware--->



<?php
	include '../inc/footer.php'; 
?>

<script type="text/javascript">
	$(document).ready(()=>{
		$('input').attr('autocomplete','off');
		$('.addhardware').on('click',function(){

			//Reset form
				$("input[name='packtype']").val('');
				$("input[name='packtype']").val('');
				$("input[name='packsize']").val('');
				$("input[name='leadcount']").val('');
				$("input[name='handler']").val('');
				
				$("input[name='socpn']").val('');
				$("input[name='soctech']").val('');
				$("input[name='pinpn']").val('');
				$("input[name='pitch']").val('');
				$("select[name='ptbrecep']").val('');
				$("select[name='packagelps']").val('');
				$("input[name='lf']").val('');
				$("input[name='cuhsn']").val('');
				$("input[name='tester']").val('');
				$("textarea[name='cuhsocremarks']").val('');
	});
	});
</script>

<!--------Accorciod Hide or Show for FT and Sirt------------------------------->		
<script type="text/javascript" src='js/accordionhideshow.js'></script>


<!--------Datatable for FT and Sirt------------------------------->
<script type="text/javascript" src='js/datatableFTWS.js'></script>
<!--------------Table Hide or Show for FT and Sort---------------->
<script type="text/javascript" src='js/hideshowtable.js'></script>

<!----save the added hardware in Final Test------>
<script type="text/javascript" src='js/saveaddedhardware.js'></script>

<script type="text/javascript">
	//var status = ($('#defaultUnchecked1').is(":checked"));

	//alert(status);
</script>

<script type="text/javascript" src='js/edithardwareFT.js'></script>
<script type="text/javascript" src='js/edithardwareWS.js'></script>


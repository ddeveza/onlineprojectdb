



<div class="modal fade" id="AddHardware" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">	<i class="fas fa-plus"></i> Add Hardware</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<form id='formFT' novalidate>
      <div class="modal-body"> <!---Start of Modal Body---->


      			<!--Selection For Final and Sort TFiled--->
				<nav aria-label="...">
				  <ul class="pagination pagination-lg">
				    <li class="page-item FT"><a class="page-link" href="#">Final Test</a></li>
				    <li class="page-item WS"><a class="page-link" href="#">Sort</a></li>
				    
				  </ul>
				</nav>
				<!--END-->	
				
				<div id='errormessage'>
					
				</div>	
						<div id='accordion'><!---Start of Modal---->


								<div class='card-header' style='padding: 20px'>
										<i id="collapseAll" class="fa fa-angle-double-down btn btn-link" style="position: absolute; right:20px ; top:90px " ></i>
								</div>


								<!--Device Info-->
								
								<div class="card">
										    <div class="card-header" id="headingOne">
										      <h5 class="mb-0">
										        <button type='button' class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
										            Device Info   <i class="fa fa-angle-down"></i>
										        </button>
										      </h5>
										    </div>

								   			<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
								     			 <div class="card-body">
								     			
														<div class="row">
														      <div class="col-md-3">
														      	<label>Local TE:</label>
														      	<input type='text'class='form-control' value='<?php echo $TE?>' name='ospite'></input>
														      </div>
														      <div class="col-md-3">
														      	<label>Device ID:</label>
														      	<input class='form-control' name='deviceid' style="text-transform:uppercase" ></input>
														      </div>
														      <div class="col-md-3">
														      	<label>Corp TE:</label>
														      	<input class='form-control' name='corpte'></input>
														      </div>
														      <div class="col-md-3">
														      	<label>Monicker/Alias:</label>
														      	<input class='form-control' name='monicker'></input>
														      </div>
														      <div class="col-md-3">
														      	<label>Temperature:</label>
														      	<input class='form-control' name='temp'></input>
														      </div>
   														 </div>	
   													
											      </div>
											</div>
								</div>
								<!--End-->


								<!-----**************************************************Final Test Hardware InforMation **************************************************------->
							
						        <div id="FinalTest1">


										
						        		<?php include '../hardware/component/AddFinalTest.php'?>


								</div><!-----**************************************************Final Test Hardware InforMation END**************************************************------->

								<!-----**************************************************Sort Hardware InforMation**************************************************------->

						        <div id="Sort1">

										

						        		<?php include '../hardware/component/AddSort.php'?>


									
								</div><!-----**************************************************SORT Hardware InforMation END**************************************************------->


								

						</div ><!-----**************************************************END of Accrodion Hardware InforMation END**************************************************------->


      </div> <!--End of Modal Body-->
      <div class="modal-footer addedsuccess">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-primary addsave" id='addhardware' >Add Projects</button> -->
      </div>
       </form>
       
    </div>
  </div>
</div>

<style>

#referenceCUH {
margin:auto;
position: : absolute;
padding-top: 300px;
z-index: 1060;

}
</style>



<div class="modal fade" id="referenceCUH" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EXISTING CUH</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       		<div>
       				<label>Reference Device:</label>
       				<input type='text'class='form-control' id='refdeviceid' list='devicelist'></input>
       				<datalist id="devicelist">
       					<?php 
							$sqlDevice_ID = 'SELECT Device_ID,packagetype ,SocType from hardwareft ORDER BY Device_ID ASC';

							$resultDevice_ID = mysqli_query($con,$sqlDevice_ID); 

							while($row=mysqli_fetch_array($resultDevice_ID)){

							$Device_ID = strtoupper($row['Device_ID']);
							$packagetype = strtoupper($row['packagetype']);
							$SocType = strtoupper($row['SocType']);

						?>
							<option value='<?php echo $Device_ID.':'.$packagetype.':'.$SocType; ?>'>

					 <?php } ?>
					</datalist>

					<div id='info'>
						
					</div>
																	
       		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closerefdev" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-primary refdevice">OK</button> -->
      </div>
    </div>
  </div>
</div>

<script>
	
/*$("input[name=deviceid]").blur(function(){

		var FTActive = $('#FinalTest1').is(':visible');
		var WSActive = $('#Sort1').is(':visible');
		var DeviceID = $(this).val().toUpperCase();

		$('#duplicate').remove();
		if (FTActive)	{
			 $.ajax({
					type: 'post',
					url:'php/check_duplicate_hardwareft.php',
					data:{DeviceID:DeviceID},
					async:false,
					success:function(data){
						$('#duplicate').remove();
						if (data==1){
							$("input[name=deviceid]").focus();
							$("input[name=deviceid]").after("<label style='color:red' id='duplicate'>Device is already existing</label>");
							$(".addsave").attr("disabled",true);
						}else{
							$("input[name=deviceid]").after("");
							$(".addsave").attr("disabled",false);
						};	
					}
			});

		}else if(WSActive){ /////wafer sort is active
			//alert('dennis');
			 $.ajax({
					type: 'post',
					url:'php/check_duplicate_hardwarews.php',
					data:{DeviceID:DeviceID},
					async:false,
					success:function(data){
						$('#duplicate').remove();
						if (data==1){
							$("input[name=deviceid]").focus();
							$("input[name=deviceid]").after("<label style='color:red' id='duplicate'>Device is already existing</label>");
							$(".addsave").attr("disabled",true);
						}else{
							$("input[name=deviceid]").after("");
							$(".addsave").attr("disabled",false);
						};	
					}
			});
		}

	});*/
</script>


<script type="text/javascript">

	$('#CUH').change(function(){

		var existing = $(this).children('option:selected').val();

			if(existing == 'existing'){

					$('#referenceCUH').modal('show');
					

					/* $(document).on('show.bs.modal', '.modal', function (event) {
				            var zIndex = 1040 + (10 * $('.modal:visible').length);
				            $(this).css('z-index', zIndex);
				            setTimeout(function() {
				                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
				            }, 0);
        			});*/



					 $(document).on('hidden.bs.modal', '.modal', function () {
						    $('.modal:visible').length && $(document.body).addClass('modal-open');
						});





			}
			
      

	});



	$('.refdevice').on('click',function(){
		var Device_ID = $('#refdeviceid').val();

		$.ajax({
				type: 'post',
				url:'php/fetchReferenceDevice.php',
				data: {Device_ID:Device_ID} ,
				success:function(data1){

					var data = JSON.parse(data1);
					
					

					$("input[name='packtype']").val(data.PackageType);
					$("input[name='packsize']").val(data.PackageSize);
					$("input[name='leadcount']").val(data.LeadCount);
					$("input[name='handler']").val(data.handler);
					
					$("input[name='socpn']").val(data.socpn);
					$("input[name='soctech']").val(data.soctype);
					$("input[name='pinpn']").val(data.pintype);
					$("input[name='pitch']").val(data.pitch);
					$("select[name='ptbrecep']").val(data.ptbrecep);
					$("select[name='packagelps']").val(data.package);
					$("input[name='lf']").val(data.lf);
					$("input[name='cuhsn']").val(data.cuhsn);
					$("input[name='tester']").val(data.tester);
					$("textarea[name='cuhsocremarks']").val('This was reference from device : '+data.RefDevice);


					 $(document).on('hidden.bs.modal', '.modal', function () {
						    $('.modal:visible').length && $(document.body).addClass('modal-open');
						});


					
					
						
				}

			});

	});


	





	
</script>
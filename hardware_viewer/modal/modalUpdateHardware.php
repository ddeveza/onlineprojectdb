
<?php
	
		include'../../config/config.php';
		$ID = $_POST['ID'];
		$ID1 = 50;
		$sql = "SELECT * from hardwareft where ID='$ID'";

		$result = mysqli_query($con,$sql);

		if(mysqli_num_rows($result)>0){
				$row =mysqli_fetch_array($result);
	
			$Local_TE =$row['Local_TE'];
			$Corp_TE=$row['Corp_TE'];
			$Device_ID=$row['Device_ID'];
			$Monicker=$row['Monicker'];
			$Temp=$row['Temp'];
			$cuh=$row['cuh'];
			$packagetype=$row['packagetype'];
			$packagesize=$row['packagesize'];
			$leadcount=$row['leadcount'];
			$handler=$row['handler'];
			$SocType=$row['SocType'];
			$SocPN=$row['SocPN'];
			$PinType=$row['PinType'];
			$Pitch=$row['Pitch'];
			$SocQty=$row['SocQty'];
			$PTBRecep=$row['PTBRecep'];
			$Package=$row['Package'];
			$LF=$row['LF'];
			$NoSite=$row['NoSite'];
			$CUHSN=$row['CUHSN'];
			$Tester=$row['Tester'];
			$Qual_Category=$row['Qual_Category'];
			$CAB=$row['CAB'];
			$CUHSoc_QSD=$row['CUHSoc_QSD'];
			$cs_cuhqualstatus=$row['cs_cuhqualstatus'];
			$cs_socqualstatus=$row['cs_socqualstatus'];
			$cs_hmms=$row['cs_hmms'];
			$cs_remarks=$row['cs_remarks'];
			$Kit=$row['Kit'];
			$Kit_SN=$row['Kit_SN'];
			$Kit_QSD=$row['Kit_QSD'];
			$kit_qualstatus=$row['kit_qualstatus'];
			$kit_hmms=$row['kit_hmms'];
			$kit_remarks=$row['kit_remarks'];
			$tray=$row['tray'];
			$tray_QSD=$row['tray_QSD'];
			$tray_status=$row['tray_status'];




		}else{
			echo 'error';
		}
		

?>











      			<!--Selection For Final and Sort TFiled--->
				<nav aria-label="...">
				  <ul class="pagination pagination-lg">
				    <li class="page-item FT"><a class="page-link" href="#">Final Test</a></li>
				   
				    
				  </ul>
				</nav>
				<!--END-->	
							<!------Hidden ID---->
							<input type='hidden'class='form-control'  name='ID' value='<?php echo $ID ?>'></input> 

					<div id='accordion'><!---Start of Modal---->


								<div class='card-header' style='padding: 20px'>
										<i id="editcollapseAll" class="fa fa-angle-double-down btn btn-link" style="position: absolute; right:20px ; top:90px " ></i>
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
														      	<input type='text'class='form-control'  name='ospite' value='<?php echo $Local_TE ?>' readonly></input>
														      </div>
														      <div class="col-md-3">
														      	<label>Device ID:</label>
														      	<input class='form-control' name='deviceid' value='<?php echo $Device_ID; ?>' readonly></input>
														      </div>
														      <div class="col-md-3">
														      	<label>Corp TE:</label>
														      	<input class='form-control' name='corpte' value='<?php echo $Corp_TE; ?>'></input>
														      </div>
														      <div class="col-md-3">
														      	<label>Monicker/Alias:</label>
														      	<input class='form-control' name='monicker' value='<?php echo $Monicker; ?>'></input>
														      </div>
														      <div class="col-md-3">
														      	<label>Temperature:</label>
														      	<input class='form-control' name='temp' value='<?php echo $Temp; ?>'></input>
														      </div>
   														 </div>	
   													
											      </div>
											</div>
								</div>
								<!--End-->


								<!-----**************************************************Final Test Hardware InforMation **************************************************------->
							
						        <div id="FinalTest1">


										
						        		<?php include '../component/EditFinalTest.php'?>


								</div><!-----**************************************************Final Test Hardware InforMation END**************************************************------->

								<!-----**************************************************Sort Hardware InforMation**************************************************------->

						     


								

						</div ><!-----**************************************************END of Accrodion Hardware InforMation END**************************************************------->
					 <!---End of Accordion-->


      


<script type="text/javascript">
	
	/*$('#editsave').click(function(){

		//$('#editHardware').modal('hide');

	});
	*/
	
		var Current = $('#editcollapseAll').click(()=>{
		
				$('#editcollapseAll').toggleClass('fa fa-angle-double-down   fa fa-angle-double-right');

				var statusCollap = $('#editcollapseAll').hasClass('fa fa-angle-double-right');
		
				if (statusCollap) $('.collapse').addClass('show');
				else $('.collapse').removeClass('show');
				
				
			});
</script>


<script type="text/javascript">
	$('input').each(function(){
		var name = $(this).attr('name');

		if (name=='ospite'){
			
		}else if(name=='lf'){

		}else{
			$(this).css("text-transform","uppercase");
			$('input').attr('autocomplete','off');
		}
	});
</script>


<script type="text/javascript">
	$('#CUHedit').change(function(){

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


	
	

</script>


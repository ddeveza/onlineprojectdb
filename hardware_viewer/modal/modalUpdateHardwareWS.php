
<?php
	
		include'../../config/config.php';
		$ID = $_POST['ID'];
		
		$sql = "SELECT * from hardwarews where ID='$ID'";

		$result = mysqli_query($con,$sql);

		if(mysqli_num_rows($result)>0){
				$row =mysqli_fetch_array($result);
	
			
				$DeviceID=$row['DeviceID'];
				$Local_TE=$row['Local_TE'];
				$Corp_TE=$row['Corp_TE'];
				$Monicker=$row['Monicker'];
				$PCBVendor=$row['PCBVendor'];
				$PCVendor=$row['PCVendor'];
				$NeedleCount=$row['NeedleCount'];
				$Gramforce=$row['Gramforce'];
				$ProbeTech=$row['ProbeTech'];
				$TechType=$row['TechType'];
				$ProbeDepth=$row['ProbeDepth'];
				$ProbeNeedleMat=$row['ProbeNeedleMat'];
				$CleaningMat=$row['CleaningMat'];
				$Elteso=$row['Elteso'];
				$WaferType=$row['WaferType'];
				$ProbecardPN=$row['ProbecardPN'];
				$Setup=$row['Setup'];
				$Insertion=$row['Insertion'];
				$Temperature=$row['Temperature'];
				$ProbecardQty=$row['ProbecardQty'];
				$Tester=$row['Tester'];
				$Sites=$row['Sites'];
				$Configuration=$row['Configuration'];
				$PCQSD=$row['PCQSD'];
				$PCHMMS=$row['PCHMMS'];
				$PCRemarks=$row['PCRemarks'];
		




		}else{
			echo 'error';
		}
		

?>





      			<!--Selection For Final and Sort TFiled--->
				<nav aria-label="...">
				  <ul class="pagination pagination-lg">
				    
				     <li class="page-item WS"><a class="page-link" href="#">Sort</a></li>
				    
				  </ul>
				</nav>
				<!--END-->	
							<!------Hidden ID---->
							<input type='hidden'class='form-control'  name='ID' value='<?php echo $ID ?>'></input> 

					<div id='accordion'><!---Start of Modal---->


								<div class='card-header' style='padding: 20px'>
										<i id="editcollapseAllWS" class="fa fa-angle-double-down btn btn-link" style="position: absolute; right:20px ; top:90px " ></i>
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
														      	<input class='form-control' name='deviceid' value='<?php echo $DeviceID; ?>' readonly></input>
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
														      	<input class='form-control' name='temp' value='<?php echo $Temperature; ?>'></input>
														      </div>
   														 </div>	
   													
											      </div>
											</div>
								</div>
								<!--End-->


								<!-----**************************************************Final Test Hardware InforMation **************************************************------->
							
						        <!-----**************************************************Final Test Hardware InforMation END**************************************************------->

								<!-----**************************************************Sort Hardware InforMation**************************************************------->

						     
								<div id="Sort1">

										

						        		<?php include '../component/EditWS.php'?>


									
								</div>

								

						</div ><!-----**************************************************END of Accrodion Hardware InforMation END**************************************************------->
					 <!---End of Accordion-->


      





<script type="text/javascript">
	
	/*$('#editsave').click(function(){

		//$('#editHardware').modal('hide');

	});
	*/
	
		var Current = $('#editcollapseAllWS').click(()=>{
		
				$('#editcollapseAllWS').toggleClass('fa fa-angle-double-down   fa fa-angle-double-right');

				var statusCollap = $('#editcollapseAllWS').hasClass('fa fa-angle-double-right');
		
				if (statusCollap) $('.collapse').addClass('show');
				else $('.collapse').removeClass('show');
				
				
			});
</script>




<script type="text/javascript">
	$('input').each(function(){
		var name = $(this).attr('name');

		if (name =='ospite'){
			
		}else{
			$(this).css("text-transform","uppercase");
			$('input').attr('autocomplete','off');
		}
	});
</script>
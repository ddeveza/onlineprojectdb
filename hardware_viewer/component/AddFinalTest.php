



<div class="card">
									    <div class="card-header" id="headingTwo">
									      <h5 class="mb-0">
									        <button type='button' class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									          CUH/Socket  <i class="fa fa-angle-down"></i>
									        </button>
									      </h5>
									    </div>
									    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									      <div class="card-body">
									        			

									        				<div class='row'>
									        				  <div class="col-md-9">
															      	
															      	<input type='text'class='form-control' value="CUH/Socket Information:" readonly=""></input>
														      </div>
														      <div class="col-md-3">
														      		<label>CUH: </label>
															      	<select id="CUH" class="mdb-select md-form colorful-select dropdown-primary" name='cuhnewold'>
																			<option value="" selected >Select</option>
																			<option value="new">New</option>
																			<option value="existing">Existing</option>
																	</select>

																
															      	
														      </div>
														    
														        <div class="col-md-3">
															      	<label>Package Type:</label>
															      	<input type='text' class='form-control' name='packtype' list='packhandler' autocomplete='off'></input>
															      	<datalist id="packhandler">
																		<?php 
																			$sqlpackagetype = 'SELECT DISTINCT packagetype from hardwareft ORDER BY packagetype ASC';

																			$resultpackagetype = mysqli_query($con,$sqlpackagetype); 

																			while($row=mysqli_fetch_array($resultpackagetype)){

																			$packagetype = strtoupper($row['packagetype']);

																		?>
																		<option value='<?php echo $packagetype; ?>'>

																	 <?php } ?>
																	</datalist>
														      </div>
														      <div class="col-md-3">
															      	<label>Package Size:</label>
															      	<input type='text'class='form-control' name='packsize' list='packsizelist'></input>
															      	<datalist id="packsizelist">
																		<?php 
																			$sqlpackagesize= 'SELECT DISTINCT packagesize from hardwareft ORDER BY packagesize ASC';

																			$resultpackagesize = mysqli_query($con,$sqlpackagesize); 

																			while($row=mysqli_fetch_array($resultpackagesize)){

																			$packagesize = strtoupper($row['packagesize']);

																		?>
																			<option value='<?php echo $packagesize; ?>'>

																	 <?php } ?>
																	</datalist>

														      </div>
														       <div class="col-md-3">
															      	<label>No of Leads</label>
															      	<input type='text'class='form-control' name='leadcount' list='leadcountlist'></input>
															      	<datalist id="leadcountlist">
																		<?php 
																			$sqlleadcount= 'SELECT DISTINCT leadcount from hardwareft ORDER BY leadcount ASC' ;

																			$resultleadcount = mysqli_query($con,$sqlleadcount); 

																			while($row=mysqli_fetch_array($resultleadcount)){

																			$leadcount = strtoupper($row['leadcount']);

																		?>
																			<option value='<?php echo $leadcount; ?>'>

																	 <?php } ?>
																	</datalist>
														      </div>
														       <div class="col-md-3">
															      	<label>Handler:</label>
															      	<input type='text'class='form-control'  name='handler' list='handlerlist' ></input>
															      	<datalist id="handlerlist">
																		<?php 
																			$sqlhandler = 'SELECT DISTINCT handler from hardwareft ORDER BY handler ASC';

																			$resulthandler = mysqli_query($con,$sqlhandler); 

																			while($row=mysqli_fetch_array($resulthandler)){

																			$handler = strtoupper($row['handler']);

																		?>
																			<option value='<?php echo $handler; ?>'>

																	 <?php } ?>
																	</datalist>
														      </div>
														 


									        				
														      <div class="col-md-3">
															      	<label>Socket Technolgy:</label>
															      	<input type='text'class='form-control' name='soctech' list='soctechlist'></input>
															      	<datalist id="soctechlist">
																		<?php 
																			$sqlSocType = 'SELECT DISTINCT SocType from hardwareft ORDER BY SocType ASC';

																			$resultSocType = mysqli_query($con,$sqlSocType); 

																			while($row=mysqli_fetch_array($resultSocType)){

																			$SocType = strtoupper($row['SocType']);

																		?>
																			<option value='<?php echo $SocType; ?>'>

																	 <?php } ?>
																	</datalist>
														      </div>
														       <div class="col-md-4">
															      	<label>Socket PN:</label>
															      	<input type='text'class='form-control' name='socpn'></input>
														      </div>
														       <div class="col-md-3">
															      	<label>Pin PN:</label>
															      	<input type='text'class='form-control' name='pinpn'></input>
														      </div>
														       <div class="col-md-2">
															      	<label>Pitch:(mm)</label>
															      	<input type='number'class='form-control' name='pitch'></input>
														      </div>
														       <div class="col-md-3">
															      	<label>Socket Qty(RTP):</label>
															      	<input type='text'class='form-control' name='socqty'></input>
														      </div>
														      <div class="col-md-3">
															      	<label>PTB/Receptacle:</label>
															      	<select class="mdb-select md-form colorful-select dropdown-primary" name="ptbrecep">
																	  <option value="" readonly>Select</option>
																	  <option value="ptb">PTB</option>
																	  <option value="ptb-pizza">PTB Pizza</option>
																	   <option value="receptacle">Receptacle</option>
																	   <option value="standard thickness">Standard Thick</option>
																	</select>
														      </div>
														       <div class="col-md-3">
															      	<label>Leaded/Sawn/Punch:</label><br>
															      	<select class="mdb-select md-form colorful-select dropdown-primary" name='packagelps'>
																	  <option value="" readonly>Select</option>
																	  <option value="leaded">Leaded</option>
																	  <option value="punch">Punch</option>
																	   <option value="sawn">Sawn</option>
																	  
																	</select>
														      </div>
														       <div class="col-md-3">
															      	<label>Lead Finish:</label>
															      	<input type='text'class='form-control' name='lf'></input>
														      </div>
														      <div class="col-md-3">
															      	<label>No. of Sites:</label>
															      	<input type='number'class='form-control' name='noofsites'></input>
														      </div>
															  <div class="col-md-3">
															      	<label>CUH SN:</label>
															      	<input type='text'class='form-control' name='cuhsn'></input>
														      </div>
															  <div class="col-md-3">
															      	<label>Tester:</label>
															      	<input type='text'class='form-control' name='tester' list='testerlist'></input>
															      	<datalist id="testerlist">
																		<?php 
																			$sqltester = 'SELECT DISTINCT tester from hardwareft ORDER BY tester ASC';

																			$resulttester = mysqli_query($con,$sqltester); 

																			while($row=mysqli_fetch_array($resulttester)){

																			$tester = strtoupper($row['tester']);

																		?>
																			<option value='<?php echo $tester; ?>'>

																	 <?php } ?>
																	</datalist>
														      </div>
									        				</div>




														      	<div class='row' style='padding-top: 10px;'>
									        					<br>
									        					<div class="col-md-9">
															      	
															      	<input type='text'class='form-control' value="CUH/Socket Qual Status:" readonly=""></input>
														      	</div>
														      	<div class="col-md-3">
															  	    	
															      	
														     	 </div>
									        					<div class="col-md-5">
															      	<label>Qual Category:</label>
															      	<input type='text'class='form-control' name='cuhsocqualtype'></input>
															      	<br>
														      </div>
														      <div class="col-md-3">
															      	<label>CAB:</label>
															      	<input type='text'class='form-control' name='cabype'></input>
															      	<br>
														      </div>
															  <div class="col-md-4">
															      	<label>Qual Start Date:</label>
															      	<input type='date'class='form-control' name='cuhsocqsd'></input>
															      	<br>
														      </div>
									        				
														      <div class='container' style="padding: 5px">



														      	<div class='row' style="padding-top:5px padding-right: 10px">
																    
																		
																	

																		<div class="col-md-4">

																		<!-- 
																			<div class="custom-control custom-checkbox">
																			    <input type="checkbox" class="custom-control-input" id="defaultUnchecked14">
																			    <label class="custom-control-label" for="defaultUnchecked14">CUH Qual  Status


																			</label>
																			</div>	 -->
																			

																      </div>


																		<div class="col-md-4">

																		
																		
																	<!-- 		<div class="custom-control custom-checkbox">
																			    <input type="checkbox" class="custom-control-input" id="defaultUnchecked15">
																			    <label class="custom-control-label" for="defaultUnchecked15">Socket Qual Status</label>
																			</div>		
 -->

																      </div>

																       <div class="col-md-9" style='padding-top: 20px; '>
																				<label>Is CUH/Socket released in production (HMMS)?</label>
																				<select class="mdb-select md-form colorful-select dropdown-primary" name='cuhsochmms'>
																						<option value="" selected >Select</option>
																						<option value="Qual Completed">Yes(Qual Completed)</option>
																						<option value="Ongoing qual">Ongoing Qual</option>
																					
																				</select>

																		
															      	
														      			</div>
															  			<div class="col-md-5">
																			<label>CUH/Socket Status/Remarks?</label>
																			<textarea cols="50" rows="2" name='cuhsocremarks'></textarea>

																		
															      	
														      			</div>

									        				</div>
									        				</div>
									        			
									      </div>
									    </div>
									  </div>



									  <div class="card">
									    <div class="card-header" id="headingThree">
									      <h5 class="mb-0">
									        <button type='button' class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									          Kit  <i class="fa fa-angle-down"></i>
									        </button>
									      </h5>
									    </div>
									    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
									      <div class="card-body">
									       			 



														<div class='row Kit'>
									        				  <div class="col-md-7">
															      	<input type='text'class='form-control' value="KIT Qual Information:" readonly=""></input>
														      </div>
														      	<div class="col-md-2">
																	<label>Change Kit: </label>
																	<select id="KIT" class="mdb-select md-form colorful-select dropdown-primary" name='kitnewold'>
																			<option value="" selected >Select</option>
																			<option value="new">New</option>
																			<option value="existing">Existing</option>
																	</select>
																</div>
																	<div class="col-md-3">
																	<label>Change Kit SN: </label>
																	<input type='text'class='form-control' name='kitsn'></input>
														      		</div>
														</div>
														<div class='row kitqual' style='padding:5px'>
															<div class="col-md-3">
																	<label>Kit Qual Start Date: </label>
															</div>
															<div class="col-md-4">
																	<input type='date'class='form-control' name='kitqsd'></input>
														    </div>
														</div>
														<div class="col-md-6 kitqual" style='padding:10px'>
																	
																		<!-- 
																			<div class="custom-control custom-checkbox">
																			    <input type="checkbox" class="custom-control-input" id="KitqualStatus">
																			    <label class="custom-control-label" for="KitqualStatus">KIT Qual Status

																			</label>
																			</div>	 -->

															</div>	

														  <div class="col-md-9">
																
																			<label>Is KIT released in production (HMMS)?</label>
																	<select class="mdb-select md-form colorful-select dropdown-primary" name='kithmms'>
																			<option value="" selected>Select</option>
																			<option value="Qual Completed">Yes (Qual Completed)</option>
																			<option value="Ongoing qual">Ongoing Qual</option>
																			
																	</select>
																		

																		
															      	
														      </div>
															  <div class="col-md-5">
																			<label>KIT Satus/Remarks?</label>
																			<textarea cols="50" rows="2" name='kitremarks'></textarea>

																		
															      	
														      </div>



													
									      </div>
									    </div>
									  </div>




									   <div class="card">
									    <div class="card-header" id="headingFour">
									      <h5 class="mb-0">
									        <button type='button' class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									         		 Material: <i class="fa fa-angle-down"></i>
									        </button>
									      </h5>
									    </div>
									    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
									      <div class="card-body">
									      		
												  <div class='row'>
									        				  <div class="col-md-9">
															      	
															      	<input type='text'class='form-control' value="Material Information:" readonly=""></input>
														      </div>
														      <div class="col-md-3">
															      	
															      	
														      </div>
												  
												  </div>

												  <div class='row' style='padding:5px'>
												  			<div class="col-md-4">
															      	<label>TRAY(new/existing):</label>
															      	<select name='traynewold's class="mdb-select md-form colorful-select dropdown-primary" >
																			<option value="" selected >Select</option>
																			<option value="new">New</option>
																			<option value="existing">Existing</option>
																			<option value="N/A">N/A (Tube/Cannister)</option>
																	</select>


														    </div>
														    
												  			<div class="col-md-4">
															      	<label>Material Qual Start Date:</label>
															      	<input type='date'class='form-control' name='trayqsd'></input>
															      	<br>
														    </div>

														    <div class="col-md-4">
															      	<label>Status:</label>
															    	<select class="mdb-select md-form colorful-select dropdown-primary" name='trayhmms'>
																			<option value="" selected >Select</option>
																			<option value="Qual Completed">Qual Completed</option>
																			<option value="Ongoing Qual">Ongoing Qual</option>
																	</select> 

															 <!----- 		<select class="mdb-select md-form colorful-select dropdown-primary" name='kithelp'>
																	  <option value="" readonly>Select</option>
																	  <option value="completed">Leaded</option>
																	  <option value="ongoing">Punch</option>
																	   
																	  
																	</select>---->
														    </div>



														
												  </div>


										

									      </div>
									    </div>





									  </div>
								


</div>




<script>

$(document).ready(()=>{
	$('.kitqual').hide();
	$('.existing').remove();
	$('#KIT').change(()=>{
		var kitselected = $('select#KIT').children("option:selected").val();
		
		console.log(kitselected);
		if (kitselected == 'new'){
			$('.kitqual').show();
			$('.existing').remove();
		}else{
			$('.existing').remove();
			$('.kitqual').hide();
			$('.Kit').append("<label class='existing' style='padding:50px;'>Kit is existing");

		}
	})
})

</script>
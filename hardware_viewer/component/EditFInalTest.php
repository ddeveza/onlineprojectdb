




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
															      	<select id="CUHedit" class="mdb-select md-form colorful-select dropdown-primary" name='cuhnewold'>
																			<option value=""  >Select</option>
																			<option value="new" <?php if($cuh == "new") echo 'selected'?>>New</option>
																			<option value="existing" <?php if($cuh == "existing") echo 'selected'?>>Existing</option>
																	</select>

																
															      	
														      </div>
														    
														        <div class="col-md-3">
															      	<label>Package Type:</label>
															      	<input type='text' class='form-control' name='packtype' list='packhandler' autocomplete='off' value='<?php echo $packagetype;?>'></input>
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
															      	<input type='text'class='form-control' name='packsize' list='packsizelist' value='<?php echo $packagesize;?>'></input>
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
															      	<input type='text'class='form-control' name='leadcount' list='leadcountlist' value='<?php echo $leadcount;?>'></input>
															      		<datalist id="leadcountlist">
																		<?php 
																			$sqlleadcount= 'SELECT DISTINCT leadcount from hardwareft ORDER BY leadcount ASC';

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
															      	<input type='text'class='form-control' name='handler' list='handlerlist' value='<?php echo $handler;?>'></input>
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
															      	<input type='text'class='form-control' name='soctech' list='soctechlist' value='<?php echo $SocType;?>'></input>
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
															      	<input type='text'class='form-control' name='socpn' value='<?php echo $SocPN;?>'></input>
														      </div>
														       <div class="col-md-3">
															      	<label>Pin PN:</label>
															      	<input type='text'class='form-control' name='pinpn' value='<?php echo $PinType;?>'></input>
														      </div>
														       <div class="col-md-2">
															      	<label>Pitch:(mm)</label>
															      	<input type='number'class='form-control' name='pitch' value='<?php echo $Pitch;?>'></input>
														      </div>
														       <div class="col-md-3">
															      	<label>Socket Qty(RTP):</label>
															      	<input type='text'class='form-control' name='socqty' value='<?php echo $SocQty;?>'></input>
														      </div>
														      <div class="col-md-3">
															      	<label>PTB/Receptacle:</label>
															      	<select class="mdb-select md-form colorful-select dropdown-primary" name="ptbrecep">
																	  <option value="" >Select</option>
																	  <option value="ptb"   <?php if($PTBRecep == "ptb") echo 'selected';?> >PTB</option>
																	  <option value="ptb-pizza" <?php if($PTBRecep == "ptb-pizza") echo 'selected';?>>PTB Pizza</option>
																	   <option value="receptacle" <?php if($PTBRecep == "receptacle") echo 'selected';?>>Receptacle</option>
																	   <option value="standard thickness" <?php if($PTBRecep == "standard thickness") echo 'selected';?>>Standard Thick</option>
																	</select>
														      </div>
														       <div class="col-md-3">
															      	<label>Leaded/Sawn/Punch:</label><br>
															      	<select class="mdb-select md-form colorful-select dropdown-primary" name='packagelps'>
																	  <option value="" >Select</option>
																	  <option value="leaded" <?php if($Package == "leaded") echo 'selected'?> >Leaded</option>
																	  <option value="punch"  <?php if($Package == "punch") echo 'selected'?> >Punch</option>
																	   <option value="sawn" <?php if($Package == "sawn") echo 'selected'?>>Sawn</option>
																	  
																	</select>
														      </div>
														       <div class="col-md-3">
															      	<label>Lead Finish:</label>
															      	<input type='text'class='form-control' name='lf' value='<?php echo $LF ?>'></input>
														      </div>
														      <div class="col-md-3">
															      	<label>No. of Sites:</label>
															      	<input type='number'class='form-control' name='noofsites' value='<?php echo $NoSite ?>'></input>
														      </div>
															  <div class="col-md-3">
															      	<label>CUH SN:</label>
															      	<input type='text'class='form-control' name='cuhsn' value='<?php echo $CUHSN ?>'></input>
														      </div>
															  <div class="col-md-3">
															      	<label>Tester:</label>
															      	<input type='text'class='form-control' name='tester' list='testerlist' value='<?php echo $Tester ?>'></input>
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
															      	<input type='text'class='form-control' name='cuhsocqualtype' value='<?php echo $Qual_Category ?>'></input>
															      	<br>
														      </div>
														      <div class="col-md-3">
															      	<label>CAB:</label>
															      	<input type='text'class='form-control' name='cabype'  value='<?php echo $CAB ?>'></input>
															      	<br>
														      </div>
															  <div class="col-md-4">
															      	<label>Qual Start Date:</label>
															      	<input type='date'class='form-control' name='cuhsocqsd' value='<?php echo $CUHSoc_QSD ?>'></input>
															      	<br>
														      </div>
									        				
														      <div class='container' style="padding: 5px">



														      	<div class='row' style="padding-top:5px padding-right: 10px">
																    
																		
																	

																		<div class="col-md-4">

																		
																		<!-- 	<div class="custom-control custom-checkbox">
																			    <input type="checkbox" class="custom-control-input" id="editcuhqualstatus"  <?php if($cs_cuhqualstatus==1) echo 'checked'?> >
																			    <label class="custom-control-label" for="editcuhqualstatus" >CUH Qual  Status


																			</label>
																			</div>	
																			 -->

																      </div>


																		<div class="col-md-4">

																		
																		<!-- 
																			<div class="custom-control custom-checkbox">
																			    <input type="checkbox" class="custom-control-input" id="editsocqualstatus" <?php if($cs_socqualstatus==1) echo 'checked'?> >
																			    <label class="custom-control-label" for="editsocqualstatus">Socket Qual Status</label>
																			</div>	 -->	


																      </div>

																       <div class="col-md-9" style='padding-top: 20px; '>
																				<label>Is CUH/Socket released in production (HMMS)?</label>
																				<select class="mdb-select md-form colorful-select dropdown-primary" name='cuhsochmms'>
																						<option value=""  >Select</option>
																						<option value="Qual Completed" <?php if($cs_hmms=='Qual Completed') echo 'selected'?>>Yes (Qual Completed)</option>
																						<option value="Ongoing qual" <?php if($cs_hmms=='Ongoing qual') echo 'selected'?>>Ongoing Qual</option>
																						
																				</select>

																		
															      	
														      			</div>
															  			<div class="col-md-5">
																			<label>CUH/Socket Satus/Remarks?</label>
																			<textarea cols="50" rows="2" name='cuhsocremarks'><?php echo $cs_remarks; ?></textarea>

																		
															      	
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
																			<option value="" >Select</option>
																			<option value="new" <?php if($Kit=="new") echo 'selected'; ?>>New</option>
																			<option value="existing" <?php if($Kit=="existing") echo 'selected'; ?>>Existing</option>
																	</select>
																</div>
																	<div class="col-md-3">
																	<label>Change Kit SN: </label>
																	<input type='text'class='form-control' name='kitsn' value='<?php echo $Kit_SN ?>'></input>
														      		</div>
														</div>
														<div class='row kitqual' style='padding:5px'>
															<div class="col-md-3">
																	<label>Kit Qual Start Date: </label>
															</div>
															<div class="col-md-4">
																	<input type='date'class='form-control' name='kitqsd' value='<?php echo $Kit_QSD ?>'></input>
														    </div>
														</div>
														<div class="col-md-6 kitqual" style='padding:10px'>
																	
																		
																			<!-- <div class="custom-control custom-checkbox">
																			    <input type="checkbox" class="custom-control-input" id="editKitqualStatus" <?php if($kit_qualstatus == 1) echo 'checked'?>>
																			    <label class="custom-control-label" for="editKitqualStatus">KIT Qual Status

																			</label>
																			</div>	 -->

															</div>	

														  <div class="col-md-9">
																
																			<label>Is KIT released in production (HMMS)?</label>
																	<select class="mdb-select md-form colorful-select dropdown-primary" name='kithmms'>
																			<option value="" selected>Select</option>
																			<option value="Qual Completed" <?php if($kit_hmms == "Qual Completed") echo 'selected'?>>Yes (Qual Completed)</option>
																			<option value="Ongoing qual" <?php if($kit_hmms == "Ongoing qual") echo 'selected'?>>Ongoing Qual</option>
																		
																	</select>
																		

																		
															      	
														      </div>
															  <div class="col-md-5">
																			<label>KIT Satus/Remarks?</label>
																			<textarea cols="50" rows="2" name='kitremarks'><?php echo $kit_remarks?></textarea>

																		
															      	
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
																			<option value="" >Select</option>
																			<option value="new" <?php if($tray=='new') echo 'selected';?>>New</option>
																			<option value="existing"  <?php if($tray=='existing') echo 'selected';?>>Existing</option>
																			<option value="N/A"  <?php if($tray=='N/A') echo 'selected';?>>N/A (Tube/Cannister)</option>
																	</select>


														    </div>
														    
												  			<div class="col-md-4">
															      	<label>Material Qual Start Date:</label>
															      	<input type='date'class='form-control' name='trayqsd' value='<?php echo $tray_QSD; ?>'></input>
															      	<br>
														    </div>

														    <div class="col-md-4">
															      	<label>Status:</label>
															    	<select class="mdb-select md-form colorful-select dropdown-primary" name='trayhmms'>
																			<option value=""  >Select</option>
																			<option value="Qual Completed" <?php if($tray_status=='Qual Completed') echo 'selected';?> >Qual Completed</option>
																			<option value="Ongoing Qual" <?php if($tray_status=='Ongoing Qual') echo 'selected';?>>Ongoing Qual</option>
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



</script>



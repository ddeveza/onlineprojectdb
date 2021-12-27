<?php
	
	session_start();
	
	

?>
 
 
 <script src="../ckeditor/ckeditor.js"></script>
 
 <div class="form-group"  >
						<div class="form-control">
							<label><b>WorkWeek</b></label>
							<input   type="text" name="WWeek" id="WWeek" style="width:100px" value="WW<?php echo date('W')?>"></input>
							<label id="lblWWeek" style="color:red"></label>
							<label><b>Year</b></label>
							<input  style="width:100px"  type="text" name="YearProj" id="YearProj" value="<?php echo date('Y')?>" readonly></input>
							<label id="lblYearProj" style="color:red"></label>
						</div>
					</div>
				
					<div id="moda"> 
						<div class="form-group">
							
							<input type="text" name="ProjectID" id="ProjectID" hidden value="<?php echo  $_SESSION['TEID']; ?>" readonly></input>
							
						</div>
						<div class="form-group">
							<label><b>Project Name</b></label>
							<input class="form-control" type="text" name="ProjName" id="ProjectName" value="<?php echo $_SESSION["TEProjName"]?> " readonly></input>
							<label id="lblYearProj" style="color:red"></label>
						</div>
					</div>
					
					<input type="text" name="Engineer" id="Engineer" hidden value="<?php echo $_SESSION['TEName']?>" readonly></input>
				
					<label><b>Detailed Project Status</b></label>
					<textarea class="ckeditor" id="area3" style="width:300px; height:100px;"></textarea>

			  

				
				
		

	



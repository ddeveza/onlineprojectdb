
<?php
	require('..\dmsg/inc/header-index.php');
	
?>


<!------------------------------------------------------------------------------------- -->
<!--
	Revision		Date				  Name 							Remarks
	   1.0        01/03/2020			Dennis D.				1. Initial Release
	--------------------------------------------------------------------------------------
	   1.1		  02/12/2020			Dennis D. 				1. Added copyright on footer.php
	   														2. Update Ian Project report table from display to hover type.
	   														3. Added OSPI_PE on FF:
	   															a. Adding projects 
	   															b. Update projects
	   															c. Add column for PE in Ians Project
	   														4. Update name to Online Project-DB Status Report
	 -----------------------------------------------------------------------------------------
	   1.2		  02/13/2020  			Dennis D.			1. Change Table Border
	------------------------------------------------------------------------------------------
	   1.3 		  02/17/2020			Dennis D.			1. Append Monicker or Device description  under Device_IC columns
	   														2. Added Marquee and qoutes in header.
	-------------------------------------------------------------------------------------------
	   1.4		  02/18/2020			Dennis D. 			1. Added to check if the user is logged-in
	--------------------------------------------------------------------------------------------
	   1.5 		  03/02/2020			Dennis D.			1. Link hardware tools
	--------------------------------------------------------------------------------------------
	   1.6		  03/09/2020			Dennis D.     		1. Added Tooltip of Business Case on Project Name
	   														2. Added MQUAL projects option
	   														3. Update MULTISITE MIGRATION to MULTISITE CONVERSION
	------------------------------------------------------------------------------------------------------------------
	   1.7		  03/09/2020			Dennis D.			1. Added Rapid Release Type of Change
	   														
	   														




																						-->
<!------------------------------------------------------------------------------------- -->





	<script src="../dmsg/js/jquery-3.3.1.min.js"></script>
<style>
.top {
  background-color: #666;
  padding: 10px;
  text-align: center;
  font-size: 30px;
  color: white;
  text-align: center;
}
</style>
<script>
	$(document).ready(function(){
		$("#login_form").submit(function(event){
			
			event.preventDefault();
			var username =$("#login_username").val();
			var logpassword =$("#login_password").val();
			
			$.ajax({
				type: 'post',
				url:'/dmsg/MyPhp/ValidateUser.php',
				data:{
					'loginuser':username,
					'loginpassword':logpassword
				},
				
				success:function(data){
					//alert(data); //for debug 
					
					if(data==1){
						window.location = "/dmsg/home.php";
					}else if(data==2){
						window.location = "/dmsg/ianhome.php";
					}else if (data==3){
						window.location = "/crud/index.php"
					}else if (data==4){
						window.location = "/dmsg/AllProjectWeeklyStatus.php";

					}
					else{
						alert("Invalid User or Password");
					
					}
					
					
				}
			}); 
		});
	});
</script>


<div class="container">
      <form  method="post" name="login_form" id="login_form" >
        <h2 class="form-signin-heading"></h2>

        <label for="UserName" class="sr-only">UserName</label>
        <input id="login_username" type="text" name="OndexID" id="OncdexID" class="form-control" placeholder="OndexID">

        <label for="Password" class="sr-only">Password</label>
        <input id="login_password"type="password" name="Password" id="Password" class="form-control" placeholder="Password">

        <br>

        <button id="submit" name="submit" type="submit" class="btn btn-lg btn-primary btn-block">Login</button><br><br><br>
      </form>
<div>
<?php
	require('..\dmsg/inc/footer.php');
?>
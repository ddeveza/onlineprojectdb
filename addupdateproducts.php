<?php
	require('../dmsg/inc/header.php');
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../dmsg/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../dmsg/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../dmsg/css/select.bootstrap.min.css">
<br>
<br>
<style type="text/css">
    #product{
    	margin: 10px;
		position: absolute;
        left: 30%;
    }
    @media screen and (min-width: 768px) {
        .modal-dialog {
          width: 700px; /* New width for default modal */
        }
        .modal-sm {
          width: 350px; /* New width for small modal */
        }
    }
    @media screen and (min-width: 992px) {
        .modal-lg {
          width: 800px; /* New width for large modal */
        }
    }
</style>
<div id="container">


<button type="button" class="btn btn-primary btn-lg product"  
    style="padding-top: 1px; padding-right: 1px; padding-bottom: 1px; width: 200px; height: 50px; padding-left: 1px; font-size:15px;
	position:relative;
    top:50%; 
    left:40%;"> Add New Products</button>


<!----Create New Status Moda---->
	 <div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-lg" role="document">
			<div class="modal-content">
			 <form action="" method="post">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Add Products</h4>
			  </div>
			  <div class="modal-body" id="productdetails">
				<table class="table table-striped" >
					<tr>
					<td><label><b>DeviceID:</b><br></td>
					<td><input type="text" id="DeviceID" style="text-transform:uppercase" ></input><td>
					<td><label><b>Monicker:</b><br></td>
					<td><input type="text" id="Monicker"></input><td>
					</tr>
					<tr>
					<td><label><b>PTI2:</b><br></td>
					<td><input type="text" id="PTI2" style="text-transform:uppercase" ></input><td>
					<td><label><b>Customer:</b><br></td>
					<td><input type="text" id="Customer"></input><td>
					</tr>
					<tr>
					<td><label><b>Device Owner:</b><br></td>
					<td><input type="text" id="DeviceOwner"></input><td>
					<td><label><b>Release Code:</b><br></td>
					<td><input type="text" id="ReleaseCode" style="text-transform:uppercase" ></input><td>
					</tr>
					<tr>
					<td><label><b>WS Location:</b><br></td>
					<td><input type="text" id="WSLocation" style="text-transform:uppercase" ></input><td>
					<td><label><b>FT Location:</b><br></td>
					<td><input type="text" id="FTLocation" style="text-transform:uppercase" ></input><td>
					</tr>
					<tr>
					<td><label><b>Assembly Location:</b><br></td>
					<td><input type="text" id="AssemblyLocation" style="text-transform:uppercase" ></input><td>
					<td><label><b>FAB Location:</b><br></td>
					<td><input type="text" id="FABLocation" style="text-transform:uppercase" ></input><td>
					</tr>
					<tr>
					<td><label><b>Primary TDE:</b><br></td>
					<td><input type="text" id="PrimaryTDE"></input><td>
					<td><label><b>Program Manager:</b><br></td>
					<td><input type="text" id="ProgramManager"></input><td>
					</tr>
				</table>
					
				
				<label id="error"></label>
				
				
			 </div>
			 <div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
			  <button type="button" class="btn btn-primary addproj" id="save" data-toggle="modal"> Save Changes</button>
			 </div>
			</form>
		    </div>
	    </div>
	</div>

	
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form action="" method="post" id="updateForm">
        <!-- Modal Header -->
        <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Products</h4>
         
        </div>
        <!-- Modal body -->
        <div class="modal-body" id="editprojectdetails">
					
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-warning update_prod" id="update"> Update</button>
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
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Do you want to delete this device from products?</h4>
         
        </div>
        <!-- Modal body -->
        <div class="modal-body" id="delproductdetails">
					
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-danger del_prod" > Delete</button>
        </div>
       <form> 
      </div>
    </div>
</div>


<div id="productlist" >

<table id="tableAddprod"  class="display" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>ID</th>
			<th>Device ID</th>
			<th>Description</th>
			<th>PTI2</th>
			<th>Customer</th>
			<th>DeviceOwner</th>
			<th>ReleaseCode</th>
			<th>WSLocation</th>
			<th>FTLocation</th>
			<th>AssemblyLocation</th>
			
		
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$TE_Name = $_SESSION["TEName"];
			
			if($TE_Name != ""){
				$sql ="SELECT * FROM products ORDER BY ID Asc";
				$result = mysqli_query($con,$sql);
				while($row=mysqli_fetch_array($result)){
				 
				  $ID=$row['ID'];
				  $DeviceID=$row["Device_ID"];
				  $Description = $row['Description'];
				  $PTI= $row['PTI2'];
				  $Customer = $row['Customer'];
				  $DeviceOwner =$row["Device_Owner"];
				  $ReleaseCode=$row["Release_Code"];
				  $WSLocation = $row['WS_Location'];
				  $FTLocation = $row['FT_Location'];
				  $AssemblyLocation = $row['Assembly_Location'];
				  $FABLocation = $row['FAB_Location'];
				 
				 
				 
			
			?>
			
			<tr>
				<td><?php echo $ID; ?></td>
				<td><?php echo $DeviceID; ?></td>
				<td><?php echo $Description; ?></td>
				<td style="width:1%"><?php echo $PTI; ?></td>
				<td><?php echo $Customer; ?></td>
				
				<td><?php echo $DeviceOwner; ?></td>
				<td><?php echo $ReleaseCode; ?></td>
				<td><?php echo $WSLocation; ?></td>
				<td><?php echo $FTLocation; ?></td>
				<td><?php echo $AssemblyLocation; ?></td>
				
				
				<td style="width:10%"> <button type="button" class="btn btn-warning btn-xs edit_data" id="<?php echo $ID ;?>"><i class="glyphicon glyphicon-pencil"></i> edit</button> &nbsp <button type="button" class="btn btn-danger btn-xs del" id="<?php echo $ID ;?>"><i class="glyphicon glyphicon-trash"></i>delete</button></td>
			</tr>
			<?php }}?>
	</tbody>

</table>

</div>

</div>





<?php
	include'..\dmsg/inc/footer.php'; 
?>


<script>
	
	$("#tableAddprod").dataTable({
		"order": [[ 0, 'desc' ]]
	});
</script>

<script>
	$(document).on('click','.product',function(){
			//$('#ReleaseMethod').val('RapidRelease').attr('selected',true);
			$('#product').modal('show');
	});
</script>


<script>
	$("#DeviceID").blur(function(){
		 var DeviceID = $(this).val().toUpperCase();
		 
		 $.ajax({
				type: 'post',
				url:'/dmsg/MyPhp/check_duplicate_products.php',
				data:{DeviceID:DeviceID},
				async:false,
				success:function(data){
					
					if (data==1){
						$("#DeviceID").focus();
						$("#error").html("<label style='color:red'>Device is already existing</label>");
						$("#save").attr("disabled",true);
					}else{
						$("#error").html("");
						$("#save").attr("disabled",false);
					};	
				}
		});
	});
</script>

<script>
 $(document).ready(function(){
	 $(document).on('click','#save',function(){
		  var DeviceID = $('#DeviceID').val().toUpperCase();
		  var Monicker =  $('#Monicker').val();
		  var PTI =  $('#PTI2').val().toUpperCase();
		 var Customer =  $('#Customer').val();
		   var DeviceOwner =  $('#DeviceOwner').val();
		  var ReleaseCode =  $('#ReleaseCode').val().toUpperCase();
		  var WSLocation =  $('#WSLocation').val().toUpperCase();
		  var FTLocation =  $('#FTLocation').val().toUpperCase();
		  var AssemblyLocation =  $('#AssemblyLocation').val().toUpperCase();
		  var FABLocation =  $('#FABLocation').val().toUpperCase();
		  var PrimaryTDE =  $('#PrimaryTDE').val();
		   var ProgramManager =  $('#ProgramManager').val();    
		  
		  if (DeviceID ==""){
			  alert("Please Enter DeviceID");
		  }else if( PTI =="" ){
			  alert("Please Enter PTI");
		  }
		  else{
		   $.ajax({
				type: 'post',
				url:'/dmsg/MyPhp/addproducts_save.php',
				data:{
					
					DeviceID:DeviceID,
					Monicker:Monicker,
					PTI:PTI,
					Customer:Customer,
					DeviceOwner:DeviceOwner,
					ReleaseCode:ReleaseCode,
					WSLocation:WSLocation,
					FTLocation:FTLocation,
					AssemblyLocation:AssemblyLocation,
					FABLocation:FABLocation,
					PrimaryTDE:PrimaryTDE,
					ProgramManager:ProgramManager
				
				
				},
				async:false,
				success:function(data){
					alert('Producs has been successfully added');
					$("#productlist").load(location.href + " #productlist",function(){
							$("#tableAddprod").dataTable({
								"order": [[ 0, 'desc' ]]
							});
							
						}); 
						
						
						$("#product").modal('hide');
						
						//Clear form input text....
						$('#DeviceID').val('');
						$('#Monicker').val('');
						$('#PTI2').val('');
						$('#Customer').val('');
						$('#DeviceOwner').val('');
						$('#ReleaseCode').val('');
						$('#WSLocation').val('');
						$('#FTLocation').val('');
						$('#AssemblyLocation').val('');
						$('#FABLocation').val('');
						$('#PrimaryTDE').val('');
						$('#ProgramManager').val('');

						
				}
		});
		
		  }
		 
	 });
	
	 
 });
</script>

<script>
	$('#productlist').on('click','.edit_data',function(){
		var ID = $(this).attr('id');
		$.ajax({
				type: 'post',
				url:'/dmsg/MyPhp/edit_products.php',
				data:{ID:ID},
				async:false,
				success:function(data){
						$("#editprojectdetails").html(data);
						$("#EditModal").modal('show');
				}
		});
		
	});
	
	$(document).on('click','.update_prod',function(){
		
		  var ID = $('#IDedit').val();
		  var DeviceID = $('#DeviceIDedit').val().toUpperCase();
		  var Monicker =  $('#Monickeredit').val();
		  var PTI =  $('#PTI2edit').val().toUpperCase();
		  var Customer =  $('#Customeredit').val();
		  var DeviceOwner =  $('#DeviceOwneredit').val();
		  var ReleaseCode =  $('#ReleaseCodeedit').val().toUpperCase();
		  var WSLocation =  $('#WSLocationedit').val().toUpperCase();
		  var FTLocation =  $('#FTLocationedit').val().toUpperCase();
		  var AssemblyLocation =  $('#AssemblyLocationedit').val().toUpperCase();
		  var FABLocation =  $('#FABLocationedit').val().toUpperCase();
		  var PrimaryTDE =  $('#PrimaryTDEedit').val();
		  var ProgramManager =  $('#ProgramManageredit').val();   
		  
		  
		  
		  
		  $.ajax({
				type: 'post',
				url:'/dmsg/MyPhp/edit_products_save.php',
				data:{
					ID:ID,
					DeviceID:DeviceID,
					Monicker:Monicker,
					PTI:PTI,
					Customer:Customer,
					DeviceOwner:DeviceOwner,
					ReleaseCode:ReleaseCode,
					WSLocation:WSLocation,
					FTLocation:FTLocation,
					AssemblyLocation:AssemblyLocation,
					FABLocation:FABLocation,
					PrimaryTDE:PrimaryTDE,
					ProgramManager:ProgramManager
					
				
				},
				async:false,
				success:function(data){
					
						$("#productlist").load(location.href + " #productlist",function(){
							$("#tableAddprod").dataTable({
								"order": [[ 0, 'desc' ]]
							});
							
						});
						
						$("#EditModal").modal('hide');
						
						//Clear form input text....
					

						
				}
		});
			
	});
	
	
	$('#productlist').on('click','.del',function(){
		var ID = $(this).attr('id');
		$.ajax({
				type: 'post',
				url:'/dmsg/MyPhp/del_products_confirm.php',
				data:{ID:ID},
				async:false,
				success:function(data){
						$("#delproductdetails").html(data);
						$("#DelModal").modal('show');
				}
		});
		
	});
	
	
	$(document).on('click','.del_prod',function(){
		var ID = $('.del_unique').attr('id');
		$.ajax({
				type: 'post',
				url:'/dmsg/MyPhp/del_products.php',
				data:{ID:ID},
				async:false,
				success:function(data){
						$("#productlist").load(location.href + " #productlist",function(){
							$("#tableAddprod").dataTable({
								"order": [[ 0, 'desc' ]]
							});
							
						});
						
						$("#DelModal").modal('hide');
				}
		});
		
	});
</script>




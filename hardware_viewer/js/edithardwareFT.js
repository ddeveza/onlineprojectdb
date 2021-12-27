$(document).on('click','.view',function(){
		var ID = $(this).attr('id');
		

			$.ajax({
					type: 'post',
					url:'modal/modalUpdateHardware.php',
					data: {ID:ID}, 
					success:function(data){
						
						$('#editHardwareForm').html(data);
						$('#editHardware').modal('show');
							
					}

				});
		

	});



	//save the update form of hardware
	$(document).ready(function(){
		$('#editformFT').unbind('submit').bind('submit',function(event){
				event.preventDefault();

				//console.log($(this).serializeArray());

				var editFormdata = $(this).serialize();
				var cuhqualstatus = ($('#editcuhqualstatus').is(":checked"));
				var socqualstatus = ($('#editsocqualstatus').is(":checked"));

				
				var kitqualstatus = ($('#editKitqualStatus').is(":checked"));

				//alert(cuhqualstatus);

				var finaldata = editFormdata +
				'&cuhqualstatus=' + cuhqualstatus +
				'&socqualstatus=' + socqualstatus +
				'&kitqualstatus=' + kitqualstatus;

				//console.log(finaldata);

				$.ajax({
					type: 'post',
					url:'php/SaveEdithardwareFT.php',
					data: finaldata, 
					success:function(data){
						//alert(data);
						if(data == 1){
							//$('#Addhardware').modal('hide');


							
							FTTable.ajax.reload(null,false);
								
							//FTTable.column().order( 'desc' ).draw();
							//$('#formFT').trigger('reset'); //reset all form
							$('.editedsuccess').after('<div class="alert alert-success fadenow" role="alert">Hardware project has been updated</div>');
							$('.fadenow').fadeOut(4000);
							window.setTimeout(function (){$('#editHardware').modal('hide'); }, 1500);
							
						}
							
					}

				});

		});
	});
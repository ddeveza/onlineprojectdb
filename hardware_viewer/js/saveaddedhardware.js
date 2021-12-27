$(document).ready(()=>{
		//console.log('Hello');

		$('#formFT').unbind('submit').bind('submit', function(event){
				//
				
			event.preventDefault();

			var FTActive = $('#FinalTest1').is(':visible');
			var WSActive = $('#Sort1').is(':visible');
			
			if (FTActive) {

				var ftform = $('#formFT').serialize();
				var ftformarray = $('#formFT').serializeArray();
				
				var cuhqualstatus = ($('#defaultUnchecked14').is(":checked"));
				var socqualstatus = ($('#defaultUnchecked15').is(":checked"));

				
				var kitqualstatus = ($('#KitqualStatus').is(":checked"));


				var finaldata = ftform +
				'&cuhqualstatus=' + cuhqualstatus +
				'&socqualstatus=' + socqualstatus +
				'&kitqualstatus=' + kitqualstatus;
				
				//console.log(ftformarray);
				var validate=false;
				var deviceid=false;
				var packtype =false;
				var packsize =false;
				var leadcount = false;
				var handler =false;
				var cuh =false;
				var kitnewold =false;
				var traynewold =false;
				
				$('p.upper').remove();
				
				 $.each(ftformarray, function(i,val){
				 	
				 	if(val.name=='deviceid' ){
				 			if (val.value==''){
								$('input[name="'+val.name+'"]').after('<p class="alert alert-danger upper" role="alert">Please Enter Device ID</p>');
								$('#errormessage').append('<p class="alert alert-danger deviceid under" role="alert">Please Enter Device ID</p>');
								$('p.deviceid').fadeOut(5000);
							}else{
								deviceid = true;
							}

					}else if(val.name=='packtype' ){
							if (val.value==''){
								$('input[name="'+val.name+'"]').after('<p class="alert alert-danger upper" role="alert">Please Enter Package Type</p>');
								$('#errormessage').append('<p class="alert alert-danger packtype under" role="alert">Please Enter Package Type</p>');
								$('p.packtype').fadeOut(5000);
							}else{
								packtype = true;
							}
					}else if(val.name=='packsize'){
							if (val.value==''){
								$('input[name="'+val.name+'"]').after('<p class="alert alert-danger upper" role="alert">Please Enter Package Size</p>');
								$('#errormessage').append('<p class="alert alert-danger packsize under" role="alert">Please Enter Package Size</p>');
								$('p.packsize').fadeOut(5000);
							}else{
								packsize = true;
							}

					}else if(val.name=='leadcount' ){
							if(val.value==''){
								$('input[name="'+val.name+'"]').after('<p class="alert alert-danger upper" role="alert">Please Enter Lead Count</p>');
								$('#errormessage').append('<p class="alert alert-danger leadcount under" role="alert">Please Enter Lead Count</p>');
								$('p.leadcount').fadeOut(5000);
							}else{
								leadcount = true;
							}


					}else if(val.name=='handler' ){
							if(val.value==''){
								$('input[name="'+val.name+'"]').after('<p class="alert alert-danger upper" role="alert">Please Enter  Handler</p>');
								$('#errormessage').append('<p class="alert alert-danger handler under" role="alert">Please Enter  Handler</p>');
								$('p.handler').fadeOut(5000);
							}else{
								handler = true;
							}

					}else if(val.name=='cuhnewold' ){
							
							if(val.value==''){
								
								$('select[name="'+val.name+'"]').after('<p class="alert alert-danger upper" role="alert">CUH if existing or new?</p>');
								$('#errormessage').append('<p class="alert alert-danger cuhnewold under" role="alert">CUH existing or new?</p>');
								$('p.cuhnewold').fadeOut(5000);
							}else{
								cuh = true;
							}

					}
					/*else if(val.name=='kitnewold' ){
							
							if(val.value==''){
								
								$('select[name="'+val.name+'"]').after('<p class="alert alert-danger upper" role="alert">existing or new?</p>');
								$('#errormessage').append('<p class="alert alert-danger kitnewold under" role="alert">KIT existing or new?</p>');
								$('p.kitnewold').fadeOut(5000);
							}else{
								kitnewold = true;
							}

					}else if(val.name=='traynewold' ){
							
							if(val.value==''){
								
								$('select[name="'+val.name+'"]').after('<p class="alert alert-danger upper" role="alert">existing or new?</p>');
								$('#errormessage').append('<p class="alert alert-danger traynewold under" role="alert">Tray existing or new?</p>');
								$('p.traynewold').fadeOut(5000);
							}else{
								traynewold = true;
							}

					}*/

					

				
						
				});
					
					


			//console.log(validate);
			/*	ftform.push(
					{name:'cuhstackattrans' , value:cuhstackattrans},
					{name:'cuhzstock' , value:cuhzstock},
					{name:'cuhdiecrack' , value:cuhdiecrack},
					{name:'cuhtoolmark' , value:cuhtoolmark},
					{name:'cuhcorr' , value:cuhcorr},
					{name:'cuhxcorr' , value:cuhxcorr},
					{name:'cuheyield' , value:cuheyield},
					{name:'cuhjam' , value:cuhjam}

					var validate=false;
				var deviceid=false;
				var packtype =false;
				var packsize =false;
				var leadcount = false;
				var handler =false;

					); */
				//var jsonString = JSON.stringify(finaldata);
				//console.log(ftformarray);

					if (deviceid&&packtype&&packsize&&leadcount&&handler&&cuh){ //validate here will check if device_ID is not empy , 
							$('.addedsuccess').after('<div class="alert alert-success fadenow" role="alert">Loading.....</div>');
							$("#AddHardware").css("cursor", "progress");
							$('#addhardware').attr("disabled", true);
							$.ajax({
								type: 'post',
								url:'php/AddhardwareFT.php',
								data: finaldata, 
								success:function(data){

									//alert(data);
									$('.fadenow').remove();
									if(data == 1){
										//$('#Addhardware').modal('hide');


										
										FTTable.ajax.reload(function(json){

											console.log(json);
										}).column().order( 'desc' ).draw();;
										//FTTable.column().order( 'desc' ).draw();
										$('#formFT').trigger('reset'); //reset all form
										$("#AddHardware").css("cursor", "default");
										$('.addedsuccess').after('<div class="alert alert-success fadenow" role="alert">Hardware project has been added</div>');
										$('.fadenow').fadeOut(4000);
										$('#addhardware').attr("disabled", false);
										window.setTimeout(function (){$('#AddHardware').modal('hide'); }, 2000);
										
									}
										
								}

							});
						}
				

			}
			else if (WSActive)/*If sort is active */ {
				var wsform = $('#formFT').serialize();
				var wsformarray = $('#formFT').serializeArray();

				console.log(wsformarray);


				var pcdeviceid=false;
				var pcprobetech=false;
				 $.each(wsformarray, function(i,val){
				 	
				 	if(val.name=='deviceid' ){
				 			if (val.value==''){
								$('input[name="'+val.name+'"]').after('<p class="alert alert-danger deviceid" role="alert">Please Enter Device ID</p>');
								$('#errormessage').append('<p class="alert alert-danger deviceid" role="alert">Please Enter Device ID</p>');
								$('p.deviceid').fadeOut(4000);
							}else{
								pcdeviceid = true;
							}

					}else if(val.name=='probetech'){
							if (val.value==''){
								$('input[name="'+val.name+'"]').after('<p class="alert alert-danger probetech" role="alert">Please Enter PC Technology</p>');
								$('#errormessage').append('<p class="alert alert-danger probetech" role="alert">Please Enter PC Technology</p>');
								$('p.probetech').fadeOut(4000);
							}else{
								pcprobetech = true;
							}

					}

					

				
						
				});





				 

				



				 	if( pcdeviceid && pcprobetech){

				 		$('.addedsuccess').after('<div class="alert alert-success fadenow" role="alert">Loading.....</div>');
				 		$("#AddHardware").css("cursor", "progress");
				 		$('#addhardware').attr("disabled", true);

						$.ajax({
								type: 'post',
								url:'php/AddhardwareWS.php',
								data: wsform, 
								success:function(data){
									$('.fadenow').remove();
									//alert(data);
									if(data == 1){

										WSTable.ajax.reload(function(json){

											console.log(json);
										}).column().order( 'desc' ).draw();;
										//FTTable.column().order( 'desc' ).draw();
										$('#formFT').trigger('reset'); //reset all form
										$("#AddHardware").css("cursor", "default");
										$('.addedsuccess').after('<div class="alert alert-success fadenow" role="alert">Hardware project has been added</div>');
										$('.fadenow').fadeOut(4000);
										$('#addhardware').attr("disabled", false);
										window.setTimeout(function (){$('#AddHardware').modal('hide'); }, 2000);


										
										
										
									}
										
								}

							});
				 	}
			}else{
					
				alert('Please choose if FT or WS');
			}
			
		});






	});
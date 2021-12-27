



$('#FTTable,#WSTable').hide();


	$('.selecttable').change(()=>{
		var selecttable1=$('select.selecttable').children("option:selected").val();
		

			if (selecttable1 == 'FT'){
				
				$('#FTTable').show();
				$('#WSTable').hide();

				
			}else if(selecttable1 == 'WS'){
				
				$('#FTTable').hide();
				$('#WSTable').show();
			}else{

				$('#FTTable,#WSTable').show();
			}



	})
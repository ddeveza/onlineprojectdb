$(document).ready(()=> {




	$('#HardwareSort').hide();
	$('#HardwareFT').hide();


	$("input[name='Location']").click(function(){

            var radioValue = $("input[name='Location']:checked").val();
                // alert(radioValue)      ;
            if(radioValue =='SORT'){

				$('#HardwareSort').show();
				$('#HardwareFT').hide();
            }else if(radioValue=="FT"){

				$('#HardwareSort').hide();
				$('#HardwareFT').show();
            }
            
        });
		
	
	
	  
	


	
});
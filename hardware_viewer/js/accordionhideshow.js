$(document).ready(()=>{
			

//----------Hide Show FT/WS Component---------->

			$('.addhardware').click(()=>{
					$('#accordion').hide();
					
			});

			$('.FT').click(()=>{
				
				$('#accordion').show();
				$('#Sort1').hide();
				$('#FinalTest1').show();
			});

			$('.WS').click(()=>{

				$('#accordion').show();
				$('#Sort1').show();
				$('#FinalTest1').hide();
				
				
			
			});

//<!------Collapsall Accordion---->

		var Current = $('#collapseAll').click(()=>{
		
				$('#collapseAll').toggleClass('fa fa-angle-double-down   fa fa-angle-double-right');

				var statusCollap = $('#collapseAll').hasClass('fa fa-angle-double-right');
		
				if (statusCollap) $('.collapse').addClass('show');
				else $('.collapse').removeClass('show');
				
				
			});

});
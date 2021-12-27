
<?php



$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli)); 
$result = $mysqli->query("SELECT * FROM history") or die($mysqli -> error);



/******************************************************************REVISION*********************************************************************
	
	RevA	3/05/2020		Dennis 			Initial Release


















																																					*/

?>



<!DOCTYPE html>

<html >

<head>
	<title>Hardware Report</title>


		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  		
		<script src="https://kit.fontawesome.com/b4a90c5c05.js" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	  	<script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>


	  	<!---Datatable Header---->
	  	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
  		<script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>


</head>




<body>
		<!--Welcome Note -->
	

<!---End of Modal Update Hardware--->



<div>
	<button id='ButtonBarcode'></button>
		<input type="text" name="" id='Den'>Den
	<input type="text" name="" id='Barcode'>Dennis
</div>

<?php
	include'..\dmsg/inc/footer.php'; 
?>


</body>
</html>

<!-- pandel footer start -->
		
<script type="text/javascript">
	$(document).ready(()=>{
			$('.addhardware').click(()=>{
					$('#accordion').hide();
					
			});

			$('.FT').click(()=>{
				
				$('#accordion').show();
				$('#Sort').hide();
				$('#FinalTest').show();
			});

			$('.WS').click(()=>{

				$('#accordion').show();
				$('#Sort').show();
				$('#FinalTest').hide();
				
				
			
			});

	});


</script>


<script type="text/javascript">
	var Current = $('#collapseAll').click(()=>{
		
		$('#collapseAll').toggleClass('fa fa-angle-double-down   fa fa-angle-double-right');

		var statusCollap = $('#collapseAll').hasClass('fa fa-angle-double-right');
		
				if (statusCollap) $('.collapse').addClass('show');
				else $('.collapse').removeClass('show');
				
				
	});




	

</script>


<script type="text/javascript">
	
	var HardwareTable = $('#hardwaretable').DataTable({


		 "processing" : true,
		dom: 'lBfrtip',
		   buttons: [ 
                     {
                        extend: 'excelHtml5',
                        title: 'Data export'
                    }, 'csv', 'copy','print'
		   ],
		"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ] 
		   
		  
	});

</script>

<script type="text/javascript">
	//var status = ($('#defaultUnchecked1').is(":checked"));

	//alert(status);
</script>


<script type="text/javascript">


	var dennis = $('#Den').val();

	



	$('#Barcode').on('keyup', function(){
    	
          
    		if($(this).val() != ''){

    			$

    		}
           
             			
            	
             	
           
             
          	
        
        
    });
	
	

</script>


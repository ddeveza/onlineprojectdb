
 <?php require('../dmsg/Ianhome.php'); ?>

 <head>
  <title>Export jQuery Datatables Data to Excel, CSV, PDF using PHP Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>

  <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js">
  </script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

 </head>
 <style type="text/css">
	 	td.details-control {
	    background: url('../resources/details_open.png') no-repeat center center;
	    cursor: pointer;
	}
	tr.shown td.details-control {
	    background: url('../resources/details_close.png') no-repeat center center;
	}
 </style>
<body>


	<table id="example" class="display">
		<thead>
			<tr>
				
				<th>Project_Name</th>
				<th>Project_ID</th>
			</tr>
		</thead>
		
		<tfoot>
			<tr>
				
				<th>Project_Name</th>
				<th>Project_ID</th>
			</tr>
		</tfoot>
	</table>
	
	</body>
</html>

<script type="text/javascript">

$(document).ready(function(){

  table = $('#example').DataTable({
		 
     
        'ajax': '/dmsg/testing.php',
        'order' :[],
         initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select name="wgtmsr" id="wgtmsr" style="width: 100px !important; min-width: 100px; max-width: 50px;><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
				select.append('<option value="">All</option>')
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        } 
         
   	
	}); 


  	table.$('.Dennis').click(function(){

  		alert('dennis');
  	});



});

</script>


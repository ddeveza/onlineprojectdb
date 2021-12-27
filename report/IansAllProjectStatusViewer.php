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
<body>
	<div id='dennis'>
	<table id="example"  class="uk-table uk-table-hover uk-table-striped" style="width:100%" >
		<thead><tr>
			   
                <th>Project ID</th>
                <th>Engineer</th>
                <th>Projec Name</th>
                <th>Device ID</th>
                 <th>Project Status</th>
                <th>YearWeek</th>
                <th>Weekly Status Update</th>
                <th>Remarks</th>
                 
                
            </tr>
		
	</thead>
		<tbody>
					<?php 
           			include 'D:\xampp\htdocs\dmsg\config\config.php';
					$sql = "create TEMPORARY TABLE dennis  \n"

				    . "SELECT concatyrww.*\n"

				    . "from concatyrww\n"

				    . "inner JOIN getmaxdate\n"

				    . "on concatyrww.Project_ID = getmaxdate.Project_ID and concatyrww.yearweek = getmaxdate.maxyear";

				    mysqli_query($con,$sql);

				    //echo  mysqli_query($con,$sql);

				    $projsql = "SELECT * \n"

					    . "FROM projects f\n"

					    . "LEFT JOIN dennis w\n"

					    . "on f.Project_ID = w.project_id";



					$result = mysqli_query($con,$projsql);
					
					while($row=mysqli_fetch_array($result)){
						$Engineer = $row['OSPI_Test_Engineer'];
						$ProjName = $row['Project_Name'];
						$deviceID = $row['Device_ID'];
						$Workweek = $row['yearweek'];
						$StatusUpdate = $row['Detailed_Status_Update'];
						$Remarks = $row['Weekly_Remarks'];
						$ProjectID = $row['Project_ID'];
						$ProjStatus = $row['Project_Status'];
					?>
					<tr>
						<td witdth="10%"><?php echo $ProjectID;  ?></td>
						<td witdth="10%"><?php echo $Engineer;  ?></td>
						<td witdth="10%"><?php echo $ProjName ; ?></td>
						<td witdth="10%"><?php echo $deviceID  ;?></td>
						<td witdth="10%"><?php echo $ProjStatus  ;?></td>
						<td witdth="10%"><?php echo $Workweek  ;?></td>
					
					
						<td witdth="10%"><?php echo $StatusUpdate;  ?></td>
							<td witdth="10%" id="data"><textarea rows="3" cols="50"  id="<?php echo $ProjectID ?>"><?php echo $Remarks;  ?></textarea></td>

					</tr>

				<?php } ?>

        </tbody>
        <tfoot>
            <tr>
                <th>Project ID</th>
                <th>Engineer</th>
                <th>Projec Name</th>
                <th>Device ID</th>
                <th>Project Status</th>
                <th>YearWeek</th>
                <th>Weekly Status Update</th>
                <th>Remarks</th>
                 
              
               
            </tr>
        </tfoot>
	</table>
	
	</div>	
	
</body>
</html>


<script type="text/javascript" language="javascript">
	

$(document).ready(function() {
    $('#example').DataTable( {
    	
          "processing" : true,
		   dom: 'lBfrtip',
		   buttons: [ 
                     {
                        extend: 'excelHtml5',
                        title: 'Data export'
                    }, 'csv', 'copy','print'
		   ],
		   
		   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ] ,
		    initComplete: function () {
            this.api().columns([1,4]).every( function () {
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
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        } 
		  
   		 });

		
  
});
</script>

<script type="text/javascript">
	
			$('textarea').blur(function(){
				var UniqueId =  $(this).attr('id');
				var Remarks = $('textarea').val();


			});
	
</script>




var FTTable;
var WSTable;



WSTable = $('#SortTable1').DataTable({

          'select': true,
         "processing" : true,
         'ajax' : {
                "url" : "/dmsg/hardware/php/fetchdataWS.php",
                
          },
          dom: 'lBfrtip',
          buttons: [ 
                     {
                        extend: 'excelHtml5',
                        title: 'hardwareWS'
                    }
           ],
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
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
                            .search( val, true, false )
                            .draw();
                    } );
                //FIlter engineername
                /*const FetchEngineer = column.data().unique().sort().map(function(a){
                                        var dennis = a.indexOf(',');
                                            if (dennis>0){
                                                return a.substr(0,dennis);
                                            }else{ return a;}
                                    }).unique();*/

                //console.log(FetchEngineer);
                select.append('<option value="">All</option>');
                //FetchEngineer.each( function ( d, j ) {
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
               // } );
            } );
        } 
           
          
    });

 FTTable = $('#FinalTestTable').DataTable({





 		/* "columnDefs": [
   				 { "visible": false, "targets": 0 }
 		 ],*/
         'select': true,
		"processing" : true,
		'ajax' : {
    			"url" : "/dmsg/hardware/php/fetchdataFT.php",
    			
    		},
    	
		dom: 'lBfrtip',
		buttons: [ 
                     {
                        extend: 'excelHtml5',
                        title: 'FTHardware'
                    }
		   	],
		"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
		  
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
                            .search( val, true, false )
                            .draw();
                    } );
				//FIlter engineername
				/*const FetchEngineer = column.data().unique().sort().map(function(a){
										var dennis = a.indexOf(',');
											if (dennis>0){
												return a.substr(0,dennis);
											}else{ return a;}
									}).unique();*/

				//console.log(FetchEngineer);
				select.append('<option value="">All</option>');
                //FetchEngineer.each( function ( d, j ) {
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
               // } );
            } );
        } 
		   
		  
	});

 




 /*var tdvalue = $('#FinalTestTable').on( 'click', 'tbody td:not(:first-child)', function (e) {
       			$(this).html(' <input type="text" value="Dennis">');
    } );
 */

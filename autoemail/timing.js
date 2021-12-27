var FTTable;
var WSTable;

var WW;
var year = new Date().getFullYear();

function getNumberOfWeek() {
    const today = new Date();
    const firstDayOfYear = new Date(today.getFullYear(), 0, 1);
    const pastDaysOfYear = (today - firstDayOfYear) / 86400000;
    return Math.ceil((pastDaysOfYear + firstDayOfYear.getDay() + 1) / 7);
}

WW = getNumberOfWeek()-1;
var s = new Date();


WSTable = $('#SortTable1').DataTable({

          'select': true,
         "processing" : true,
         'ajax' : {
                "url" : "/dmsg/hardware/php/fetchdataWS.php",
                
          },
          /*dom: 'lBfrtip',
          buttons: [ 
                     {
                        extend: 'excelHtml5',
                       title: 'hardwareWS_'+year+'WW'+s.getMinutes()
                       
                    }
           ],*/
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
    	
		/*dom: 'lBfrtip',
		buttons: [ 
                     {
                        extend: 'excelHtml5',
                        title: 'FTHardware_'+year+'WW'+WW
                    }
		   	],*/
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

var prevWW = '';
var newWW;
var downloadTrigger = 0;

function TriggerDownload () {

   WW = getNumberOfWeek()-1;
    new $.fn.DataTable.Buttons(WSTable , {
        buttons: [ 
                     {
                        extend: 'excelHtml5',
                        title: 'hardwareWS_'+year+'WW'+ WW
                    }
            ]
    })
     new $.fn.DataTable.Buttons(FTTable , {
        buttons: [ 
                     {
                        extend: 'excelHtml5',
                        title: 'FTHardware_'+year+'WW'+WW
                    }
            ]
    })



     WSTable.ajax.reload(function(){
        WSTable.button( '.buttons-html5' ).trigger();
    });

    FTTable.ajax.reload(function(){
        FTTable.button( '.buttons-html5' ).trigger();
    });
    downloadTrigger = 1;

     $.ajax({
                type: 'post',
                url:'sendmail.php',
                data: {downloadTrigger:downloadTrigger}, 
                success:function(data){

                  //console.log(data); //log triggered if email successfuly sent
                  trigger = 0;
                    
                }

      });

};


function recurringEmail() {
    (function loop() {
        var now = new Date();
        console.log(now);
        if (now.getDay() === 1 && now.getHours() ===9 && now.getMinutes() === 30) {
            //added this to get the latest data from the database
          
            
           TriggerDownload();
          
           //console.log(downloadTrigger);
        }
        now = new Date();                  // allow for time passing
        var delay = 60000 - (now % 60000); // exact ms to next minute interval
        downloadTrigger = 0 ; ///return back to 0 , to send the email once only
        setTimeout(loop, delay);
        
    })();
}


recurringEmail();



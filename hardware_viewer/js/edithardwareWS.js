$(document).on('click','.viewWS',function(){
    var ID = $(this).attr('id');
    

      $.ajax({
          type: 'post',
          url:'modal/modalUpdateHardwareWS.php',
          data: {ID:ID}, 
          success:function(data){
            
            $('#editHardwareFormWS').html(data);
            $('#editHardwareWS').modal('show');
              
          }

        });
    

  });



  $(document).ready(function(){
    $('#editformWS').unbind('submit').bind('submit',function(event){
        event.preventDefault();

        //console.log($(this).serializeArray());

        var editFormdataws = $('#editformWS').serialize();
       

        //alert(cuhqualstatus);

        

     

        $.ajax({
          type: 'post',
          url:'php/SaveEdithardwareWS.php',
          data: editFormdataws, 
          success:function(data){
            //alert(data);
            if(data == 1){
              //$('#Addhardware').modal('hide');

              //alert(data);
              
              WSTable.ajax.reload(null,false);
                
              //FTTable.column().order( 'desc' ).draw();
              //$('#formFT').trigger('reset'); //reset all form
              $('.editedsuccess').after('<div class="alert alert-success fadenow" role="alert">Hardware project has been updated</div>');
              $('.fadenow').fadeOut(4000);
              window.setTimeout(function (){$('#editHardwareWS').modal('hide'); }, 1500);
              
            }
              
          }

        });

    });
  });

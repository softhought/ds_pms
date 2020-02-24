$(document).ready(function(){

$('input.timepicker2').timepicker();


  var basepath = $("#basepath").val();
       
   

$("#dishbaby_gender").change(function(){

 var value = $('#dishbaby_gender option:selected').text();

  if(value == 'Male'){

  	$("#babygender").text('Boy');

   }else if(value == 'Female'){

        $("#babygender").text('Girl');

   }else if(value == 'Other') {

     $("#babygender").text('Other');     

   }else if(value == 'Not Known'){

        $("#babygender").text('Not Known');    
                                          	
   }


});
  

 $('.datepicker').bootstrapMaterialDatePicker({
                    format: 'DD-MM-YYYY',
                    clearButton: true,
                    weekStart: 1,
                    time: false
  });



  $(document).on('submit','#dischargeform',function(event)
    {
        event.preventDefault();
        

            var formDataserialize = $("#dischargeform").serialize();
            formDataserialize = decodeURI(formDataserialize);
            //console.log(formDataserialize);

            var formData = {formDatas: formDataserialize };
            $(".dishchargebtn").css('display', 'none');
            $(".dischargeloaderbtn").css('display', 'block');
        

        $.ajax({
                type: "POST",
                url: basepath+'discharge/discharge_action',
                dataType: "json",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: formData,
                
                success: function (result) {
                    
                    if (result.msg_status == 1) {

                    $("#dischargeId").val(result.insertId);
                    $(".dishchargebtn").removeClass("btn-danger");
                    $(".dishchargebtn").addClass("btn-primary");
                    $(".dishchargebtn").html('Updated');
                            
                  
                    } 
                    else {
                     //   $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $(".dischargeloaderbtn").css('display', 'none');
                    
                    $(".dishchargebtn").css({
                        "display": "block",
                        "margin": "0 auto"
                    });
                  
                }, 
                error: function (jqXHR, exception) {
                  var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                   // alert(msg);  
                }
            }); /*end ajax call*/

       
        
    });



   

});

/* claculate weeks days by USG  */ 



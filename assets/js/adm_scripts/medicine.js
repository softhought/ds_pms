$(document).ready(function(){
    var basepath = $("#basepath").val();
    var rowNoUpload = 0;
     var mode = $("#mode").val();
   $('.dataTables').DataTable();
     


   $(document).on("click", ".medstatus", function() {
        
        var uid = $(this).data("medicineid");
        var status = $(this).data("setstatus");
        var url = basepath + 'medicine/setStatus';
        setActiveStatus(uid, status, url);

    });


   /* add edit medicine */


    $(document).on('submit','#medicineForm',function(event)
    {
        event.preventDefault();
        if(validatemedicine())
        {   

            var formDataserialize = $("#medicineForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $("#medicinesavebtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'medicine/medicine_action',
                dataType: "json",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: formData,
                
                success: function (result) {
                    
                    if (result.msg_status == 1) {
                            
                        $("#suceessmodal").modal({
                            "backdrop": "static",
                            "keyboard": true,
                            "show": true
                        });
                        var addurl = basepath + "medicine/addMedicine";
                        var listurl = basepath + "medicine";
                        $("#responsemsg").text(result.msg_data);
                        $("#response_add_more").attr("href", addurl);
                        $("#response_list_view").attr("href", listurl);

                    } 
                    else {
                        $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $("#loaderbtn").css('display', 'none');
                    
                    $("#medicinesavebtn").css({
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

        
        	

        }   // end master validation


        
    });

}); // end of document ready




function validatemedicine()
{
    var medicinename = $("#medicinename").val();
  

    $("#medicinemsg").text("").css("dispaly", "none").removeClass("form_error");

    if(medicinename=="")
    {
        $("#medicinename").focus();
        $("#medicinemsg")
        .text("Error : Enter medicine name .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }
 
    return true;
}
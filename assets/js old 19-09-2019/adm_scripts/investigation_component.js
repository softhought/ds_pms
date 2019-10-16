$(document).ready(function(){
    var basepath = $("#basepath").val();
    var rowNoUpload = 0;
     var mode = $("#mode").val();
   $('.dataTables').DataTable();
     





   /* add edit Complication */


    $(document).on('submit','#investigationForm',function(event)
    {
        event.preventDefault();
        if(validatInvestigation())
        {   

            var formDataserialize = $("#investigationForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $("#investigationsavebtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'investigationcomponent/investigation_action',
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
                        var addurl = basepath + "investigationcomponent/addInvestigation";
                        var listurl = basepath + "investigationcomponent";
                        $("#responsemsg").text(result.msg_data);
                        $("#response_add_more").attr("href", addurl);
                        $("#response_list_view").attr("href", listurl);

                    } 
                    else {
                        $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $("#loaderbtn").css('display', 'none');
                    
                    $("#investigationsavebtn").css({
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




function validatInvestigation()
{
    var inv_component_name = $("#inv_component_name").val();
  

    $("#investigationmsg").text("").css("dispaly", "none").removeClass("form_error");

    if(inv_component_name=="")
    {
        $("#inv_component_name").focus();
        $("#investigationmsg")
        .text("Error : Enter Investigation .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }
 
    return true;
}
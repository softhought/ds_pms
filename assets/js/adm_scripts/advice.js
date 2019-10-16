$(document).ready(function(){
    var basepath = $("#basepath").val();
    var rowNoUpload = 0;
     var mode = $("#mode").val();
   $('.dataTables').DataTable();

   if(mode=="EDIT"){
    var chk_option = $("#chk_option").val();
    var week_chk_option = $("#week_chk_option").val();

    if(chk_option=="Y"){
        $(".optionrow").css('display', 'block');
    }else{
        $(".optionrow").css('display', 'none');
    }

    if(week_chk_option=="Y"){
        $(".wkminmax").css('display', 'block');
    }else{
        $(".wkminmax").css('display', 'none');
    }

   }
     


   $(document).on("click", ".advstatus", function() {
        
        var uid = $(this).data("adviceid");
        var status = $(this).data("setstatus");
        var url = basepath + 'advice/setStatus';
        setActiveStatus(uid, status, url);

    });


   /* add edit medicine */


    $(document).on('submit','#adviceForm',function(event)
    {
        event.preventDefault();
        if(validateAdvice())
        {   

            var formDataserialize = $("#adviceForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $("#advicesavebtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'advice/advice_action',
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
                        var addurl = basepath + "advice/addAdvice";
                        var listurl = basepath + "advice";
                        $("#responsemsg").text(result.msg_data);
                        $("#response_add_more").attr("href", addurl);
                        $("#response_list_view").attr("href", listurl);

                    } 
                    else {
                        $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $("#loaderbtn").css('display', 'none');
                    
                    $("#advicesavebtn").css({
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


    $(document).on('change','#need_adv_opt',function(event)
    {
        event.preventDefault();
        // From the other examples
        if (this.checked) {
            $(".optionrow").css('display', 'block');
        }else{
            $(".optionrow").css('display', 'none');
        }
    });

   $(document).on('change','#need_week_opt',function(event)
    {
        event.preventDefault();
        // From the other examples
        if (this.checked) {
            $(".wkminmax").css('display', 'block');
        }else{
            $(".wkminmax").css('display', 'none');
        }
    });

}); // end of document ready




function validateAdvice()
{
    var advice = $("#advice").val();
    advice = advice.trim();
    var advice_type = $("#advice_type").val();
  
    $("#advicemsg").text("").css("dispaly", "none").removeClass("form_error");

    if(advice=="")
    { 
        $("#advice").focus();
        $("#advicemsg")
        .text("Error : Enter advice note .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if(advice_type=="0")
    { 
        $("#advice_type").focus();
        $("#advicemsg")
        .text("Error : Select advice type .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }
 
    return true;
}
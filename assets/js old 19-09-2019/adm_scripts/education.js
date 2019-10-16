$(document).ready(function(){

 var basepath = $("#basepath").val();
 var rowNoUpload = 0;
 var mode = $("#mode").val();
 $('.dataTables').DataTable();

 $(document).on("click", ".edustatus", function() {
        
        var uid = $(this).data("educationid");
        var status = $(this).data("setstatus");
        var url = basepath + 'education/setStatus';
        setActiveStatus(uid, status, url);

    });
$("#educationname").on('keyup',function(){

   if(mode == 'ADD'){
    $("#educationmsg").css("display","none");
    $("#occupationsavebtn").attr("disabled", false);
    var education = this.value;
    
    $.ajax({
        type: "POST",
        url: basepath+'education/education_check',
        data:{education:education},
        dataType: 'json',
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        success:function(result){
            
            if (result.msg_status == 1) {

                $("#educationsavebtn").attr("disabled", true);

             $("#educationmsg")
                .text(result.msg_data)
                .addClass("form_error")
                .css("display", "block");
                return false;
            }
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
                //alert(msg);  
                }


    });
 }
})

 $(document).on('submit','#educationForm',function(event)
    {
    	event.preventDefault();
        if(validateeducation())
        {   

            var formDataserialize = $("#educationForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $("#educationsavebtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'education/education_action',
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
                        var addurl = basepath + "education/addEducation";
                        var listurl = basepath + "education";
                        $("#responsemsg").text(result.msg_data);
                        $("#response_add_more").attr("href", addurl);
                        $("#response_list_view").attr("href", listurl);

                    } 
                    else {
                        $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $("#loaderbtn").css('display', 'none');
                    
                    $("#educationsavebtn").css({
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




function validateeducation()
{
  
    var educationname = $("#educationname").val();
   

    $("#educationmsg").text("").css("dispaly", "none").removeClass("form_error");

    if(educationname=="")
    {
        $("#educationname").focus();
        $("#educationmsg")
        .text("Error : Enter education name .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }
 
    return true;
}


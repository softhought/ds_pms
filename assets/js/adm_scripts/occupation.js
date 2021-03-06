$(document).ready(function(){

 var basepath = $("#basepath").val();
 var rowNoUpload = 0;
 var mode = $("#mode").val();
 $('.dataTables').DataTable();

 $(document).on("click", ".occustatus", function() {
        
        var uid = $(this).data("occupationid");
        var status = $(this).data("setstatus");
        var url = basepath + 'occupation/setStatus';
        setActiveStatus(uid, status, url);

    });
 $(document).on('submit','#occupationForm',function(event)
    {
    	event.preventDefault();
        if(validateoccupation())
        {   

            var formDataserialize = $("#occupationForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $("#occupationsavebtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'occupation/occupation_action',
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
                        var addurl = basepath + "occupation/addOccupation";
                        var listurl = basepath + "occupation";
                        $("#responsemsg").text(result.msg_data);
                        $("#response_add_more").attr("href", addurl);
                        $("#response_list_view").attr("href", listurl);

                    } 
                    else {
                        $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $("#loaderbtn").css('display', 'none');
                    
                    $("#occupationsavebtn").css({
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



$("#occupationename").on('keyup',function(){
    if(mode == 'ADD'){
    $("#occupationemsg").css("display","none");
    $("#occupationsavebtn").attr("disabled", false);
	var occupation = this.value;
	
	$.ajax({
		type: "POST",
        url: basepath+'occupation/occupation_check',
		data:{occupation:occupation},
		dataType: 'json',
	    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		success:function(result){
			
			if (result.msg_status == 1) {

				$("#occupationsavebtn").attr("disabled", true);

             $("#occupationemsg")
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

}); // end of document ready




function validateoccupation()
{

    var occupationename = $("#occupationename").val();
   

    $("#occupationemsg").text("").css("dispaly", "none").removeClass("form_error");

    if(occupationename=="")
    {
        $("#occupationename").focus();
        $("#occupationemsg")
        .text("Error : Enter occupation name .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }
 
    return true;
}


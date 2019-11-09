$(document).ready(function(){

 var basepath = $("#basepath").val();
 var rowNoUpload = 0;
 var mode = $("#mode").val();
 $('.dataTables').DataTable();


 $(document).on('submit','#surgeryForm',function(event)
    {
    	event.preventDefault();
        if(validatesurgery())
        {   

            var formDataserialize = $("#surgeryForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $("#surgerysavebtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'surgery/surgeryaction',
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
                        var addurl = basepath + "surgery/addsurgery";
                        var listurl = basepath + "surgery";
                        $("#responsemsg").text(result.msg_data);
                        $("#response_add_more").attr("href", addurl);
                        $("#response_list_view").attr("href", listurl);

                    } 
                    else {
                        $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $("#loaderbtn").css('display', 'none');
                    
                    $("#surgerysavebtn").css({
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



$("#surgeryname").on('keyup',function(){
    if(mode == 'ADD'){
    $("#surgerymsg").css("display","none");
    $("#surgerysavebtn").attr("disabled", false);
	var surgery = this.value;
	
	$.ajax({
		type: "POST",
        url: basepath+'surgery/surgery_check',
		data:{surgery:surgery},
		dataType: 'json',
	    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		success:function(result){
			
			if (result.msg_status == 1) {

				$("#surgerysavebtn").attr("disabled", true);

             $("#surgerymsg")
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




function validatesurgery()
{

    var surgeryname = $("#surgeryname").val();
   

    $("#surgerymsg").text("").css("dispaly", "none").removeClass("form_error");

    if(surgeryname=="")
    {
        $("#surgeryname").focus();
        $("#surgerymsg")
        .text("Error : Enter Surgery Name .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }
 
    return true;
}


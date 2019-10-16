$(document).ready(function(){

 var basepath = $("#basepath").val();
 var rowNoUpload = 0;
 var mode = $("#mode").val();
 $('.dataTables').DataTable();

 
 $(document).on('submit','#medicenecategorForm',function(event)
    {
    	event.preventDefault();
        if(validatemedicinecategory())
        {   

            var formDataserialize = $("#medicenecategorForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $("#madcatsavebtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'medicinecategory/medicineCategoryaction',
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
                        var addurl = basepath + "medicinecategory/addMedicineCategory";
                        var listurl = basepath + "medicinecategory";
                        $("#responsemsg").text(result.msg_data);
                        $("#response_add_more").attr("href", addurl);
                        $("#response_list_view").attr("href", listurl);

                    } 
                    else {
                        $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $("#loaderbtn").css('display', 'none');
                    
                    $("#madcatsavebtn").css({
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



$("#medicinename").on('keyup',function(){
    if(mode == 'ADD'){
    $("#madcatmsg").css("display","none");
    $("#madcatsavebtn").attr("disabled", false);
	var madicinecategory = this.value;
	
	$.ajax({
		type: "POST",
        url: basepath+'medicinecategory/medicine_category_check',
		data:{madicinecategory:madicinecategory},
		dataType: 'json',
	    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		success:function(result){
			 //console.log(result);
			if (result.msg_status == 1) {

				$("#madcatsavebtn").attr("disabled", true);

             $("#madcatmsg")
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




function validatemedicinecategory()
{

    var medicinename = $("#medicinename").val();
   

    $("#madcatmsg").text("").css("dispaly", "none").removeClass("form_error");

    if(medicinename=="")
    {
        $("#medicinename").focus();
        $("#madcatmsg")
        .text("Error : Enter Medicine Category.")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }
 
    return true;
}


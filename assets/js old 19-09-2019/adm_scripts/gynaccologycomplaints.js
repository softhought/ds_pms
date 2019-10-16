$(document).ready(function(){
    var basepath = $("#basepath").val();
    
     var mode = $("#mode").val();

 $('.dataTables').DataTable();
    $(document).on('change','#is_parrent',function(event)
    {
        event.preventDefault();

        var is_parrent = $(this).val();
        //alert(is_parrent);
        if (is_parrent == 'C') {
            $(".optionrow").css('display', 'block');
        }else{
            $(".optionrow").css('display', 'none');
        }
    });

    $(document).on('submit','#gyncomplaintForm',function(event)
    {
        event.preventDefault();
        if(validateform())
        {   

            var formDataserialize = $("#gyncomplaintForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            //console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $("#gyncomplaintsavebtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'chiefcomplaint/addEditaction',
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
                        var addurl = basepath + "chiefcomplaint/addComplaint";
                        var listurl = basepath + "chiefcomplaint";
                        $("#responsemsg").text(result.msg_data);
                        $("#response_add_more").attr("href", addurl);
                        $("#response_list_view").attr("href", listurl);

                    } 
                    else {
                        $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $("#loaderbtn").css('display', 'none');
                    
                    $("#gyncomplaintsavebtn").css({
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

    $("#complaintsname").on('keyup',function(){
    if(mode == 'ADD'){
    	
    $("#gyncomplaintmsg").css("display","none");
    $("#gyncomplaintsavebtn").attr("disabled", false);
	var complaintname = this.value;
	
	$.ajax({
		type: "POST",
        url: basepath+'chiefcomplaint/complaintname_check',
		data:{complaintname:complaintname},
		dataType: 'json',
	    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		success:function(result){
			
			if (result.msg_status == 1) {

				$("#gyncomplaintsavebtn").attr("disabled", true);

             $("#gyncomplaintmsg")
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

  });   


function validateform(){

 var complaintsname = $("#complaintsname").val();
 var is_parrent = $("#is_parrent").val();
 var parrent_id = $("#pname").val();
 var pnametext = $('#pname').children("option:selected").text()
 var mode = $("#mode").val();
 
 
 $("#gyncomplaintmsg").text("").css("dispaly", "none").removeClass("form_error");

    if(complaintsname=="")
    {
        $("#complaintsname").focus();
        $("#gyncomplaintmsg")
        .text("Error : Enter Chief Complaint name .")
        .addClass("form_error")
        .css("display", "block");
       return false;
    }
     if(is_parrent=="C")

    {

    	if(parrent_id == "0"){

        $("#pname").focus();
        $("#gyncomplaintmsg")
        .text("Error : Select Parrent Name .")
        .addClass("form_error")
        .css("display", "block");
        return false;

      }
     
   if(mode == 'EDIT'){
   
    	if(complaintsname == pnametext){

        $("#pname").focus();
        $("#gyncomplaintmsg")
        .text("Error : Do Not Select Same Parrent Name .")
        .addClass("form_error")
        .css("display", "block");
        return false;

    	} 
    	
      }
   } 
    return true;

}
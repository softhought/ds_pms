$(document).ready(function(){

var basepath = $("#basepath").val();

 $(document).on('submit','#createNewUserForm',function(event)
    {
        event.preventDefault();
        if(validatedata())
        {   

            var formDataserialize = $("#createNewUserForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'createnewuser/createNewuser_action',
                dataType: "json",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: formData,
                
                success: function (result) {

                	if(result.msg_status == 1){

                		$("#crenewuser").css("display","block");
                		$("#datasavemsg").text(result.msg_data);
                		$("#createNewUserForm")[0].reset();
                		$("#user_type").val("").change(); 
                	}else{

                		$("#crenewuser").css("display","block");
                		$("#datasavemsg").text(result.msg_data);
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
                   // alert(msg);  
                }
            }); /*end ajax call*/

        
        	

        }   // end master validation


        
    });


 $(document).on('keyup','#user_name',function(){
 
    $("#savebtn").prop("disabled",false);
    $("#newcreationusermsg").text("").css("display","none");
    var username = $(this).val();


       $.ajax({
                type: "POST",
                url: basepath+'createnewuser/check_username',
                dataType: "json",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: {username:username},
                
                success: function (result) {

                  if(result.msg_status == 1){

                     $("#savebtn").prop("disabled",true);
                      $("#newcreationusermsg").text(result.msg_data).css("display","block");

                  }else{

                   
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
                   // alert(msg);  
                }
            }); /*end ajax call*/



 });

 $("#user_type").change(function(){

   var value = $(this).val();

   if(value == 4 || value == 'DOCTOR'){

      $("#drregno").css("display","block");
   }else{
     $("#drregno").css("display","none");
      $("#newcreationusermsg").text("").css("display","none");
   }

 })


});



function validatedata(){


  var name = $("#name").val();
  var user_name = $("#user_name").val();
  var userpassword = $("#userpassword").val();
  var user_type = $("#user_type").val();
  var dr_reg_no = $("#dr_reg_no").val();
  var passlen = userpassword.length;

    $("#newcreationusermsg").text("").css("display","none");

  if(name == ''){

    $("#newcreationusermsg").text("Enter User Full Name").css("display","block");
    $("#name").focus();
    return false;

  }else if(user_name == ''){

  	 $("#newcreationusermsg").text("Enter User Name").css("display","block");
  	 $("#user_name").focus();
      return false;
  }else if(userpassword == ''){

     $("#newcreationusermsg").text("Enter Password").css("display","block");
     $("#userpassword").focus();
     return false;
  }
  else if(passlen < 6){

     $("#newcreationusermsg").text("Enter Password Minimum 6 Digit").css("display","block");
     $("#userpassword").focus();
     return false;
  }else if(user_type == ''){

  	 $("#newcreationusermsg").text("Select User Type").css("display","block");
  	 $("#user_type").focus();
     return false;

  }else if((user_type == 'DOCTOR' || user_type == 4) && dr_reg_no == ''){

     $("#newcreationusermsg").text("Enter Doctor Registration No.").css("display","block");
     $("#dr_reg_no").focus();
     return false;

  }

  return true;

}
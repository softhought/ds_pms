$(document).ready(function(){
 
 var basepath = $("#basepath").val();
 
 
	$("#currpassword").on('keyup',function(){
		
         $(".showtrue").css("display","none");
        
		var currpassword = this.value;
    
		$.ajax({
                 type:"POST",
                 url:basepath+'changepassword/checkCurrentpassword',
                 data:{currpassword:currpassword},
                 dataType: 'json',
	             contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                 success:function(result){
                 	if(result.msg_status){

                 		$(".showtrue").css("display","block");
                 		$("#savebtn").attr("disabled", false);
                 	}
                 	else{
                 		$("#savebtn").attr("disabled", true);
                 	}
                 },      
             
		});

	});

	

$(document).on('submit','#passwordForm',function(event){
	 event.preventDefault();
 
		if(validation()){

			var newpassword = $("#newpassword").val();
			var currpassword = $("#currpassword").val();
			
            
			$.ajax({
                 type:"POST",
                 url:basepath+'changepassword/addnewpassword',
                 data:{newpassword:newpassword,currpassword:currpassword},
                 dataType: 'json',
	             contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                 success:function(result){
                 	if(result.msg_status){

					  $.confirm({
					    title: '',
					    content: 'Password Update Successfully',
					    buttons: {
					        ok: function () {
					            window.location.href="dashboard";
									        }
									    
									    }
									});
                       
                 	}
                 	else{

                 		$.alert({
						        title: '',
						        content: 'Password Not Update Successfully',
						    });
                 	}
                 	 

                 },      
             
		});

		}
		else{
			return false;
		}
	})

});

function validation(){

	var newpassword = $("#newpassword").val();
	var repeatpassword = $("#repeatpassword").val();
	
 
 	
	if(newpassword == ""){

       $("#newpassword").focus();
        $("#passwordmsg")
        .text("Error : Please Enter New Password..")
        .addClass("form_error")
        .css("display", "block");
        return false;
		
	}
	if(newpassword.length < 6){

		$("#newpassword").focus();
        $("#passwordmsg")
        .text("Error : Please Enter Minimum  Six Digits..")
        .addClass("form_error")
        .css("display", "block");
        return false;

		
	}

	if(repeatpassword != newpassword){


    $("#repeatpassword").focus();
        $("#passwordmsg")
        .text("Error : Repeat Password Does't Match..")
        .addClass("form_error")
        .css("display", "block");
         return false;
		
	}

	
	

	return true;
}


$(document).ready(function(){

var basepath = $("#basepath").val();
 var rowNoUpload = 0;
 var mode = $("#mode").val();

 $('.dataTables').DataTable();

 $('.demo').dropdown({
  multipleMode: 'label'
});

 $(document).on('change','#need_instruct',function(event)
    {
        event.preventDefault();
        
        // From the other examples
        if (this.checked) {
            $(".optionrow").css('display', 'block');
            $("#chk_option").val("Y");
        }else{
            $(".optionrow").css('display', 'none');
            $("#chk_option").val("N");
        }
    });

 var wrapper       = $(".input_fields_wrap"); //Fields wrapper
 var add_button      = $(".add_field_button"); //Add button ID
 var x = 1; //initlal text box count
 
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x){ //max input box allowed
      x++; //text box increment
      $(wrapper).append('<div class="form-line"><textarea cols="1" rows="1" name="instruct_option[]" class="form-control instruct" style="width: 95%;"></textarea><i class="remove_field delbtn material-icons" aria-hidden="true">delete</i></div>'); //add input box
 
     // <div><input type="text" name="dotext[]" class="textdo" style="width: 90%;margin-bottom: 10px;"/><i class="remove_field fa fa-trash" aria-hidden="true" style="margin-left: 13px;"></i></div>
    }
  });

  $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  });
 

 

//-----form submitted-----

 $(document).on('submit','#invpanelForm',function(event)
    {
    	event.preventDefault();
       
       if(validateform()){

            var formDataserialize = $("#invpanelForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            //console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $("#invepanelsavebtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'investigationpanel/investigationpanel_action',
                dataType: "json",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: formData,
                
                success: function (result) {
                	console.log(result);
                    
                    if (result.msg_status == 1) {
                            
                        $("#suceessmodal").modal({
                            "backdrop": "static",
                            "keyboard": true,
                            "show": true
                        });
                        var addurl = basepath + "Investigationpanel/addInvestigationPanel";
                        var listurl = basepath + "Investigationpanel";
                        $("#responsemsg").text(result.msg_data);
                        $("#response_add_more").attr("href", addurl);
                        $("#response_list_view").attr("href", listurl);

                    } 
                    else {
                        $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $("#loaderbtn").css('display', 'none');
                    
                    $("#invepanelsavebtn").css({
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

        
        	

       } // end master validation


        
    });




});


function validateform(){

 var isvalid = true;	

  var panelname =$("#panelname").val();
  // var chk_option =$("#chk_option").val();
  var investigation =$("#investigation").val();


  $("#investigationpanelmsg").text("").css("dispaly", "none").removeClass("form_error");

    if(panelname=="")
    {
        $("#panelname").focus();
        $("#investigationpanelmsg")
        .text("Error : Enter panel name .")
        .addClass("form_error")
        .css("display", "block");
        isvalid = false;
    } 
    
    if(investigation==null)
    {
        
        $("#investigationpanelmsg")
        .text("Error : Select investigation name .")
        .addClass("form_error")
        .css("display", "block");
        isvalid = false;
    }
  //   else if(chk_option=="Y"){

  //   	$('.instruct').each(function(){  
		  
		//  if($(this).val() == ""){

		// $(this).focus();
  //       $("#investigationpanelmsg")
  //       .text("Error : Enter Instruction name .")
  //       .addClass("form_error")
  //       .css("display", "block");
  //        isvalid = false;
  //  }

   // });

    	
    // }

  return isvalid;

}
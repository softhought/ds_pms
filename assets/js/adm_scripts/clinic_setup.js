$(document).ready(function(){
    var basepath = $("#basepath").val();
    var rowNoUpload = 0;
     var mode = $("#mode").val();
   $('.dataTables').DataTable();
     
     if (mode=='ADD') {
     	addVisitingDayDetailsFirstRow(basepath,rowNoUpload);
     	//   rowNoUpload++;
     }
	
        $('.selecttime').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: true,
                format: 'hh:mm a'
            });

  
  // Add Visiting Day Details
    $(document).on('click','.addVisitingDay',function(){

    	  // rowNoUpload++;

          var rowno=  $("#rowno").val();
        console.log(rowno);
        rowno++;
        $.ajax({
            type: "POST",
            url: basepath+'clinicsetup/addVisitingDaydetail',
            dataType: "html",
            data: {rowNo:rowno},
            success: function (result) {
                $("#rowno").val(rowno);
                $("#detail_timeslot table").css("display","block"); 
                $("#detail_timeslot table tbody").append(result);   
                $('select').selectpicker();
              //  $(".demo-masked-input").inputmask();
                var $demoMaskedInput = $('.demo-masked-input');

            //Time

            $('.selecttime').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: true,
                format: 'hh:mm a'
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
  
    }); // End Visiting Details


            // Delete Table Row

    $(document).on('click','.delTimeSlot',function(){
    	
        var currRowID = $(this).attr('id');
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
        console.log(currRowID);

        //$("tr#rowDocument_"+rowDtlNo[1]+"_"+rowDtlNo[2]).remove();
        $("tr#rowDocument_"+rowDtlNo[1]).remove();
    });


// on change by appointment
 $(document).on('click','.chk',function(){
        
       //var chkVal = $(this).val();
      // console.log('chkVal'+chkVal)
      // console.log('chkVal'+chkVal)

       var chk_id = $(this).attr('id');

        var ckkIDS = chk_id.split("_");
    
       // console.log(chk_id);
    
          
        var tdIDS = "#basic_checkbox_"+ckkIDS[2];
        var chkVal = $(tdIDS).is(':checked');
        if (chkVal) {
            $("#byAppoint_"+ckkIDS[2]).val('Y');
            $("#timefrom_"+ckkIDS[2]).attr('readonly', true);
            $("#timefrom_"+ckkIDS[2]).val('');
            $("#timeto_"+ckkIDS[2]).attr('readonly', true);
            $("#timeto_"+ckkIDS[2]).val('');


           // $("#timefrom_"+ckkIDS[2]).attr('disabled','disabled');
           // $("#timeto_"+ckkIDS[2]).attr('disabled','disabled');

            $("#timefrom_"+ckkIDS[2]).addClass('nonclick');
            $("#timeto_"+ckkIDS[2]).addClass('nonclick');




        }else{
            $("#byAppoint_"+ckkIDS[2]).val('N');
            $("#timefrom_"+ckkIDS[2]).attr('readonly', false);
            $("#timeto_"+ckkIDS[2]).attr('readonly', false);

           // $("#timefrom_"+ckkIDS[2]).removeAttr('disabled');;
           // $("#timeto_"+ckkIDS[2]).removeAttr('disabled');;

            $("#timefrom_"+ckkIDS[2]).removeClass('nonclick');
            $("#timeto_"+ckkIDS[2]).removeClass('nonclick');


        }
         console.log('chkVal'+chkVal);
         // alert("Checkbox state (method 2) = " + $(tdIDS).is(':checked'));

    
    });




     $(document).on('submit','#ClinicForm',function(event)
    {
        event.preventDefault();
        if(validateClinic())
        {   
        
        	if (detailValidation()) {
       
      
            var formDataserialize = $("#ClinicForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $("#clinicsavebtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'clinicsetup/clinic_action',
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
                        var addurl = basepath + "clinicsetup/addClinic";
                        var listurl = basepath + "clinicsetup";
                        $("#responsemsg").text(result.msg_data);
                        $("#response_add_more").attr("href", addurl);
                        $("#response_list_view").attr("href", listurl);

                    } 
                    else {
                        $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $("#loaderbtn").css('display', 'none');
                    
                    $("#admsavebtn").css({
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

        
        	}// end of details validation

        }   // end master validation


        
    });


         $(document).on("click", ".clinicstatus", function() {
        
        var uid = $(this).data("clinicid");
        var status = $(this).data("setstatus");
        var url = basepath + 'clinicsetup/setStatus';
        setActiveStatus(uid, status, url);

    });


    var oTable = $('#example').DataTable();
    $("#example tbody tr td:nth-child(1)").attr("class", "details-control");

        $('#example').on('click', 'td.details-control', function() {
        var tr = $(this).closest('tr');
        var row = oTable.row(tr);
        var rowdata = (oTable.row(tr).data());

        /* if (row.child.isShown()) {
             tr.removeClass('details');
             row.child.hide();

         }*/
        if (row.child.isShown()) {
            // This row is already open - close it
            $('div.slider', row.child()).slideUp(function() {
                tr.removeClass('details');
                row.child.hide();
            });
        } else {
            console.log(oTable.row(tr).data());
            tr.addClass('details');
            row.child(format(row.child, rowdata, basepath)).show();

            $('div.slider', row.child()).slideDown();
        }
    });




    //  Code

    $(document).on('keyup','#cliniccode',function(e){
        e.preventDefault();
        
            var mode = $("#mode").val();
           

            var cliniccode = $("#cliniccode").val();
            


            if( mode=="EDIT") {
                
            }
            else{
              
                $("#error_msg").text("").css("display", "none");
    
                var type = "POST"; 
                var urlpath = basepath + 'Clinicsetup/checkClinicCode';
                $.ajax({
                    type: type,
                    url: urlpath,
                    data: {cliniccode:cliniccode},
                    dataType: 'json',
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    success: function(result) {
                        if(result.msg_status==1){
                            $("#clinicmsg")
                            .text("Error : Clinic Code already exist.Please check...")
                            .addClass("form_error")
                            .css("display", "block");
                            $("#clinicsavebtn").attr('disabled',true);
                        }
                        else{
                            $("#clinicmsg").text("").css("display", "none");
                            $("#clinicsavebtn").attr('disabled',false);
                        }
                    },
                    error: function(jqXHR, exception) {
                        var msg = '';
                    }
                });
                
           
            }
    });


}); // end of document ready



function addVisitingDayDetailsFirstRow(basepath,rowNoUpload){

	     
        console.log(basepath);
        $.ajax({
            type: "POST",
            url: basepath+'clinicsetup/addVisitingDaydetail',
            dataType: "html",
            data: {rowNo:rowNoUpload},
            success: function (result) {

                $("#detail_timeslot table").css("display","block"); 
                $("#detail_timeslot table tbody").append(result);   
                $('select').selectpicker();
                var $demoMaskedInput = $('.demo-masked-input');
          //Time

            $('.selecttime').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: true,
                format: 'hh:mm a'
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
}





function validateClinic()
{
    var clinicname = $("#clinicname").val();
    var contactno = $("#contactno").val();
    var address = $("#address").val();
   // alert(clinicname);

  

    $("#clinicmsg").text("").css("dispaly", "none").removeClass("form_error");

    if(clinicname=="")
    {
        $("#clinicname").focus();
        $("#clinicmsg")
        .text("Error : Enter clinic name .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if(contactno=="")
    {
        $("#contactno").focus();
        $("#clinicmsg")
        .text("Error : Enter contact no .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if(address=="")
    {
        $("#address").focus();
        $("#clinicmsg")
        .text("Error : Enter address .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

  
 
    return true;
}



function detailValidation()
{
    var isValid = true;
   // var isValid = false;
      $(".selectdayerr,.fromTimeerr,.fromToerr").removeClass("bordererror");
    
    $('.chk').each(function() 
    {     
        var chk_id = $(this).attr('id');

        var ckkIDS = chk_id.split("_");
        var chkVal = $(this).val();
       // console.log(chk_id);
    

        var tdIDS = "#selectDay_"+ckkIDS[2];
        console.log('sid '+tdIDS);
        var selectDayVal = $(tdIDS).val();

        //console.log('s '+selectDayVal);
       

        $(tdIDS).removeAttr("title");
        $(tdIDS).css("background","inherit");

        var tdIDSTimeIn = $("#timefrom_"+ckkIDS[2]).val();
         console.log('Time From '+tdIDSTimeIn);

        

        if(selectDayVal==0)
        {  
           $("#selectdayerr_"+ckkIDS[2]).addClass("bordererror");
            $("#clinicmsg")
            .text("Error : Select Visiting Day .")
            .addClass("form_error")
            .css("display", "block");

            isValid = false;
        }


          var byAppointment = $("#basic_checkbox_"+ckkIDS[2]).is(':checked');

          console.log('isChecked:'+byAppointment);

          if (!byAppointment) {
            console.log('*****');
            var timefrom= $("#timefrom_"+ckkIDS[2]).val();
         
            var timeto= $("#timeto_"+ckkIDS[2]).val();

                if(timefrom=='')
                {  
                   $("#fromTimeerr_"+ckkIDS[2]).addClass("bordererror");
                    $("#clinicmsg")
                    .text("Error : Select From Time .")
                    .addClass("form_error")
                    .css("display", "block");

                    isValid = false;
                }

                if(timeto=='')
                {  
                   $("#fromToerr_"+ckkIDS[2]).addClass("bordererror");
                    $("#clinicmsg")
                    .text("Error : Select To Time .")
                    .addClass("form_error")
                    .css("display", "block");

                    isValid = false;
                }

          }




    });

    return isValid;
}


function numericFilter(txb) {
   txb.value = txb.value.replace(/[^\0-9]/ig, "");
}


/* data table details rows */

function format(callback, id, basepath) {
    var clinicId = id[1];
    $.ajax({
        url: basepath + 'clinicsetup/getClinicDetailRow',
        data: { clinicId: clinicId },
        dataType: "json",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        complete: function(response) {
            var data = JSON.parse(response.responseText);

            console.log(data);

            // console.log(response);
            var thead = '<tr class="expandrowDetails"><th style="width:10%;">Day</th><th  style="width:15%;">By Appointment </th><th style="width:15%;">From Time</th><th style="width:15%;">To Time</th></tr>';
            tbody = '';

            $.each(data, function(i, datas) {

                if(datas.is_by_appointment=='N'){
                    var fromTime = datas.from_time;
                    var toTime = datas.to_time;
                    var byapp ='';
                }else{
                    var fromTime = "";
                    var toTime = "";
                    var byapp ='Yes';
                }

                tbody += '<tr>';
                tbody += '<td>' + datas.day_name + '</td>';
                tbody += '<td>' + byapp + '</td>';
                tbody += '<td>' + fromTime + '</td>';
                tbody += '<td>' + toTime + '</td>';
                tbody += '</tr>';
            });

            callback($('<div class="slider"><table class="table table-striped rowexpandTable" >' + thead + tbody + '</table></div>')).show();
        },
        error: function() {
            console.log("Error Found");
        }
    });
}

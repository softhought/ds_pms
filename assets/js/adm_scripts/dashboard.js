$(document).ready(function(){

	var basepath = $("#basepath").val();

 $('.dataTables').DataTable();

 


 $(document).on('click','#visitView',function(){

  var from_dt =$("#from_dt").val();
  var to_date =$("#to_date").val();
  var visitype =$("#visitype").val();
  var curdate = ("0"+new Date().getDate()).slice(-2)+'-'+("0"+(new Date().getMonth()+1)).slice(-2)+'-'+new Date().getFullYear();
  
  if(validationdata()){
     
      $("#visitdata").html(""); 
      $('#todayloader').css("display","block");

  
          $.ajax({
                type: "POST",
                url: basepath+'dashboard/getvisitandregisterdata',
                dataType: "html",
                
                data: {from_dt:from_dt,to_date:to_date,visitype:visitype},
                
                success: function (result) {

                   $('#todayloader').css("display","none");
                   

                   if(curdate == from_dt && curdate == to_date && visitype == 'Visit'){

                   	$("#todaytext").text("Today's Visit(s)");

                   }else if(curdate == from_dt && curdate == to_date && visitype == 'Rgistration'){

                   	$("#todaytext").text("Today's Rgistration(s)");

                   }else if((curdate != from_dt || curdate != to_date) && visitype == 'Visit'){

                   	$("#todaytext").text("Visit(s)");

                   }else{

                   	  $("#todaytext").text("Rgistration(s)");
                   }

                   $("#visitdata").html(result);                                        
                                     
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

 });

//preop get data using from and to date 

$(document).on('click','#todaypreop',function(){

  var from_dt =$("#preop_from_dt").val();
  var to_date =$("#preop_to_date").val();
  
  var curdate = ("0"+new Date().getDate()).slice(-2)+'-'+("0"+(new Date().getMonth()+1)).slice(-2)+'-'+new Date().getFullYear();
  
  if(validationPreopdata()){
     
      $("#preopdata").html(""); 
      $('#todaypreoploader').css("display","block");

  
          $.ajax({
                type: "POST",
                url: basepath+'dashboard/getpreofromdatepdata',
                dataType: "html",
                
                data: {from_dt:from_dt,to_date:to_date},
                
                success: function (result) {

                   $('#todaypreoploader').css("display","none");
                   

                   if(curdate == from_dt && curdate == to_date){

                    $("#preoptext").text("Today's Pre op(s)");

                   }else{

                      $("#preoptext").text("Pre op(s)");
                   }

                   $("#preopdata").html(result);                                        
                                     
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

 });


//Discharge get data using from and to date 

$(document).on('click','#todaydischarge',function(){

  var from_dt =$("#discharge_from_dt").val();
  var to_date =$("#discharge_to_date").val();
  
  var curdate = ("0"+new Date().getDate()).slice(-2)+'-'+("0"+(new Date().getMonth()+1)).slice(-2)+'-'+new Date().getFullYear();
  
  if(validaredischargedata()){
     
      $("#dischargedata").html(""); 
      $('#todaydischargeloader').css("display","block");

  
          $.ajax({
                type: "POST",
                url: basepath+'dashboard/getpartialdischargelist',
                dataType: "html",
                
                data: {from_dt:from_dt,to_date:to_date},
                
                success: function (result) {

                   $('#todaydischargeloader').css("display","none");
                   

                   if(curdate == from_dt && curdate == to_date){

                    $("#dischargetext").text("Today's Discharge(s)");

                   }else{

                      $("#dischargetext").text("Discharge(s)");
                   }

                   $("#dischargedata").html(result);                                        
                                     
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

 });

//  //added for preop select






});


function valt(){
  alert();
}

function validationdata(){

  var from_dt =$("#from_dt").val();
  var to_date =$("#to_date").val();
  //var visitype =$("#visitype").val();

   $("#from_dt,#to_date").css("border-bottom-color","#fdc8e3");

  if(from_dt == ''){

    $("#from_dt").css("border-bottom-color","red");
    return false;

  }
   else if(to_date == ''){

    $("#to_date").css("border-bottom-color","red");
    return false;

  }
   
  return true;

}

//preop validation

function validationPreopdata(){

  var from_dt =$("#preop_from_dt").val();
  var to_date =$("#preop_to_date").val();
  //var visitype =$("#visitype").val();

   $("#preop_from_dt,#preop_to_date").css("border-bottom-color","#fdc8e3");

  if(from_dt == ''){

    $("#preop_from_dt").css("border-bottom-color","red");
    return false;

  }
   else if(to_date == ''){

    $("#preop_to_date").css("border-bottom-color","red");
    return false;

  }
   
  return true;

}

function validaredischargedata(){

  var from_dt =$("#discharge_from_dt").val();
  var to_date =$("#discharge_to_date").val();
  //var visitype =$("#visitype").val();

   $("#discharge_from_dt,#discharge_to_date").css("border-bottom-color","#fdc8e3");

  if(from_dt == ''){

    $("#discharge_from_dt").css("border-bottom-color","red");
    return false;

  }
   else if(to_date == ''){

    $("#discharge_to_date").css("border-bottom-color","red");
    return false;

  }
   
  return true;

}



// function OpenStudentList(id) {
//     var basePath= $("#basepath").val();
//     // alert(id);
//     $.ajax({        
//         type: "POST",
//         url: basePath + 'dashboard/groupByList',
//         data:{'viewname':id},
//         dataType: "html",
//         //contentType:"application/x-www-form-urlencoded; charset=UTF-8",
//         success: function(result) {
//             $("#DetailList").html(result)
//         },
//         error: function(jqXHR, exception) {
//             var msg = '';
//             if (jqXHR.status === 0) {
//                 msg = 'Not connect.\n Verify Network.';
//             } else if (jqXHR.status == 404) {
//                 msg = 'Requested page not found. [404]';
//             } else if (jqXHR.status == 500) {
//                 msg = 'Internal Server Error [500].';
//             } else if (exception === 'parsererror') {
//                 msg = 'Requested JSON parse failed.';
//             } else if (exception === 'timeout') {
//                 msg = 'Time out error.';
//             } else if (exception === 'abort') {
//                 msg = 'Ajax request aborted.';
//             } else {
//                 msg = 'Uncaught Error.\n' + jqXHR.responseText;
//             }
//             // alert(msg);  
//         }
//     });
// }
$(document).ready(function(){

$(document).on('change','.incother',function(event){

  event.stopImmediatePropagation();

 
  var value = $(this).val();
  var dispid = $(this).attr('data-dispid');
  var matchval = $(this).attr('data-match');
  var valid = $(this).attr('data-input');
  
  if(value == matchval){

  	$("#"+dispid).css("display","block");

  }else{
  	    $("#thalassemia_other").val("");
  		$("#"+dispid).css("display","none");
  		
  }

  
})


});
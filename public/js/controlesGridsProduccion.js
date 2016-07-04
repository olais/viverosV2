$(document).ready(function(){

$("#procesar").attr("disabled",true);

 $('#maq1').click(function () { 
       $("#maq1").removeClass("btn btn-primary");
    if ($('#procesar').attr('disabled')) {
        $("#maq1").addClass("btn btn-warning");
        $("#procesar").attr("disabled",false);
     
    } else {
       $("#maq1").removeClass("btn btn-warning");
        $("#maq1").addClass("btn btn-primary");
        $("#procesar").attr("disabled",true);
       }
    });


  


});

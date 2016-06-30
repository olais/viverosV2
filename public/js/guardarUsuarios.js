$(document).ready(function(){
	   
     $("#registraUsuarios").submit(function(){

        var udatos=$(this).serialize();
      var identificadorUsuarios=$("#identificadorUsuarios").val();

      
          if(identificadorUsuarios==1){
          
            urlGuardar="usuarios/actualizarregistros";

          }else{

              urlGuardar="usuarios/registro";
          }
     $.post(urlGuardar,udatos,
          function(data){
             document.getElementById("registraUsuarios").reset();
            $("#gridUsuarios").trigger("reloadGrid");
             $("#identificadorUsuarios").val(0);
               $( "#dialog-usuarios" ).dialog("close");
          },'json'  );

        return false;

        
     });

});

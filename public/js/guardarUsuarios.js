$(document).ready(function(){
	   
     $("#registraUsuarios").submit(function(){

        var udatos=$(this).serialize();

        $.post("usuarios/registro",udatos,
          function(data){
             document.getElementById("registraUsuarios").reset();
            alert("datos guardados");
          },'json'  );

        return false;

        
     });

});

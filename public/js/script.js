var path = "<?php echo $this->baseUrl(); ?>";//por si queremos la url base en js

function mueveReloj()
{ 
    momentoActual = new Date();
    hora = momentoActual.getHours();
    minuto = momentoActual.getMinutes();
    segundo = momentoActual.getSeconds();
    if(segundo<10)
    {
        segundo="0"+segundo;
    }
    if(minuto<10)
    {
        minuto="0"+minuto;
    }
    horaImprimible = hora + " : " + minuto + " : " + segundo;
    $("#hora").html(horaImprimible);
} 
setInterval (function() {mueveReloj();}, 500); 


$(document).ready(function()
{
    errores=sessionStorage.getItem("id");
    if(errores!="")
    {
        $("#notificaciones").html("Consulta exitosa");
    }
    else
    {
        $("#notificaciones").html("A ocurrido error");
    }
    
    $("#login").submit(function()
    {
        var cadena = $(this).serialize();
        $.post("Login/session",cadena,
            function(data)
            {
                if(data.exito=="false")
                {
                    $("#notificaciones").html("<p style='color:red;'>"+data.validacion+"</p>");
                }
                if(data.exito=="true")
                {
                    window.location=path+"/index";
                }      
            },'json'
        );
        return false;
    });

    $("#salir").click(function()
    {
        window.location='login/salir';
    });
});
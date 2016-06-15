$(document).ready(function()
{
    $("#login").submit(function()
    {
        var cadena = $(this).serialize();
        $.post("Login/session",cadena,
            function(data){
                if(data.exito=="false")
                {
                    $("#notificaciones").html("<p>"+data.validacion+"</p>");
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
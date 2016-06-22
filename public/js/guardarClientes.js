$(document).ready(function(){
	$("#ui-accordion-accordion-header-0").trigger('click');
		 idCliente = sessionStorage.getItem("id");
     	 $("#idC").val(idCliente);
     	 $("#idClienteDir").val(idCliente);
		$("#clientesG").submit(function(){
			var clientes=$(this).serialize();
			$.post("editar/guardarcliente",clientes,
				function(data){
					 
					sessionStorage.setItem("id",data.id);
					  idCliente = sessionStorage.getItem("id");
					 $("#notificaciones").html("Cliente guardado con éxito")
						var url      = window.location.href; 
					    window.location=url+"?id="+idCliente;
					    location.reload();
     				
				},'json'

				);

			return false;

		});
			
		  

	
		

     	$("#contactosG").submit(function(){
     		var contactos=$(this).serialize();
     		var identificadorContactos=$("#identificadorContactos").val();

     			if(identificadorContactos==1){
     				urlGuardar="editar/actualizarcontactos";

     			}else{

     				urlGuardar="editar/guardarcontactos";
     			}
           	$.post(urlGuardar,contactos,
				function(data){
				
					 window.location="editar?id="+idCliente;
				},'json'

		       );

			return false;

     	});

     		$("#contactosD").submit(function(){
     		var direcciones=$(this).serialize();
     	     identificadorDirecciones=$("#identificadorDirecciones").val();
     		if(identificadorDirecciones==1){
     				urlGuardar="editar/actualizardirecciones";

     			}else{

     				urlGuardar="editar/guardardireccion";
     			}
     			$.post(urlGuardar,direcciones,
				function(data){
					window.location="editar?id="+idCliente;
				},'json'

		       );

			return false;

     	});
     		$("#guardaCliente").click(function(){

     			//guardarConta
     			//guardaDir
     			 boton = sessionStorage.getItem("botonForm");
     			
			    $("#"+boton).trigger("click");
     		});

     		$("#cancelaClienteUno").click(function(){

     			 $("#formClientes").hide();

     		});
     			
     	


});

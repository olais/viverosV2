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
					  alert("listo");
					   window.location="editar?id="+idCliente;
     				
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
				//$("#ui-accordion-accordion-header-2").trigger('click');
					//window.location='altas.php';
					// idCliente = sessionStorage.getItem("id_cliente");
					 window.location="editar?id="+idCliente;
				},'json'

		       );

			return false;

     	});

     		$("#contactosD").submit(function(){
     		var contactos=$(this).serialize();
     			$.post("guardarDirecciones.php",contactos,
				function(data){
					$("#ui-accordion-accordion-header-0").trigger('click');
					//window.location='altas.php';
				},'json'

		       );

			return false;

     	});



     	


});

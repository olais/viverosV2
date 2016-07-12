$(document).ready(function()
{
    $("#btnRegresarOrdenes").click(function()
    {
        $(location).attr('href',"registros");
    });
    
    $("#btn_collapse_ig_in").click(function()
    {
        $("#btn_collapse_ig_in").addClass("display_none");
        $("#btn_collapse_ig").removeClass("display_none");
    });
    
    $("#btn_collapse_ig").click(function()
    {
        $("#btn_collapse_ig_in").removeClass("display_none");
        $("#btn_collapse_ig").addClass("display_none");
    });
    
    $("#btn_collapse_in").click(function()
    {
        $("#btn_collapse_in").addClass("display_none");
        $("#btn_collapse").removeClass("display_none");
    });
    
    $("#btn_collapse").click(function()
    {
        $("#btn_collapse_in").removeClass("display_none");
        $("#btn_collapse").addClass("display_none");
    });
    
		//llenar combo clientes
		$.post("../produccion/consultaclienteop", 
				function(data){
				for(i=0;i<data.rows.length;i++){
				$("#op_suajes_cliente").append("<option value='"+data.rows[i].Id_cliente+"'>"+data.rows[i].Nombre+"</option>");

				}
			},'json');

		//llenar combo máquinas
		$("#op_suajes_cliente").change(function(){
			var idCliente=$(this).val();
			$("#op_suajes_maquina").empty();
			$("#op_suajes_maquina").html("<option>Seleccionar...</option");
		$.post("../produccion/consultamaquinasop",{'idCliente':idCliente}, 
				function(data){
				for(i=0;i<data.rows.length;i++){
				$("#op_suajes_maquina").append("<option value='"+data.rows[i].Id_MaquinaC+"'>"+data.rows[i].Descripcion+"</option>");

				}
			},'json');


		});
		$("#op_suajes_maquina").change(function(){
			var idMaquina=$(this).val();
		$.post("../produccion/consultaradiosop",{'idMaquina':idMaquina}, 
				function(data){
				

				if(data.rows[0].Rama=="SI"){
               $("#op_suajes_rama_si").attr('checked', 'checked');
				      }
      if(data.rows[0].Rama=="NO"){
          $("#op_suajes_rama_no").attr('checked', 'checked');

         }
			},'json');


		});
		//llenar radios de maquinas


		//$("input:radio[name=rama]").val('no');


});
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
    
    $("#btn_collapse_ipes_in").click(function()
    {
        $("#btn_collapse_ipes_in").addClass("display_none");
        $("#btn_collapse_ipes").removeClass("display_none");
    });
    
    $("#btn_collapse_ipes").click(function()
    {
        $("#btn_collapse_ipes_in").removeClass("display_none");
        $("#btn_collapse_ipes").addClass("display_none");
    });
    
    $("#btn_collapse_epetl_in").click(function()
    {
        $("#btn_collapse_epetl_in").addClass("display_none");
        $("#btn_collapse_epetl").removeClass("display_none");
    });
    
    $("#btn_collapse_epetl").click(function()
    {
        $("#btn_collapse_epetl_in").removeClass("display_none");
        $("#btn_collapse_epetl").addClass("display_none");
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
				

				if(data.rows[0].Rama=="SI")
				     {
                  $("#op_suajes_rama_si").attr('checked', 'checked');
				      }
		          if(data.rows[0].Rama=="NO")
		          {
		          $("#op_suajes_rama_no").attr('checked', 'checked');

		           }
		           	if(data.rows[0].Pinza=="SI")
				     {
                  $("#op_suajes_pinza_si").attr('checked', 'checked');
				      }
				      if(data.rows[0].Pinza=="NO")
				     {
                  $("#op_suajes_pinza_no").attr('checked', 'checked');
				      }
				      //perforaciones
				      	if(data.rows[0].Perforaciones=="SI")
				     {
                  $("#perforaciones_si").attr('checked', 'checked');
				      }
				      if(data.rows[0].Perforaciones=="NO")
				     {
                  $("#perforaciones_no").attr('checked', 'checked');
				      }

				      //centerline
				      	if(data.rows[0].Centerline=="SI")
				     {
                  $("#op_suajes_centerline_si").attr('checked', 'checked');
				      }
				      if(data.rows[0].Centerline=="NO")
				     {
                  $("#op_suajes_centerline_no").attr('checked', 'checked');
				      }

				    //desbarbe

				     	if(data.rows[0].Desbarbe=="SI")
				     {
                  $("#op_suajes_desbarbes_si").attr('checked', 'checked');
				      }
				      if(data.rows[0].Desbarbe=="NO")
				     {
                  $("#op_suajes_desbarbes_no").attr('checked', 'checked');
				      }
		           
		           //compensación

				     	if(data.rows[0].Compensacion=="SI")
				     {
                  $("#op_suajes_compensación_si").attr('checked', 'checked');
				      }
				      if(data.rows[0].Compensacion=="NO")
				     {
                  $("#op_suajes_compensación_no").attr('checked', 'checked');
				      }

				     $("#op_suajes_rama_1").val(data.rows[0].MedidaRama);
				     $("#op_suajes_pinza_1").val(data.rows[0].MedidaPinza);

				     $("#op_suajes_centerline_1").val(data.rows[0].MedidaCenterline);
			},'json');


		});
		//llenar radios de maquinas


		//$("input:radio[name=rama]").val('no');


});
$(document).ready(function(){
var id;
var id_cliente;
$("#clientesG input").attr("disabled", true);
$("#clientesG select").attr("disabled", true);
$("#fornuevocontacto").hide();
$("#formDirecciones").hide();
$("#formClientes").hide();
 $("#formMaquinas").hide();
$("#gCliente").hide();
$("#guardarConta").hide();
$("#guardaDir").hide();
$("#guardaMaquina").hide();
$("#btnEditarDireccion").hide();
$("#btnEditarContacto").hide();
$("#btnEditarMaquina").hide();
$("#actualizarClientes").hide();
//$("#guardaCliente").hide();
accionCambiosDir= sessionStorage.getItem("accionCambiosDir");
if(accionCambiosDir==1){
 // alert("hola");
  $("#selecCon").removeClass("active");
  $("#selecDir").addClass("active");

}
$("#selecCon").click(function(){
 
  sessionStorage.setItem('accionCambiosDir',0);
$("#selecDir").removeClass("active");
 $("#selecCon").addClass("active");


});

$("#gridClientes").jqGrid({
   	url:'index/consultar',
	datatype: "json",
   	colNames:['id','Estatus', 'Nombre', 'RFC','Teléfono 1','Teléfono 2','Fax','Correo','web'],
   	colModel:[
   		{name:'Id_cliente',index:'Id_cliente', width:100,editable:true},
     
   		{name:'estatus',index:'estatus', width:90, editable:true},
   		{name:'Nombre',index:'Nombre', width:280,editable:true},
   		{name:'RFC',index:'RFC', width:200, align:"left",editable:true},
   		{name:'Telefono1',index:'Telefono1', width:170, align:"left",editable:true},		
   		{name:'Telefono2',index:'Telefono2', width:170,align:"left",editable:true},		
   		{name:'Fax',index:'Fax', width:160, sortable:false,editable:true},
      {name:'Correo',index:'Correo', width:280, sortable:false,editable:true},
      {name:'Web',index:'Web', width:170, sortable:false,editable:true}
   	],
   	rowNum:5000,
   	rowList:[10,20,30,40,50],
   	pager: '#pgridClientes',
   	sortname: 'id_cliente',
    viewrecords: true,
    sortorder: "desc",
    multiselect:false,
    width:'1140',
    height:'360',

    editurl: "index/consultar", //aqui la url de la actualización
   
	  caption: "Registros de Clientes",

    //extraer valores
    onSelectRow: function (ids) {
         
             var s = $("#gridClientes").jqGrid('getGridParam','selrow');
             valores = s.toString().split(",");
              id=$("#gridClientes").jqGrid('getRowData',s).Id_cliente;
              sessionStorage.setItem("id_cliente",id);

                window.location="editar?id="+id;
           
          },

  });
   $("#gridClientes").jqGrid('navGrid',"#pgridClientes",{edit:false,add:false,del:false});

   $('#gridClientes').jqGrid('filterToolbar', { searchOnEnter: false, enableClear:true});
 
    $(".ui-search-oper").hide();
    $(".clearsearchclass").hide(); 
    //$("#gs_id_cliente").hide();
    //$("#gs_Id_cliente").hide();
  

  //controles de grid clientes

  $("#nuevoCliente").click(function(){
   //sección de cliente

comprobarContactos= sessionStorage.getItem("comprobarContactos");
//alert("nuevo contacto? o nuevo cliente? numero de contactos:::" +comprobarContactos);
   $("#nombre").val("");
    $("#rfc").val("");
     $("#tel1").val("");
      $("#tel2").val("");
       $("#fax").val("");
        $("#correo").val("");
         $("#web").val("");
          //$("#fornuevocontacto").show();
          $("#tipo").focus();
          $('#tipo').prop('selectedIndex',0);
          $('#estatus').prop('selectedIndex',0);
           $("#fornuevocontacto").hide();
           $("#formDirecciones").hide();

     });

   $("#nuevoContacto").click(function(){
          //this.disabled = 'false';
         // $("#guardarConta").attr("disabled",true);
                
                $("#guardarConta").html("Guardar Contactos");
                $("#guardaDir").html("Guardar Dirección");
    //sección de contactos
                $("#nombreC").val("");
                $("#apellidosC").val("");
                $("#puestoC").val("");
                $("#tel1C").val("");
                $("#exten1").val("");
                $("#tel2C").val("");
                $("#exten2").val("");
                $("#celular").val("");
                $("#correoC").val("");
                $("#fechaN").val("");
                $("#face").val("");
                $("#tw").val("");
                $("#sky").val("");
                $("#fornuevocontacto").show();
                $("#formDirecciones").hide();
                $("#formMaquinas").hide();
                //mostrar form de direcciones
                //$("#formDirecciones").show();
              $('#tipoContacto option:eq(0)').prop('selected', true);
              $('#estatusC option:eq(0)').prop('selected', true);

              //seaemos la variable para que cambie el boton
              sessionStorage.setItem("botonForm",'guardarConta');
               $("#nuevo").disabled = true;

                document.getElementById("clientesG").reset();
                $("#guardaCliente").html("Guardar");
                $("#menuContacto").trigger("click");


  });

   $("#nuevaDireccion").click(function(){
   
    $("#formDirecciones").show();
    $("#fornuevocontacto").hide();
    $("#formMaquinas").hide();
                    $("#Id_direccion").val("");
                     $("#calle").val("");
                      $("#colonia").val("");
                       $("#ciudad").val("");
                        $("#muni").val("");
                         $("#estado").val("");
                          $("#cp").val("");
                           $("#nota").val("");
                           sessionStorage.setItem("botonForm",'guardaDir');
                           $('#tipoDireccion option:eq(0)').prop('selected', true);
                            $('#estatusD option:eq(0)').prop('selected', true);
                            $("#guardaCliente").html("Guardar");
                            $("#menuDir").trigger("click");

   });

  
  
  $("#cancelaCliente").click(function(){
     document.getElementById("clientesG").reset();
    $("#fornuevocontacto").hide();
    $("#formDirecciones").hide();
     
   $("#guardarConta").html("Guardar Contactos");
   $("#guardaDir").html("Guardar Dirección");
    
  });

  $("#clickM").click(function(){

    $("#clienteM").val($("#nombre").val());

  });

  $("#nuevoCliente").click(function(){

    $("#formClientes").show();
    $("#formMaquinas").hide();
  });

  $("#btnNuevoCliente").click(function(){
      /* $("#formDirecciones").show();
         $("#contactosD input").attr("disabled", false);
      $("#contactosD select").attr("disabled", false);*/
       $( "#dialog-clientes" ).dialog({
                      modal: true,
                      width: '1200',
                      buttons: {
                        Guardar: function() {
                     //$("#btnEditarDireccion").trigger("click");
                    $("#gCliente").trigger("click");

                     // $( this ).dialog( "close" );
                     },
                       Cancelar: function() {
                       
                          $("#gridClientes").trigger("reloadGrid");
                       //window.location="editar?id="+sessionStorage.getItem("id");
                          $( this ).dialog( "close" );
                      }
                }
              });

   });

 
              
 
    $("#btnEditarCliente").click(function(){
       $( "#dialog-editarClientes" ).dialog({
                      modal: true,
                     
                      width: '1200',
                      buttons: {
                        Regresar: function() {
                          $("#clientesG input").attr("disabled", true);
                          $("#clientesG select").attr("disabled", true);
                     
                      $( this ).dialog( "close" );
                        },
                        Actualizar: function() {
                     
                  datos=$("#clientesGAc").serialize();

                    $.post("editar/actualizarclientes",datos,
                      function(data){
                       $("#gridClientes").trigger("reloadGrid");
                       id=sessionStorage.getItem("id_cliente");
                       window.location="editar?id="+id;
                      },'json'

                      );
                      return false;
                     // $( this ).dialog( "close" );
                        }
                     },

                 });
      $("#clientesG input").attr("disabled", false);
      $("#clientesG select").attr("disabled", false);
      $( "#dialog-editarClientes" ).dialog("open");


    });

    $("#regresarClientes").click(function(){

       window.location="consultas";

    });
    


})
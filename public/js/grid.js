$(document).ready(function(){
var id;
var id_cliente;
$("#fornuevocontacto").hide();
$("#gridClientes").jqGrid({
   	url:'index/consultar',
	datatype: "json",
   	colNames:['id','Estatus', 'Nombre', 'RFC','Teléfono 1','Teléfono 2','Fax','Correo','web'],
   	colModel:[
   		{name:'Id_cliente',index:'Id_cliente', width:55},
   		{name:'Id_estatus',index:'Id_estatus', width:90, editable:true},
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
    width:'1200',
    height:'230',

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

  
  $("#buscar").click( function() {
    $('#gridClientes').jqGrid('filterToolbar', { searchOnEnter: false, enableClear: false });
    $(".ui-search-oper").hide();
    $(".clearsearchclass").hide(); 
    $("#gs_id_cliente").hide();
    $("#gs_id_estatus").hide();
                       
    });

  //controles de grid clientes

  $("#nuevoCliente").click(function(){
   //sección de cliente

comprobarContactos= sessionStorage.getItem("comprobarContactos");
alert("nuevo contacto? o nuevo cliente? numero de contactos:::" +comprobarContactos);
   $("#nombre").val("");
    $("#rfc").val("");
     $("#tel1").val("");
      $("#tel2").val("");
       $("#fax").val("");
        $("#correo").val("");
         $("#web").val("");
          $("#fornuevocontacto").show();
          $("#tipo").focus();
          $('#tipo').prop('selectedIndex',0);
          $('#estatus').prop('selectedIndex',0);

     
          //this.disabled = 'false';
         // $("#guardarConta").attr("disabled",true);
          
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


  });
  
  $("#cancelaCliente").click(function(){
     document.getElementById("clientesG").reset();
    $("#fornuevocontacto").hide();
    // $("#guardarConta,#nuevoCliente").attr("disabled",false);
     
  });

  //para mostrar el tiempo

 


})
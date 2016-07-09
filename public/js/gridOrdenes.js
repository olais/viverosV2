$(document).ready(function(){
var id;
var id_cliente;
$("#dialog-usuarios").hide();
$("#regUsuarios").hide();
 idCli = sessionStorage.getItem("id");
$("#gridOrdenes").jqGrid({
    url:'usuarios/consultausuarios',
  datatype: "json",
    colNames:['#Orden','Trabajo','Cliente', 'Fecha Solicitud', 'Fecha de entrega'],
    colModel:[
      {name:'Id_usuario',index:'Id_direccion', width:50},
      {name:'Descripcion',index:'Descripcion', width:200,editable:true},
      {name:'Usuario',index:'Usuario', width:55,editable:true},
      {name:'Password',index:'Password', width:100},
      {name:'Id_tipousuario',index:'Id_tipousuario', width:100},
      
   
    ],
    rowNum:10,
    rowList:[10,20,30,40,50],
    pager: '#pgridOrdenes',
    sortname: 'Id_Orden',
    viewrecords: true,
    sortorder: "desc",
    multiselect:false,
    width:'1115',
    height:'230',

    editurl: "index/direcciones", //aqui la url de la actualización
     caption: "Usuarios",

    //extraer valores
    onSelectRow: function (ids) {
         
             var s = $("#gridOrdenes").jqGrid('getGridParam','selrow');
             valores = s.toString().split(",");
              Id_usuario=$("#gridOrdenes").jqGrid('getRowData',s).Id_usuario;
               
              

           
          },

  });
   $("#gridOrdenes").jqGrid('navGrid',"#pgridUsuarios",{edit:false,add:false,del:false});
   $("#gridOrdenes").jqGrid('filterToolbar', { searchOnEnter: false, enableClear:true});
  
  $(".ui-search-oper").hide();
  $(".clearsearchclass").hide();
 

   $("#btnNuevaOrden").click(function(){
     
     window.location='ordenes';

   });

  
})


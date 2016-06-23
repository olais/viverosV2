$(document).ready(function(){
var id;
var id_cliente;
 idCli = sessionStorage.getItem("id");
$("#gridMaquinas").jqGrid({
    url:'index/maquinas?id='+idCli,
  datatype: "json",
    colNames:['id','Descripcion','PerfEnPegue','DescPerfEnPegue', 'Rama', 'MedidaRama','Pinza','MedidaPinza','Perforaciones','Centerline','MedidaCenterline','Desbarbe','Compensacion','NumPiezasCompensacion'],
    colModel:[
      {name:'Id_MaquinaC',index:'Id_MaquinaC', width:50},
      {name:'Descripcion',index:'Descripcion', width:300,editable:true},
      {name:'PerfEnPegue',index:'PerfEnPegue', width:50,editable:true},
      {name:'DescPerfEnPegue',index:'DescPerfEnPegue', width:200, align:"left",editable:true},
      {name:'Rama',index:'Rama', width:170, align:"left",editable:true},    
      {name:'MedidaRama',index:'MedidaRama', width:170,align:"left",editable:true},   
      {name:'Pinza',index:'Pinza', width:50, sortable:false,editable:true},
      {name:'MedidaPinza',index:'MedidaPinza', width:280, sortable:false,editable:true},
      {name:'Perforaciones',index:'Perforaciones', width:50, sortable:false,editable:true},
      {name:'Centerline',index:'Centerline', width:280, sortable:false,editable:true},
      {name:'MedidaCenterline',index:'MedidaCenterline', width:280, sortable:false,editable:true},
      {name:'Desbarbe',index:'Desbarbe', width:50, sortable:false,editable:true},
      {name:'Compensacion',index:'Compensacion', width:50, sortable:false,editable:true},
      {name:'NumPiezasCompensacion',index:'NumPiezasCompensacion', width:280, sortable:false,editable:true}

    ],
    rowNum:20,
    rowList:[10,20,30,40,50],
    pager: '#pgridMaquinas',
    sortname: 'Descripcion',
    viewrecords: true,
    sortorder: "desc",
    multiselect:false,
    width:'1200',
    height:'230',

    editurl: "index/maquinas", //aqui la url de la actualización
   
    caption: "Máquinas",

    //extraer valores
    onSelectRow: function (ids) {
         
             var s = $("#gridDirecciones").jqGrid('getGridParam','selrow');
             valores = s.toString().split(",");
              $("#guardaCliente").html("Actualizar");

           
          },

  });
   $("#gridMaquinas").jqGrid('navGrid',"#pgridMaquinas",{edit:false,add:false,del:false});
   $("#gridMaquinas").jqGrid('filterToolbar', { searchOnEnter: false, enableClear:true});
  
  $(".ui-search-oper").hide();
  $(".clearsearchclass").hide();
  $("#gs_Id_MaquinaC").hide();
    

})
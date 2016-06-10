$(document).ready(function(){
var id;
var id_cliente;
 idCli = sessionStorage.getItem("id");
$("#gridDirecciones").jqGrid({
    url:'editar/direcciones?id='+idCli,
  datatype: "json",
    colNames:['id', 'Calle', 'Colonia','Ciudad','Municipio','Estado','CP','Nota'],
    colModel:[
      {name:'Id_direccion',index:'Id_direccion', width:55},
      {name:'Calle',index:'Calle', width:280,editable:true},
      {name:'Colonia',index:'Colonia', width:200, align:"left",editable:true},
      {name:'Ciudad',index:'Ciudad', width:170, align:"left",editable:true},    
      {name:'Municipio',index:'Municipio', width:170,align:"left",editable:true},   
      {name:'Estado',index:'Estado', width:160, sortable:false,editable:true},
      {name:'CP',index:'CP', width:280, sortable:false,editable:true},
      {name:'Nota',index:'Nota', width:170, sortable:false,editable:true}

    ],
    rowNum:20,
    rowList:[10,20,30,40,50],
    pager: '#pgridDirecciones',
    sortname: 'Id_direccion',
    viewrecords: true,
    sortorder: "desc",
    multiselect:false,
    width:'1200',
    height:'230',

    editurl: "editar/direcciones", //aqui la url de la actualización
   
    caption: "Direcciones",

    //extraer valores
    onSelectRow: function (ids) {
         
             var s = $("#gridDirecciones").jqGrid('getGridParam','selrow');
             valores = s.toString().split(",");
              Id_direccion=$("#gridDirecciones").jqGrid('getRowData',s).Id_direccion;
               Calle=$("#gridDirecciones").jqGrid('getRowData',s).Calle;
                Colonia=$("#gridDirecciones").jqGrid('getRowData',s).Colonia;
                 Ciudad=$("#gridDirecciones").jqGrid('getRowData',s).Ciudad;
                  Municipio=$("#gridDirecciones").jqGrid('getRowData',s).Municipio;
                   Estado=$("#gridDirecciones").jqGrid('getRowData',s).Estado;
                    CP=$("#gridDirecciones").jqGrid('getRowData',s).CP;
                     Nota=$("#gridDirecciones").jqGrid('getRowData',s).Nota;
                    $("#Id_direccion").val(Id_direccion);
                     $("#calle").val(Calle);
                      $("#colonia").val(Colonia);
                       $("#ciudad").val(Ciudad);
                        $("#muni").val(Municipio);
                         $("#estado").val(Estado);
                          $("#cp").val(CP);
                           $("#nota").val(Nota);
             
               $("#formDirecciones").show();
               $("#fornuevocontacto").hide();
               $("#guardaDir").html("Actualizar");
               $("#identificadorDirecciones").val(1);





           
          },

  });
   $("#gridDirecciones").jqGrid('navGrid',"#pgridDirecciones",{edit:false,add:false,del:false});

  
  

})
$(document).ready(function(){
var id;
var id_cliente;
 idCli = sessionStorage.getItem("id");
$("#gridDirecciones").jqGrid({
    url:'index/direcciones?id='+idCli,
  datatype: "json",
    colNames:['id','Id_tipodireccion','Id_estatus', 'Calle', 'Colonia','Ciudad','Municipio','Estado','CP','Nota'],
    colModel:[
      {name:'Id_direccion',index:'Id_direccion', width:55},
      {name:'Id_tipodireccion',index:'Id_tipodireccion', width:55,hidden:true},
      {name:'Id_estatus',index:'Id_estatus', width:55,hidden:true},
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

    editurl: "index/direcciones", //aqui la url de la actualización
   
    caption: "Direcciones",

    //extraer valores
    onSelectRow: function (ids) {
         
             var s = $("#gridDirecciones").jqGrid('getGridParam','selrow');
             valores = s.toString().split(",");
              Id_direccion=$("#gridDirecciones").jqGrid('getRowData',s).Id_direccion;
              Id_tipodireccion=$("#gridDirecciones").jqGrid('getRowData',s).Id_tipodireccion;
              Id_estatus=$("#gridDirecciones").jqGrid('getRowData',s).Id_estatus;
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

                           if(Id_tipodireccion==10){
                             $('#tipoDireccion option:eq(1)').prop('selected', true);
                           }
                            if(Id_tipodireccion==11){
                            $('#tipoDireccion option:eq(2)').prop('selected', true);
                           }
                            if(Id_tipodireccion==12){
                            $('#tipoDireccion option:eq(3)').prop('selected', true);
                           }
                            
                            if(Id_estatus==10){
                               $('#estatusD option:eq(1)').prop('selected', true);
                             }else{
                              $('#estatusD option:eq(2)').prop('selected', true);
                             }
                              sessionStorage.setItem("botonForm",'guardaDir');
                             accionCambiosDir= sessionStorage.getItem("accionCambiosDir");
                         // if(accionCambiosDir==1){
              // $("#formDirecciones").show();
              //abrir modal para actualizar
               $("#btnEditarDireccion").show();
               $("#btnNuevoDireccion").trigger("click");
               $("#fornuevocontacto").hide();
               $("#guardaDir").html("Actualizar");
               $("#identificadorDirecciones").val(1);
               $("#identificadorContactos").val(0);
               $("#guardaCliente").html("Actualizar");
               $("#nota").attr("disabled", true);

               //deshabilitar inputs para editar
               $("#formDirecciones input").attr("disabled", true);
               $("#formDirecciones select").attr("disabled", true);
               //$("textarea").attr("disabled", "disabled");
               

           //  }





           
          },

  });
   $("#gridDirecciones").jqGrid('navGrid',"#pgridDirecciones",{edit:false,add:false,del:false});
   $("#gridDirecciones").jqGrid('filterToolbar', { searchOnEnter: false, enableClear:true});
  
  $(".ui-search-oper").hide();
  $(".clearsearchclass").hide();
  $("#gs_Id_direccion").hide();

      $("#btnNuevoDireccion").click(function(){
       $("#formDirecciones").show();
         $("#contactosD input").attr("disabled", false);
      $("#contactosD select").attr("disabled", false);
       $( "#dialog-direcciones" ).dialog({
                      modal: true,
                      width: '1200',
                      buttons: {
                        Guardar: function() {
                     $("#btnEditarDireccion").trigger("click");
                     $("#guardaDir").trigger("click");

                     // $( this ).dialog( "close" );
                     },
                       Cancelar: function() {
                         $("#nota").attr("disabled", false);
                      $("#cancelaClienteUno").trigger("click");
                      $("#gridDirecciones").trigger("reloadGrid");
                      /*$("#formDirecciones input").attr("disabled", false);
                      $("#formDirecciones select").attr("disabled", false);*/
                      $("#btnEditarDireccion").hide();
                      

                       //window.location="editar?id="+sessionStorage.getItem("id");
                          $( this ).dialog( "close" );
                      }
                }
              });

   });


//para el modo edición

$('#btnEditarDireccion').click(function () { //para el modo edición

       $("#btnEditarDireccion").removeClass("btn btn-primary");
    if ($('#contactosD input').attr('disabled')) {
        $("#btnEditarDireccion").addClass("btn btn-default");
      $("#contactosD input").attr("disabled", false);
      $("#contactosD select").attr("disabled", false);
      $("#nota").attr("disabled", false);
    } else {
        $("#btnEditarDireccion").addClass("btn btn-primary");
         $("#contactosD input").attr("disabled", true);
        $("#contactosD select").attr("disabled", true);
        $("#nota").attr("disabled", true);
       }
    });
    
    

})
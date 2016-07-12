$(document).ready(function(){
var id;
var id_cliente;
 idCli = sessionStorage.getItem("id");
$("#gridMaquinas").jqGrid({
    url:'index/maquinas?id='+idCli,
  datatype: "json",
    colNames:['id','Descripcion',/*'PerfEnPegue','DescPerfEnPegue',*/ 'Rama', 'MedidaRama','Pinza','MedidaPinza','Perforaciones','Centerline','MedidaCenterline','Desbarbe','Compensacion','NumPiezasCompensacion'],
    colModel:[
      {name:'Id_MaquinaC',index:'Id_MaquinaC', width:50},
      {name:'Descripcion',index:'Descripcion', width:300,editable:true},
     /* {name:'PerfEnPegue',index:'PerfEnPegue', width:50,editable:true},
      {name:'DescPerfEnPegue',index:'DescPerfEnPegue', width:200, align:"left",editable:true},*/
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
    rowNum:1000,
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
         
             var s = $("#gridMaquinas").jqGrid('getGridParam','selrow');
             valores = s.toString().split(",");

             Id_MaquinaC=$("#gridMaquinas").jqGrid('getRowData',s).Id_MaquinaC;
     Descripcion=$("#gridMaquinas").jqGrid('getRowData',s).Descripcion;
   PerfEnPegue=$("#gridMaquinas").jqGrid('getRowData',s).PerfEnPegue;
    DescPerfEnPegue=$("#gridMaquinas").jqGrid('getRowData',s).DescPerfEnPegue;
   Rama   =$("#gridMaquinas").jqGrid('getRowData',s).Rama;
      MedidaRama =$("#gridMaquinas").jqGrid('getRowData',s).MedidaRama;  
     Pinza=$("#gridMaquinas").jqGrid('getRowData',s).Pinza;
      MedidaPinza=$("#gridMaquinas").jqGrid('getRowData',s).MedidaPinza;
     Perforaciones=$("#gridMaquinas").jqGrid('getRowData',s).Perforaciones;
      Centerline=$("#gridMaquinas").jqGrid('getRowData',s).Centerline;
   MedidaCenterline=$("#gridMaquinas").jqGrid('getRowData',s).MedidaCenterline;
     Desbarbe=$("#gridMaquinas").jqGrid('getRowData',s).Desbarbe;
   Compensacion=$("#gridMaquinas").jqGrid('getRowData',s).Compensacion;
      NumPiezasCompensacion=$("#gridMaquinas").jqGrid('getRowData',s).NumPiezasCompensacion;
      $("#idM").val(Id_MaquinaC);
      $("#descripcionM").val(Descripcion);
  
      if(PerfEnPegue=="si"){
        $("#PerfEnPegueS").attr('checked', 'checked');
      }
      if(PerfEnPegue=="no"){
        $("#PerfEnPegueN").attr('checked', 'checked');
      }

      $("#DescPerfEnPegue").val(DescPerfEnPegue);

      if(Rama=="si"){
          $("#ramaS").attr('checked', 'checked');

      }
      if(Rama=="no"){
          $("#ramaN").attr('checked', 'checked');

      }
      $("#MedidaRama").val(MedidaRama);
      if(Pinza=="si"){

         $("#pinzaS").attr('checked', 'checked');
      }
      if(Pinza=="no"){

         $("#pinzaN").attr('checked', 'checked');
      }
      $("#MedidaPinza").val(MedidaPinza);

      if(Perforaciones=="si"){

         $("#perforacionesS").attr('checked', 'checked');
        
      }
      if(Perforaciones=="no"){
        
         $("#perforacionesN").attr('checked', 'checked');
        
      }
      if(Centerline=="si"){
         $("#centerlineS").attr('checked', 'checked');

      }
      if(Centerline=="no"){
         $("#centerlineN").attr('checked', 'checked');

      }
      $("#MedidaCenterline").val(MedidaCenterline);

      if(Desbarbe=="si"){
         $("#desbardeS").attr('checked', 'checked');

      }
       if(Desbarbe=="no"){
         $("#desbardeN").attr('checked', 'checked');
        
      }
      if(Compensacion=="si"){
         $("#compensacionS").attr('checked', 'checked');

      }
       if(Compensacion=="no"){
         $("#compensacionN").attr('checked', 'checked');

      }
      $("#NumPiezasCompensacion").val(NumPiezasCompensacion);

              $("#guardaCliente").html("Actualizar");
              $("#btnEditarMaquina").show();
              $("#btnNuevoMaquina").show();
               $("#btnNuevoMaquina").trigger("click")
               $("#clienteMaquina input").attr("disabled", true);
               $("#clienteMaquina select").attr("disabled", true);
              $("#identificadorMaquinas").val(1);
            //sessionStorage.setItem("botonForm",'guardaMaquina');
          },

  });
   $("#gridMaquinas").jqGrid('navGrid',"#pgridMaquinas",{edit:false,add:false,del:false});
   $("#gridMaquinas").jqGrid('filterToolbar', { searchOnEnter: false, enableClear:true});
  
  $(".ui-search-oper").hide();
  $(".clearsearchclass").hide();
  $("#gs_Id_MaquinaC").hide();
    $("#btnNuevoMaquina").click(function(){
       $("#formMaquinas").show();
       $("#clienteMaquina input").attr("disabled", false);
       $("#clienteMaquina select").attr("disabled", false);
       $( "#dialog-maquinas" ).dialog({
                      modal: true,
                      width: '1200',
                      buttons: {
                        Guardar: function() {
                          
                      $("#guardaMaquina").trigger("click");
                     // $("#guardaDir").trigger("click");
                     // $( this ).dialog( "close" );
                     },
                       Cancelar: function() {
                       $("#identificadorMaquinas").val(0);
                       $("#clienteMaquina input:radio").removeAttr("checked");
                      $("#cancelaClienteUno").trigger("click");
                      $("#gridMaquinas").trigger("reloadGrid");
                      $("#clienteMaquina input").attr("disabled", false);
                      $("#clienteMaquina select").attr("disabled", false);
                     $("#btnEditarMaquina").hide();

                          $( this ).dialog( "close" );
                      }
                }
              });

   });

$('#btnEditarMaquina').click(function () { //para el modo edición
  
       $("#btnEditarMaquina").removeClass("btn btn-primary");
    if ($('#clienteMaquina input').attr('disabled')) {
        $("#btnEditarMaquina").addClass("btn btn-default");
      $("#clienteMaquina input").attr("disabled", false);
      $("#clienteMaquina select").attr("disabled", false);
    
    } else {
        $("#btnEditarMaquina").addClass("btn btn-primary");
         $("#clienteMaquina input").attr("disabled", true);
        $("#clienteMaquina select").attr("disabled", true);

        
       
       }
    });
    

})
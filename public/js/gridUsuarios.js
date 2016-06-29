$(document).ready(function(){
var id;
var id_cliente;
$("#dialog-usuarios").hide();
$("#regUsuarios").hide();
 idCli = sessionStorage.getItem("id");
$("#gridUsuarios").jqGrid({
    url:'usuarios/consultausuarios',
  datatype: "json",
    colNames:['id','Descripcion','Usuario', 'Password', 'Id_tipousuario','Estatus','Id_estatus'],
    colModel:[
      {name:'Id_usuario',index:'Id_direccion', width:20},
      {name:'Descripcion',index:'Descripcion', width:200,editable:true},
      {name:'Usuario',index:'Usuario', width:55,editable:true},
      {name:'Password',index:'Password', width:50,hidden:true},
      {name:'Id_tipousuario',index:'Id_tipousuario', width:10,hidden:true},
      {name:'estatus',index:'estatus', width:50},
      {name:'Id_estatus',index:'Id_estatus', width:50,hidden:true}   
   
    ],
    rowNum:20,
    rowList:[10,20,30,40,50],
    pager: '#pgridUsuarios',
    sortname: 'Id_direccion',
    viewrecords: true,
    sortorder: "desc",
    multiselect:false,
    width:'1140',
    height:'230',

    editurl: "index/direcciones", //aqui la url de la actualización
   
    caption: "Usuarios",

    //extraer valores
    onSelectRow: function (ids) {
         
             var s = $("#gridUsuarios").jqGrid('getGridParam','selrow');
             valores = s.toString().split(",");
              Id_usuario=$("#gridUsuarios").jqGrid('getRowData',s).Id_usuario;
               Descripcion=$("#gridUsuarios").jqGrid('getRowData',s).Descripcion;
                Usuario=$("#gridUsuarios").jqGrid('getRowData',s).Usuario;
                 Password=$("#gridUsuarios").jqGrid('getRowData',s).Password;
                  Id_tipousuario=$("#gridUsuarios").jqGrid('getRowData',s).Id_tipousuario;
                    Id_estatus=$("#gridUsuarios").jqGrid('getRowData',s).Id_estatus;

             $("#btnNuevoUsuario").trigger("click")
              $("#usuario").val(Usuario);
              $("#pwd").val(Password);
              $("#desc").val(Descripcion);
              $("#tipoUser").val(Id_tipousuario);
              $("#estatusUser").val(Id_estatus);

              //deshabilitamos solo los inputs de usuarios
              $("#registraUsuarios input").attr("disabled",true);
              $("#registraUsuarios select").attr("disabled", true);

           
          },

  });
   $("#gridUsuarios").jqGrid('navGrid',"#pgridUsuarios",{edit:false,add:false,del:false});
   $("#gridUsuarios").jqGrid('filterToolbar', { searchOnEnter: false, enableClear:true});
  
  $(".ui-search-oper").hide();
  $(".clearsearchclass").hide();
  $("#gs_Id_direccion").hide();

   $("#btnNuevoUsuario").click(function(){
      // $("#formDirecciones").show();

       $( "#dialog-usuarios" ).dialog({
                      modal: true,
                      width: '1200',
                      buttons: {
                        Guardar: function() {
                   
                     $("#regUsuarios").trigger("click");

                     // $( this ).dialog( "close" );
                     },
                       Cancelar: function() {
                       
                          $( this ).dialog( "close" );
                      }
                }
              });

   });

   $('#btnEditarUsuario').click(function () { //para el modo edición
       $("#btnEditarUsuario").removeClass("btn btn-primary");
    if ($('#registraUsuarios input').attr('disabled')) {
        $("#btnEditarUsuario").addClass("btn btn-default");
        $("#registraUsuarios input").attr("disabled", false);
        $("#registraUsuarios select").attr("disabled", false);
    } else {
        $("#btnEditarUsuario").addClass("btn btn-primary");
        $("#registraUsuarios input").attr("disabled",true);
        $("#registraUsuarios select").attr("disabled", true);
       }
    });
   
})


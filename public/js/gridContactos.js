$(document).ready(function(){
var id;
var id_cliente;
 idCli = sessionStorage.getItem("id");

//comprobar si el cliente ya tiene contactos
var comprobar="id="+idCli;
$.post("editar/contactos",comprobar,
    function(data){
        if(data==""){
          sessionStorage.setItem("comprobarContactos",0);
         }
         else{
          sessionStorage.setItem("comprobarContactos",1);

         }

    },'json'

  );



$("#gridContactos").jqGrid({
    url:'editar/contactos?id='+idCli,
  datatype: "json",
   colNames:['id','idTipo','Id_estatus','Nombre', 'Apellidos','Puesto','Teléfono1','Extension1','Telefono2','Extension2','Celular','Correo','Fecha de Nac','Facebook','Twitter','Skype'],
    colModel:[
      {name:'Id_contacto',index:'Id_contacto', width:55},
      {name:'Id_tipocontacto',index:'Id_tipocontacto', width:55,hidden:true},
      {name:'Id_estatus',index:'Id_estatus', width:55,hidden:true},
      {name:'Nombre',index:'Nombre', width:280,editable:true},
      {name:'Apellidos',index:'Apellidos', width:200, align:"left",editable:true},
      {name:'Puesto',index:'Puesto', width:170, align:"left",editable:true},    
      {name:'Telefono1',index:'Telefono1', width:170,align:"left",editable:true},   
      {name:'Extension1',index:'Extension1', width:160, sortable:false,editable:true},
      {name:'Telefono2',index:'Telefono2', width:280, sortable:false,editable:true},
      {name:'Extension2',index:'Extension2', width:170, sortable:false,editable:true},
      {name:'Celular',index:'Celular', width:170, sortable:false,editable:true},
      {name:'Correo',index:'Correo', width:170, sortable:false,editable:true},
      {name:'Fec_Nac',index:'Fec_Nac', width:170, sortable:false,editable:true},
      {name:'Facebook',index:'Facebook', width:170, sortable:false,editable:true},
      {name:'Twitter',index:'Twitter', width:170, sortable:false,editable:true},
      {name:'Skype',index:'Skype', width:170, sortable:false,editable:true}
    ],
    rowNum:20,
    rowList:[10,20,30,40,50],
    pager: '#pgridContactos',
    sortname: 'Id_contacto',
    viewrecords: true,
    sortorder: "desc",
    multiselect:false,
    width:'1200',
    height:'230',

    editurl: "editar/contactos", //aqui la url de la actualización
   
    caption: "Contactos",

    //extraer valores
    onSelectRow: function (ids) {
         
             var s = $("#gridContactos").jqGrid('getGridParam','selrow');
             valores = s.toString().split(",");
             $("#"+s).dblclick(function(){
              Id_contacto=$("#gridContactos").jqGrid('getRowData',s).Id_contacto;
               tipo=$("#gridContactos").jqGrid('getRowData',s).Id_tipocontacto;
               Id_estatus=$("#gridContactos").jqGrid('getRowData',s).Id_estatus;
               Nombre=$("#gridContactos").jqGrid('getRowData',s).Nombre;
                Apellidos=$("#gridContactos").jqGrid('getRowData',s).Apellidos;
                 Puesto=$("#gridContactos").jqGrid('getRowData',s).Puesto;
                  Telefono1=$("#gridContactos").jqGrid('getRowData',s).Telefono1;
                   Extension1=$("#gridContactos").jqGrid('getRowData',s).Extension1;
                    Telefono2=$("#gridContactos").jqGrid('getRowData',s).Telefono2;
                     Extension2=$("#gridContactos").jqGrid('getRowData',s).Extension2;
                      Celular=$("#gridContactos").jqGrid('getRowData',s).Celular;
                        Correo=$("#gridContactos").jqGrid('getRowData',s).Correo;
                         Fec_Nac=$("#gridContactos").jqGrid('getRowData',s).Fec_Nac;
                          Facebook=$("#gridContactos").jqGrid('getRowData',s).Facebook;
                           Twitter=$("#gridContactos").jqGrid('getRowData',s).Twitter;
                            Skype=$("#gridContactos").jqGrid('getRowData',s).Skype;

                            //validacion de tipo
                            if(tipo==10){
                              $('#tipoContacto option:eq(1)').prop('selected', true)
                              }
                            if(Id_estatus==10){
                               $('#estatusC option:eq(1)').prop('selected', true);
                             }else{
                              $('#estatusC option:eq(2)').prop('selected', true);
                             }

                $("#fornuevocontacto").show();
                $("#idContacto").val(Id_contacto);
                $("#nombreC").val(Nombre);
                $("#apellidosC").val(Apellidos);
                $("#puestoC").val(Puesto);
                $("#tel1C").val(Telefono1);
                $("#exten1").val(Extension1);
                $("#tel2C").val(Telefono2);
                $("#exten2").val(Extension2);
                $("#celular").val(Celular);
                $("#correoC").val(Correo);
                $("#fechaN").val(Fec_Nac);
                $("#face").val(Facebook);
                $("#tw").val(Twitter);
                $("#sky").val(Skype);

                 $("#formDirecciones").hide();
                 $("#guardarConta").html("Actualizar");

                 $("#identificadorContactos").val(1);




             
                
              });
           
          },

  });
   $("#gridContactos").jqGrid('navGrid',"#pgridContactos",{edit:false,add:true,del:false});

  
  

})
$(document).ready(function(){

var grid = function(nombreGrid,caption, url,Campo1,Campo2,Campo3,Campo4,Campo5){
   
    this.url =nombreGrid;
    this.url =url;
    this.caption=caption;
    this.Campo1 = Campo1;
    this.Campo2 = Campo2;
    this.Campo3 = Campo3;
    this.Campo4 = Campo4;
    this.Campo5 = Campo5;
   
construccion(nombreGrid,caption,url,Campo1,Campo2,Campo3,Campo4,Campo5);

}
 
 function construccion(nombreGrid,caption,url,Campo1,Campo2,Campo3,Campo4,Campo5){
              var s;
              var valores=[];
                $(nombreGrid).jqGrid({
                url:url,
                datatype: "json",
                colNames:[Campo1,Campo2,Campo3,Campo4,Campo5],
                colModel: [
                    {name:Campo1,index:Campo1, width:100,align:'center'},
                    {name:Campo2,index:Campo2, width:100,align:"center"},
                    {name:Campo3,index:Campo3, width:100,align:"center"},
                    {name:Campo4,index:Campo4, width:100,align:"center"},
                    {name:Campo5,index:Campo5, width:50,align:"center"}
                            
                                
                ],
    
                   rowNum:500,
                   rowList:[10,20,30,1000],
                   pager:nombreGrid+"p",
                   sortname: Campo1,
                   viewrecords: true,
                   sortorder: "desc",
                   width:'1140',
                   height:'230',
                   multiselect:false,
                   caption:caption,
                  
                  onSelectRow: function (ids) {

                  
             var s = jQuery(nombreGrid).jqGrid('getGridParam','selrow');
             valores = s.toString().split(",");

             //aquí va la lógica
           
  
                 },         
                 
   })//fin de estructura de grid

}
//diseño
var objeto1 = new grid('#diseno','diseño en pendiente','ruta diseno','aaaaa','bbbb','ccccc','ddddd','Cantidad','eeee');
construccion(objeto1.nombreGrid,objeto1.caption,objeto1.url,objeto1.Campo1,objeto1.Campo2,objeto1.Campo3,objeto1.Campo4,objeto1.Campo5);

var objeto2 = new grid('#disenoProceso','diseño en proceso','ruta diseno','aaaaa','bbbb','ccccc','ddddd','Cantidad','eeee');
construccion(objeto2.nombreGrid,objeto2.caption,objeto2.url,objeto2.Campo1,objeto2.Campo2,objeto2.Campo3,objeto2.Campo4,objeto2.Campo5);

//corte
var objeto1 = new grid('#corte','corte en pendiente','ruta corte','aaaaa','bbbb','ccccc','ddddd','Cantidad','eeee');
construccion(objeto1.nombreGrid,objeto1.caption,objeto1.url,objeto1.Campo1,objeto1.Campo2,objeto1.Campo3,objeto1.Campo4,objeto1.Campo5);

var objeto2 = new grid('#corteProceso','corte en proceso','ruta corte','aaaaa','bbbb','ccccc','ddddd','Cantidad','eeee');
construccion(objeto2.nombreGrid,objeto2.caption,objeto2.url,objeto2.Campo1,objeto2.Campo2,objeto2.Campo3,objeto2.Campo4,objeto2.Campo5);

//doblado
var objeto1 = new grid('#doblado','doblado en pendiente','ruta doblado','aaaaa','bbbb','ccccc','ddddd','Cantidad','eeee');
construccion(objeto1.nombreGrid,objeto1.caption,objeto1.url,objeto1.Campo1,objeto1.Campo2,objeto1.Campo3,objeto1.Campo4,objeto1.Campo5);

var objeto2 = new grid('#dobladoProceso','doblado en proceso','ruta doblado','aaaaa','bbbb','ccccc','ddddd','Cantidad','eeee');
construccion(objeto2.nombreGrid,objeto2.caption,objeto2.url,objeto2.Campo1,objeto2.Campo2,objeto2.Campo3,objeto2.Campo4,objeto2.Campo5);

//armado

var objeto1 = new grid('#armado','armado en pendiente','ruta armado','aaaaa','bbbb','ccccc','ddddd','Cantidad','eeee');
construccion(objeto1.nombreGrid,objeto1.caption,objeto1.url,objeto1.Campo1,objeto1.Campo2,objeto1.Campo3,objeto1.Campo4,objeto1.Campo5);

var objeto2 = new grid('#armadoProceso','armado en proceso','ruta armado','aaaaa','bbbb','ccccc','ddddd','Cantidad','eeee');
construccion(objeto2.nombreGrid,objeto2.caption,objeto2.url,objeto2.Campo1,objeto2.Campo2,objeto2.Campo3,objeto2.Campo4,objeto2.Campo5);

//anulado
var objeto1 = new grid('#anulado','anulado en pendiente','ruta anulado','aaaaa','bbbb','ccccc','ddddd','Cantidad','eeee');
construccion(objeto1.nombreGrid,objeto1.caption,objeto1.url,objeto1.Campo1,objeto1.Campo2,objeto1.Campo3,objeto1.Campo4,objeto1.Campo5);

var objeto2 = new grid('#anuladoProceso','anulado en proceso','ruta anulado','aaaaa','bbbb','ccccc','ddddd','Cantidad','eeee');
construccion(objeto2.nombreGrid,objeto2.caption,objeto2.url,objeto2.Campo1,objeto2.Campo2,objeto2.Campo3,objeto2.Campo4,objeto2.Campo5);

//router
var objeto1 = new grid('#router','router en pendiente','ruta anulado','aaaaa','bbbb','ccccc','ddddd','Cantidad','eeee');
construccion(objeto1.nombreGrid,objeto1.caption,objeto1.url,objeto1.Campo1,objeto1.Campo2,objeto1.Campo3,objeto1.Campo4,objeto1.Campo5);

var objeto2 = new grid('#routerProceso','router en proceso','ruta anulado','aaaaa','bbbb','ccccc','ddddd','Cantidad','eeee');
construccion(objeto2.nombreGrid,objeto2.caption,objeto2.url,objeto2.Campo1,objeto2.Campo2,objeto2.Campo3,objeto2.Campo4,objeto2.Campo5);




});

 
<?php

class Application_Model_Menu_Constructor {
   
    protected  $inicio;
    protected  $planeacion;
    protected  $catalogos;
    protected  $salir;
    protected  $produccion;
    protected  $entregas;
    protected  $usuarios;
    protected  $baseUrl;


    public  function __construct () 
    {
        $front = Zend_Controller_Front :: getInstance (); 
        $this->baseUrl = $front->getBaseUrl();
                   
    }
         
    function getinicio(){
        $this->inicio=" <li class='active'>
                            <a href='".$this->baseUrl."/index' >Inicio</a>
                         </li>";
    return $this->inicio;
    }
    
    function getcatalogos($subpermiso)
    {
        $this->catalogos.="<li class='dropdown'>
                                <a class='dropdown-toggle' data-toggle='dropdown' href='#'>Catalogos <span class='caret'></span></a>
                                <ul class='dropdown-menu'>";
            if($subpermiso==1)
            {
                $this->catalogos.=" <li><a href='".$this->baseUrl."/consultas'>Clientes</a></li>";
            }
                                           
            $this->catalogos.="<li><a href='".$this->baseUrl."/usuarios'>Usuarios</a></li></ul></li> "; 
        return $this->catalogos;
    }
         
     function getplaneacion(){
            $this->planeacion="<li class='dropdown'>
                                <a class='dropdown-toggle' data-toggle='dropdown' href='".$this->baseUrl."/planeacion'>Planeación<span class='caret'></span></a>
                                  <ul class='dropdown-menu'>
                            <li><a href='".$this->baseUrl."/planeacion/registros'>Ordenes</a></li></ul></li>"; 
                                 
                                
        return $this->planeacion;
    }
    function getproduccion($diseno,$corte,$doblado,$armado,$aulado,$router){
          $this->produccion.="<li class='dropdown'>
                                <a class='dropdown-toggle' data-toggle='dropdown' href='#'>Produccion<span class='caret'></span></a>
                                 <ul class='dropdown-menu'>";
        if($diseno==1){
            $this->produccion.=" <li><a href='".$this->baseUrl."/produccion/diseno'>Diseño</a></li>";
        }
        if($corte==1){
            $this->produccion.=" <li><a href='".$this->baseUrl."/produccion/corte'>Corte</a></li>";
        }
        if($doblado==1){
            $this->produccion.=" <li><a href='".$this->baseUrl."/produccion/doblado'>Doblado</a></li>";
        }
        if($armado==1){
            $this->produccion.=" <li><a href='".$this->baseUrl."/produccion/armado'>Armado</a></li>";
        }
        if($aulado==1){
            $this->produccion.=" <li><a href='".$this->baseUrl."/produccion/anulado'>Aulado</a></li>";
        }      
        if($router==1){
            $this->produccion.=" <li><a href='".$this->baseUrl."/produccion/router'>Router</a></li>"; 
        }
                                            
            $this->produccion.="<!--li><a href='".$this->baseUrl."/maquinas'>Maquinas</a></li--></ul>  </li> "; 
        return $this->produccion;
    }
    function getentregas(){
            $this->entregas="<li><a hrfe='#'>Entregas</a></li>"; 
                                 
                                
        return $this->entregas;
    }
     function getusuarios(){
            $this->usuarios="<li><a hrfe='#'>Usuarios</a></li>"; 
                                 
                                
        return $this->usuarios;
    }
   function getmonitor(){
            $this->monitor="<li><a hrfe='#'>Monitor</a></li>"; 
                                 
                                
        return $this->monitor;
    }
    function  getsalir(){
       $this->salir="<li>
            <a href='".$this->baseUrl."/login/salir'>Salir</a></li>";
        return $this->salir;

    }
}

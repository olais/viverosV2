<?php

class Application_Model_Menu_Constructor {
   
    protected  $inicio;
    protected  $planeacion;
    protected  $catalogos;
    protected  $salir;
    protected  $produccion;
    protected  $baseUrl;


    public  function __construct () 
    {
        $front = Zend_Controller_Front :: getInstance (); 
        $this->baseUrl = $front->getBaseUrl();
                   
    }
         
    function getinicio(){
        $this->inicio=" <li>
                            <a href='".$this->baseUrl."/index/vista' >Inicio</a>
                         </li>";
    return $this->inicio;
    }
    
      function getcatalogos(){
            $this->catalogos="<li><a href='#'>sqsdd</a></li>"; 
                                 
                                
        return $this->catalogos;
    }
         
     function getplaneacion(){
            $this->planeacion="<li></li>"; 
                                 
                                
        return $this->planeacion;
    }
    
  
    function  getsalir(){
       $this->salir="<li>
            <a href='".$this->baseUrl."/index/logout'>Salir</a></li>";
        return $this->salir;

    }
}

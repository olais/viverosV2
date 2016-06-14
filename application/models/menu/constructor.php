<?php

class Application_Model_Menu_Constructor {
   
    protected  $inicio;
    protected  $planeacion;
    protected  $contabilidad;
    protected  $administracion;
    protected  $preprensa;
    protected  $prensa;
    protected  $controlCalidad;
    protected  $corteauto;
    protected  $laminado;
    protected  $cortemanual;
    protected  $barnizuv;
    protected  $engrapado;
    protected  $canvas;
    protected  $atnclientes;
    protected  $catalogos;
    protected  $salir;
    protected  $encuadernado;
    protected  $acabadomanual;
    protected  $empacado;
    protected  $envios;
    protected  $carteras;
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
                            <div class='dropdown_2columns'>
                                <div class='col_2'>
                                    <h2><font color=black>Bienvenido</font></h2>
                                </div>
                                <div class='col_1'>
                                    <img src='".$this->baseUrl."/img/logo_dots_azul_1.png' width='125' height='48' alt='' />
                                </div>
                                <div class='col_1'>
                                    <p><b><font color=black>Sistema Dots</font> </b></p>
                                </div>
                            </div>
                         </li>";
    return $this->inicio;
    }
    
         
     function getplaneacion(){
            $this->planeacion="<li>
                                   <span>Planeación</span>
                                   <div class='dropdown_1column'>
                                      <div class='col_1'>
                                            <ul>
                                            <li><a href='".$this->baseUrl."/planeacion' >Artículos</a></li>
                                            <li><a href='".$this->baseUrl."/planeacion/especiales' >Artículos Especiales</a></li>
                                            <li><a href='".$this->baseUrl."/planeacion/errorescomponentes' >Errores</a></li>
                                            <h3>Buscar</h3>
                                            <!--li><a href='".$this->baseUrl."/planeacion/statusgeneral' >Artículos</a></li-->
                                            <li><a href='".$this->baseUrl."/planeacion/ordenesdetalles' >Ordenes</a></li>
                                            <li><a href='".$this->baseUrl."/planeacion/ordenesinpo' >Ordenes sin PO</a></li>
                                            <!--li><a href='".$this->baseUrl."/planeacion/monitoreocomponentes' >Monitoreo</a></li-->
                                            <li><a href='".$this->baseUrl."/reimpresionetiquetas' >Reimpresión</a></li>
                                         </ul> 
                                       </div> 
                                    </div>
                                </li>"; 
        return $this->planeacion;
    }
    
    function getcontabilidad(){
            $this->contabilidad ="<li>
                                    <span>Contabilidad</span>
                                    <div class='dropdown_1column'>
                                      <div class='col_1'>
                                            <ul>
                                                <li><a href='".$this->baseUrl."/contabilidad/imprimart' >Imprimart</a></li>
                                                <li><a href='".$this->baseUrl."/contabilidad/imprimartmostrador' >Imprimart Mostrador</a></li>
                                                <hr>
                                                <li><a href='".$this->baseUrl."/contabilidad/fotosmile' >FotoSmile</a></li>
                                                <li><a href='".$this->baseUrl."/contabilidad/fotosmilemostrador' >FotoSmile Mostrador</a></li>
                                                <hr>
                                                <li><a href='".$this->baseUrl."/contabilidad/costco' >Costco</a></li>
                                                <li><a href='".$this->baseUrl."/contabilidad/fuji' >Fuji</a></li>
                                                <li><a href='".$this->baseUrl."/contabilidad/gandhi' >Gandhi</a></li>
                                         </ul>
                                      </div>
                                    </div>
                                </li>";
          return $this->contabilidad;
    }
        
    function  getadministracion(){
        $this->administracion=" <li>
                                    <span>Administración</span>
                                    <div class='dropdown_1column'>
                                        <div class='col_1'>
                                            <ul>
                                              <li><a href='".$this->baseUrl."/administracion/datosfacturacrion'>Datos de Facturación</a></li>
                                                <li><a href='".$this->baseUrl."/administracion/ordenesporpagar'>Ordenes por Pagar</a></li>
                                                <li><a href='".$this->baseUrl."/administracion/ordenespagadas'>Ordenes Pagadas</a></li>
                                              
                                            </ul>
                                            <h3>Buscador</h3>
                                            <ul>
                                                <li><a href='".$this->baseUrl."/administracion/detalleordenes'>Detalle de Ordenes</a></li>
                                            </ul>
                                        </div> 
                                    </div>
                                </li>";
        return $this->administracion;
    }
    
    function getproduccion(){
        $this->produccion = "<li id='liProduccion'>
                                <span>Producción</span>
                                <div class='dropdown_1column'>
                                    <div class='col_1'>
                                        <ul>"
                                            .$this->preprensa
                                            .$this->prensa
                                            .$this->controlCalidad
                                            .$this->corteauto
                                            .$this->laminado
                                            .$this->cortemanual
                                            .$this->barnizuv
                                            .$this->engrapado
                                            .$this->carteras
                                            .$this->encuadernado
                                            .$this->canvas
                                            .$this->acabadomanual
                                            .$this->empacado
                                            .$this->envios.
                                        "</ul>
                                     </div>
                                </div>
                            </li>";
        return $this->produccion;
    }
        
    function  setpreprensa(){
       $this->preprensa=" <li>
                    <h3 class='subMenu'>Pre-prensa</h3>
                    <div class='dropdown_4columns'>
                        <div class='col_3'>
                            <ul>
                                <li><a href='".$this->baseUrl."/preprensa' >Indigo</a></li>
                                <li><a href='".$this->baseUrl."/fotobooks' >Ploter</a></li>
                            </ul>
                        </div>
                    </div>
        </li>";
    }
    function  setprensa(){
        $this->prensa=" <li>
                            <h3 class='subMenu'>Prensa</h3>
                            <div class='dropdown_4columns'>
                                <div class='col_3'>
                                    <h3>Codigo de Barras</h3>
                                    <ul>
                                        <li><a href='".$this->baseUrl."/planeacion/etiquetallavetriple' >Indigo</a></li>
                                        <li><a href='".$this->baseUrl."/ploter/segumientocodigobarras' >Ploter</a></li>
                                    </ul>
                                    <h3>Manual</h3>
                                    <ul>
                                        <li><a href='".$this->baseUrl."/prensa' >Indigo</a></li>
                                        <li><a href='".$this->baseUrl."/preprensa/ploter' >Ploter</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>";
    }

    function  setcontrolcalidad(){
        $this->controlCalidad="  <li>
                                    <h3 class='subMenu'>Control de Calidad</h3>
                                    <div class='dropdown_4columns'>
                                        <div class='col_3'>
                                            <h3>Codigo de Barras</h3>
                                            <ul>
                                                <li><a href='".$this->baseUrl."/controlcalidad/segumientocodigobarras' >Componentes</a></li>
                                            </ul>
                                            <h3>Manual</h3>
                                            <ul>
                                                <li><a href='".$this->baseUrl."/controlcalidad' >Componentes</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>";
    }

    function  setcorteauto(){
       $this->corteauto="  <li>
                                <h3 class='subMenu'>Corte Automático</h3>
                                <div class='dropdown_4columns'>
                                    <div class='col_3'>
                                        <h3>Codigo de Barras</h3>
                                        <ul>
                                            <li><a href='".$this->baseUrl."/corte/segumientobarrasauto' >Corte</a></li>
                                            <li><a href='".$this->baseUrl."/corte/seguimientobarrasrefi' >Refinado</a></li>
                                        </ul>
                                        <h3>Manual</h3>
                                        <ul>
                                            <li><a href='".$this->baseUrl."/corte/automatico' >Corte</a></li>
                                            <li><a href='".$this->baseUrl."/corte/refinado' >Refinado</a></li>
                                            <li><a href='".$this->baseUrl."/corte/refinadopastasuave' >Refinado Pasta</a></li>
                                        </ul>
                                    </div>
                                </div>
                        </li>";
    }

    function  setlaminado(){
       $this->laminado=" <li>
                            <h3 class='subMenu'>Laminado</h3>
                            <div class='dropdown_4columns'>
                                <div class='col_3'>
                                    <h3>Codigo de Barras</h3>
                                    <ul>
                                        <li><a href='".$this->baseUrl."/laminado/seguimientobarrasmate' >Mate</a></li>
                                        <li><a href='".$this->baseUrl."/laminado/seguimientobarrasbri' >Brillante</a></li>
                                        <li><a href='".$this->baseUrl."/laminado/seguimientobarrascontrol' >Control de Calidad</a></li>
                                    </ul>
                                    <h3>Manual</h3>
                                    <ul>
                                        <li><a href='".$this->baseUrl."/laminado' >Mate</a></li>
                                        <li><a href='".$this->baseUrl."/laminado/brillante' >Brillante</a></li>
                                        <li><a href='".$this->baseUrl."/laminado/controlcalidad' >Control de Calidad</a></li>
                                        <li><a href='".$this->baseUrl."/laminado/rayado' >Rayado</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>";
    }

    function  setcortemanual(){
       $this->cortemanual=" <li>
                                <h3 class='subMenu'>Corte Manual</h3>
                                <div class='dropdown_4columns'>
                                    <div class='col_3'>
                                        <h3>Codigo de Barras</h3>
                                        <ul>
                                            <li><a href='".$this->baseUrl."/corte/seguimientocodigomanual' >Componentes</a></li>
                                        </ul>
                                        <h3>Manual</h3>
                                        <ul>
                                            <li><a href='".$this->baseUrl."/corte/manual' >Componentes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>";
    }

    function  setbarnizuv(){
       $this->barnizuv=" <li>
                            <h3 class='subMenu'>Barniz UV</h3>
                            <div class='dropdown_4columns'>
                                <div class='col_3'>
                                    <h3>Codigo de Barras</h3>
                                    <ul>
                                    
                                    <li><a href='".$this->baseUrl."/barnizuv/seguimientobarrasbarniz' >Barniz</a></li>
                                        <li><a href='".$this->baseUrl."/barnizuv/seguimientobarrascontrol' >Control de calidad</a></li>


                                       
                                    </ul>
                                    <h3>Manual</h3>
                                    <ul>
                                         <li><a href='".$this->baseUrl."/barnizuv' >Barniz</a></li>
                                        <li><a href='".$this->baseUrl."/barnizuv/controlcalidad' >Control de calidad</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>";
    }

    function  setengrapado(){
       $this->engrapado=" <li>
                            <h3 class='subMenu'>Engrapado</h3>
                            <div class='dropdown_4columns'>
                                <div class='col_3'>
                                    <h3>Codigo de Barras</h3>
                                    <ul>
                                    
                                     <li><a href='".$this->baseUrl."/engrapado/seguimientobarrasengrapado' >Engrapado</a></li>
                                        <li><a href='".$this->baseUrl."/wire/seguimientocodigobarras' >Wire-O</a></li>
                                        <li><a href='".$this->baseUrl."/engrapado/seguimientobarrasple' >Plecado</a></li>
                                        <li><a href='".$this->baseUrl."/engrapado/seguimientobarrassuave' >Encuadernado pasta</a></li>
                                    </ul>
                                    <h3>Manual</h3>
                                    <ul>
                                       <li><a href='".$this->baseUrl."/engrapado' >Engrapado</a></li>
                                        <li><a href='".$this->baseUrl."/wire' >Wire-O</a></li>
                                        <li><a href='".$this->baseUrl."/engrapado/plecado' >Plecado</a></li>
                                        <li><a href='".$this->baseUrl."/engrapado/encuadernadopastasuave' >Encuadernado pasta</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>";
    }

    function  setcanvas(){
       $this->canvas="<li>
                            <h3 class='subMenu'>Canvas</h3>
                            <div class='dropdown_4columns'>
                                <div class='col_3'>
                                    <h3>Codigo de Barras</h3>
                                    <ul>
                                    <li><a href='".$this->baseUrl."/canvas/seguimientomontado' >Montado</a></li>
                                        <li><a href='".$this->baseUrl."/canvas/seguimientoenmarcado' >Enmarcado</a></li>
                                        <li><a href='".$this->baseUrl."/canvas/seguimientoempacado' >Empacado</a></li>


                                       
                                    </ul>
                                    <h3>Manual</h3>
                                    <ul>
                                         <li><a href='".$this->baseUrl."/canvas/montado' >Montado</a></li>
                                        <li><a href='".$this->baseUrl."/canvas/enmarcado' >Enmarcado</a></li>
                                        <li><a href='".$this->baseUrl."/canvas/empacado' >Empacado</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>";
    }

    function setacabadomanual(){
           $this->acabadomanual="<li>
                                    <h3 class='subMenu'>Acabado Manual</h3>
                                    <div class='dropdown_4columns'>
                                        <div class='col_3'>
                                            <h3>Codigo de Barras</h3>
                                            <ul>
                                            <li><a href='".$this->baseUrl."/acabadomanual/seguimientoacabadorefinado' >Refinado</a></li>
                                                <li><a href='".$this->baseUrl."/acabadomanual/seguimientoacabadoensamblado' >Ensamblado</a></li>



                                               
                                            </ul>
                                            <h3>Manual</h3>
                                            <ul>
                                                 <li><a href='".$this->baseUrl."/acabadomanual/refinado' >Refinado</a></li>
                                                <li><a href='".$this->baseUrl."/acabadomanual/ensamblado' >Ensamblado</a></li>
                                                <li><a href='".$this->baseUrl."/acabadomanual/bastidores' >Bastidor</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>";
    }
    
    function  getatnclientes(){
       $this->atnclientes="<li>
                                <span>Atención a Clientes</span>
                                <div class='dropdown_1column'>
                                    <div class='col_1'>
                                        <ul>
                                            <li><a href='".$this->baseUrl."/atnclientes/detalleordenes'>Ordenes</a></li>
                                            <li><a href='".$this->baseUrl."/atnclientes/errores'>Errores</a></li>
                                        </ul> 
                                    </div> 
                                </div>
                            </li>";
        return $this->atnclientes;
    }

    function  getcatalogos(){
       $this->catalogos=" <li>
                            <span>Catalogos</span>
                            <div class='dropdown_1column'>
                                <div class='col_1'>
                                    <ul>
                                        <li><a href='".$this->baseUrl."/catpersonas/altausuarios'>Usuarios</a></li>
                                        <li><a href='#'>Clientes</a></li>
                                        <li><a href='#'>Articulos</a></li>
                                        <li><a href='#'>Archivos</a></li>
                                    </ul> 
                                </div> 
                            </div>
                        </li>";
        return $this->catalogos;
    }

    function  setempacado(){
       $this->empacado="<li>
                            <h3 class='subMenu'>Empacado</h3>
                            <div class='dropdown_4columns'>
                                <div class='col_3'>
                                    <h3>Codigo de Barras</h3>
                                    <ul>
                                    

                                     <li><a href='".$this->baseUrl."/empacado/seguimientocodigobarras' >Componentes</a></li>
                                     
                                    </ul>
                                    <h3>Manual</h3>
                                    <ul>
                                          <li><a href='".$this->baseUrl."/empacado' >Componentes</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>";
    }

    function  setencuadernado(){
       $this->encuadernado="<li>
                                <h3 class='subMenu'>Encuadernado</h3>
                                <div class='dropdown_4columns'>
                                    <div class='col_3'>
                                        <h3>Codigo de Barras</h3>
                                        <ul>
                                        <li><a href='".$this->baseUrl."/engrapado/seguimientocodigoencuad' >Componentes</a></li>
                                          
                                        </ul>
                                        <h3>Manual</h3>
                                        <ul>
                                             <li><a href='".$this->baseUrl."/encuadernado' >Componentes</a></li> 
                                          
                                        <!--  <li><a href='".$this->baseUrl."/engrapado/encuadernadopastasuave'>Encuadernado pasta</a></li>-->
                                        </ul>
                                    </div>
                                </div>
                            </li>";
    }
    function setcarteras(){
       $this->carteras="<li>
                            <h3 class='subMenu'>Carteras</h3>
                            <div class='dropdown_4columns'>
                                <div class='col_3'>
                                    <h3>Codigo de Barras</h3>
                                    <ul>
                                    <li><a href='".$this->baseUrl."/carteras/segumientobarras' >Componentes</a></li>
                                      
                                    </ul>
                                    <h3>Manual</h3>
                                    <ul>
                                         <li><a href='".$this->baseUrl."/carteras' >Componentes</a></li> 
                                    </ul>
                                </div>
                            </div>
                        </li>";
    }
    function  setenvios(){
       $this->envios="<li>
                        <h3 class='subMenu'>Envios</h3>
                        <div class='dropdown_4columns'>
                            <div class='col_3'>
                                <ul>
                                    <li><a href='".$this->baseUrl."/envios' >Por Enviar</a></li>
                                    <li><a href='".$this->baseUrl."/enviaradireccion/recogertienda' >Recoger en Tienda</a></li>
                                    <!--li><a href='".$this->baseUrl."/enviaradireccion/ordnesenviadas' >Enviados</a></li-->
                            </div>
                        </div>
                    </li>";
    }
    function  getsalir(){
       $this->salir="<li>
            <a href='".$this->baseUrl."/index/logout'>Salir</a></li>";
        return $this->salir;

    }
}

<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $auth = Zend_Auth::getInstance(); 
        if (!$auth->hasIdentity()) { 
        $this->_redirect('login'); 
        } 
    }

    public function indexAction()
    {
      $model = new Application_Model_DbTable_Menu();
      $crearmenu  = new Zend_Session_Namespace('crearmenu');
      $crearmenu->menu = $model->Buscar();

    }
    public function altasAction(){
        
    }
    
    public function consultarAction(){
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        $_search=$_REQUEST['_search'];
        if($_search=="true"){
 
         $estatus=(isset($_REQUEST['Id_estatus']))? $_REQUEST['Id_estatus'] : '';
         $nombre=(isset($_REQUEST['Nombre']))? $_REQUEST['Nombre'] : '';
         $rfc=(isset($_REQUEST['RFC']))? $_REQUEST['RFC'] : '';
         $tel1=(isset($_REQUEST['Telefono1']))? $_REQUEST['Telefono1'] : '';
         $tel2=(isset($_REQUEST['Telefono2']))? $_REQUEST['Telefono2'] : '';
         $fax=(isset($_REQUEST['Fax']))? $_REQUEST['Fax'] : '';
         $web=(isset($_REQUEST['Web']))? $_REQUEST['Web'] : '';
         $correo=(isset($_REQUEST['Correo']))? $_REQUEST['Correo'] : '';
         $con=new Application_Model_Logica();
         $datos=  $con->consultarFiltro($_search,$estatus,$nombre,$rfc,$tel1,$tel2, $fax,$correo,$web);
       
       return $datos;
     }
     else{
         $con=new Application_Model_Logica();
         $datos=  $con->consultarTodos();
      
         return $datos;

     }



      
    }

    public function contactosAction(){

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
         $_search=$_REQUEST['_search'];
        if($_search=="true"){
       
                                
            $nombre=(isset($_REQUEST['Nombre']))? $_REQUEST['Nombre'] : '';
            $apellido=(isset($_REQUEST['Apellidos']))? $_REQUEST['Apellidos'] : '';
            $puesto=(isset($_REQUEST['Puesto']))?  $_REQUEST['Puesto'] : '';
            $tel1=(isset( $_REQUEST['Telefono1']))?  $_REQUEST['Telefono1'] : '';
            $ext1=(isset($_REQUEST['Extension1']))? $_REQUEST['Extension1'] : '';
            $tel2=(isset($_REQUEST['Telefono2']))? $_REQUEST['Telefono2'] : '';
            $ext2=(isset($_REQUEST['Extension2']))? $_REQUEST['Extension2'] : '';
            $celular=(isset($_REQUEST['Celular']))? $_REQUEST['Celular'] : '';
            $correo=(isset($_REQUEST['Correo']))?  $_REQUEST['Correo'] : '';
            $Fec_Nac=(isset( $_REQUEST['Fec_Nac']))?  $_REQUEST['Fec_Nac'] : '';
            $fb=(isset($_REQUEST['Facebook']))? $_REQUEST['Facebook'] : '';
            $tw=(isset($_REQUEST['Twitter']))? $_REQUEST['Twitter'] : '';
            $sky=(isset($_REQUEST['Skype']))? $_REQUEST['Skype'] : '';


        $con=new Application_Model_Logica();
        $datos=  $con->consultarContactosFiltros($_search,$nombre,$apellido,$puesto,$tel1,$ext1,$tel2,$ext2,$celular,$correo,$Fec_Nac,$fb,$tw,$sky);
            return $datos;

         }else{
            $id_cliente=$_REQUEST['id'];
            $con=new Application_Model_Logica();
            $datos=  $con->consultarContactos($id_cliente);
            return $datos;
       
         }
   
    }
     public function direccionesAction(){

      $this->_helper->layout->disableLayout();
      $this->_helper->viewRenderer->setNoRender();
      $id_cliente=$_REQUEST['id'];
      $con=new Application_Model_Logica();
      $datos=  $con->consultarDirecciones($id_cliente);
       
       echo json_encode($datos);   
    }




    
   
    

}
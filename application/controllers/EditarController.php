<?php

class EditarController extends Zend_Controller_Action
{

    public function init()
    {
         
    }

    public function indexAction()

    {
     
        $id_cliente=$_REQUEST['id'];
        $con=new Application_Model_Logica();
        $clientes=  $con->consultarCliente($id_cliente);
        $this->view->clientes=$clientes;  

                 
    }

    public function contactosAction(){

      $this->_helper->layout->disableLayout();
      $this->_helper->viewRenderer->setNoRender();
      $id_cliente=$_REQUEST['id'];
      $con=new Application_Model_Logica();
      $datos=  $con->consultarContactos($id_cliente);
       
       echo json_encode($datos);   
    }

     public function direccionesAction(){

      $this->_helper->layout->disableLayout();
      $this->_helper->viewRenderer->setNoRender();
      $id_cliente=$_REQUEST['id'];
      $con=new Application_Model_Logica();
      $datos=  $con->consultarDirecciones($id_cliente);
       
       echo json_encode($datos);   
    }

    public function guardarclienteAction(){
      $this->_helper->layout->disableLayout();
      $this->_helper->viewRenderer->setNoRender();
      $tipo=$_REQUEST['tipo'];
      $estatus=$_REQUEST['estatus'];
      $nombre=$_REQUEST['nombre'];
      $rfc=$_REQUEST['rfc'];
      $tel1=$_REQUEST['tel1'];
      $tel2=$_REQUEST['tel2'];
      $fax=$_REQUEST['fax'];
      $correo=$_REQUEST['correo'];
      $web=$_REQUEST['web'];

      $insert=array(
        "Id_cliente"=>"",
        "Id_tipoCliente"=>$tipo,
        "Id_estatus"=>$estatus,
        "Nombre"=>$nombre,
        "RFC"=>$rfc,
        "Telefono1"=>$tel1,
        "Telefono2"=>$tel2,
        "Fax"=>$fax,
        "Correo"=>$correo,
        "Web"=>$web

        );

      $con=new Application_Model_Logica();
      $datos=  $con->nuevoCliente($insert);

      $response=new stdClass();
      $response->id=$datos;

      echo json_encode($response);

    }
   
}






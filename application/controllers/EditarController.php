<?php

class EditarController extends Zend_Controller_Action
{

    public function init()
    {
         
    }

    public function indexAction()
    {
       $id_cliente=$_REQUEST['id'];

       $response=new stdClass();
       $con=new Application_Model_Logica();
       $datos=  $con->consultarContactos($id_cliente);
       $clientes=  $con->consultarCliente($id_cliente);
       
        $this->view->id_cliente=$datos;   
        $this->view->clientes=$clientes;              
    }

   
}






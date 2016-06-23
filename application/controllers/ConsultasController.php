<?php

class ConsultasController extends Zend_Controller_Action
{

    public function init()
    {
         
    }

    public function indexAction()
    {
         $con=new Application_Model_Logica();
         $datos=  $con->consultatTiposClientes();

         $this->view->datos=$datos;
    }

   
}






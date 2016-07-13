<?php

class ConsultasController extends Zend_Controller_Action
{

    public function init()
    {
        $auth = Zend_Auth::getInstance(); 
        if (!$auth->hasIdentity())
        { 
            $this->_redirect('login'); 
        }
    }

    public function indexAction()
    {
         $con=new Application_Model_Logica();
         $datos=  $con->consultatTiposClientes();

         $this->view->datos=$datos;
    }

   
}






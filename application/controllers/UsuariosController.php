<?php

class UsuariosController extends Zend_Controller_Action
{

    public function init()
    {
         
    }

    public function indexAction()
    {
        
    	 $con=new Application_Model_Logica();
         $datos=  $con->consultatTiposUsuarios();
	     $this->view->datos=$datos;


    }

    public function registroAction(){

       $this->_helper->layout->disableLayout();
       $this->_helper->viewRenderer->setNoRender();

        $usuarios=array(
          "Descripcion"=>$_REQUEST['desc'],
          "Usuario"=>$_REQUEST['usuario'],
          "Password"=>$_REQUEST['pwd'],
          "Id_tipousuario"=>$_REQUEST['tipoUser'],
          "Id_estatus"=>$_REQUEST['estatusUser']
          );

          
      $con=new Application_Model_Usuarios();
      $datos=  $con->guardarUsuarios($usuarios);
      $response=new stdClass();
      $response->id=$datos;
     
      echo json_encode($response);




    }
   
}






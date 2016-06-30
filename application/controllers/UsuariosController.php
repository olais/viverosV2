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

    public function consultausuariosAction(){
      $this->_helper->layout->disableLayout();
      $this->_helper->viewRenderer->setNoRender();
      $con=new Application_Model_Usuarios();
       $_search=$_REQUEST['_search'];
        if($_search=="true"){
             $Descripcion=(isset($_REQUEST['Descripcion']))? $_REQUEST['Descripcion'] : '';
              $Usuario=(isset($_REQUEST['Usuario']))? $_REQUEST['Usuario'] : '';
               $tipo=(isset($_REQUEST['tipousuario']))? $_REQUEST['tipousuario'] : '';
                 $estatus=(isset($_REQUEST['estatus']))? $_REQUEST['estatus'] : '';

     return $datos=  $con->consultaUsuariosFiltros($_search,$Descripcion,$Usuario,$tipo,$estatus);
      

        }else{

      $response=new stdClass();
      $datos=  $con->consultaUsuarios();
      $response=new stdClass();
      echo json_encode($datos);
            }
     
      

    }
   
    public function actualizarregistrosAction(){

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
      $datos=  $con->actualizarUsuarios($usuarios,$_REQUEST['idUsuario']);
      $response=new stdClass();
      $response->id=$datos;
     
      echo json_encode($response);


    }


}






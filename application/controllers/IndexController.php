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
       $crearmenu->menu = $model->llenarMenu();

    }
    public function altasAction(){
        
    }
    
    public function consultarAction(){
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        $response=new stdClass();
        $con=new Application_Model_Logica();
        $datos=  $con->consultarTodos();
         echo json_encode($datos);
      
    }

    public function contactosAction(){

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        $response=new stdClass();
        $con=new Application_Model_Logica();
        $datos=  $con->consultarContactos();
         




    }



    
   
    

}
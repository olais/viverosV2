<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        
    }

    public function indexAction()
    {
          
        //$this->_helper->layout->disableLayout();
        //$this->_helper->viewRenderer->setNoRender();

    }
    public function altasAction(){
        
        //$this->_helper->layout->disableLayout();
        //$this->_helper->viewRenderer->setNoRender();
      
         
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
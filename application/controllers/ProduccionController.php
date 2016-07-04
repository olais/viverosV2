<?php

class ProduccionController extends Zend_Controller_Action
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

     

    }
    public function disenoAction(){
        
    }
    public function corteAction(){
        
    }
    public function dobladoAction(){
        
    }
    public function armadoAction(){
        
    }
    public function anuladoAction(){
        
    }
    public function routerAction(){
        
    }

    public function llenardisenopAction(){
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();

       $proceso=new Application_Model_Produccion();
       $datos=  $proceso->disenoProceso();
       
       
       echo json_encode($datos);

    }
}
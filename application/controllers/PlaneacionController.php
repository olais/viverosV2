<?php

class PlaneacionController extends Zend_Controller_Action
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
        // action body
    }
     public function ordenesAction()
    {
        // action body
    }
    public function registrosAction(){

        
    }
   
}






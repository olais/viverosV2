<?php
    class LoginController extends Zend_Controller_Action
    {

        public function init()
        {

        }

        public function indexAction()
        {
            $this->_helper->layout->setLayout('login');
        }

        public function sessionAction()
        {
            $this->_helper->layout->disableLayout();
            $this->_helper->viewRenderer->setNoRender();
            $usuario=$_POST['usuario'];
            $pass=$_POST['password'];
            $response = new stdClass();
            try
            {
                $login = new Application_Model_Sesion();
                $login->login($usuario,$pass);
                $response->exito="true";
            }
            catch (Exception $e)
            {
                $response->exito="false";
                $response->validacion=$e->getMessage();
            } 
            echo json_encode($response);
        }

        public function salirAction()
        {
            $this->_helper->layout->disableLayout();
            $this->_helper->viewRenderer->setNoRender();

            // destroy de la sesion
            Zend_Auth::getInstance()->clearIdentity();
            //Zend_Session::namespaceUnset('mysession');
            Zend_Session::destroy();
            $front =Zend_Controller_Front :: getInstance (); 
            $baseUrl = $front -> getBaseUrl ();
            $this->render();
        }
    }
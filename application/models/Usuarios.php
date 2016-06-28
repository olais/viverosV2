<?php
class Application_Model_Usuarios extends Zend_Db_Table_Abstract
{
     protected $_name = 'usuarios';
     protected $_primary = 'Id_usuario';
     
   function guardarUsuarios($datos){
    
      return $this->insert($datos);

   }

   
   
}


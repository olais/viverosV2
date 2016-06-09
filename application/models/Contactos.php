<?php
class Application_Model_Contactos extends Zend_Db_Table_Abstract
{
     protected $_name = 'contactos';
     protected $_primary = 'Id_contacto';
     
   function nuevoCliente($insert){
     
      return $this->insert($insert);

   }
   
}


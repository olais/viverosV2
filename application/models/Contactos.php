<?php
class Application_Model_Contactos extends Zend_Db_Table_Abstract
{
     protected $_name = 'contactos';
     protected $_primary = 'Id_contacto';
     
   function actualizaContacto($datos){
    
    $where = "Id_contacto =7";
   return $this->update($datos, $where);

   }
   
}


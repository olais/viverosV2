<?php
class Application_Model_Contactos extends Zend_Db_Table_Abstract
{
     protected $_name = 'contactos';
     protected $_primary = 'Id_contacto';


  function nuevoContacto($insert){
     
      return $this->insert($insert);


   }
     
   function actualizaContacto($datos,$Id_contacto){
    
    $where = "Id_contacto =$Id_contacto";
   return $this->update($datos, $where);

   }
   
}


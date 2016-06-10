<?php
class Application_Model_Direcciones extends Zend_Db_Table_Abstract
{
     protected $_name = 'direcciones';
     protected $_primary = 'Id_direccion';
     
   function guardarDirecciones($datos){
    
      return $this->insert($datos);

   }

    function actualizaDirecciones($datos,$Id_direccion){
    
    $where = "Id_direccion =$Id_direccion";
    return $this->update($datos, $where);

   }
   
}


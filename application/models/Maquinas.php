<?php
class Application_Model_Maquinas extends Zend_Db_Table_Abstract
{
     protected $_name = 'maquinasclientes';
     protected $_primary = 'Id_MaquinaC';
     
   function guardarMaquinas($datos){
    
      return $this->insert($datos);

   }

    function actualizaMaquinas($datos,$Id_maquina){
    
    $where = "Id_direccion =$Id_direccion";
    return $this->update($datos, $where);

   }
   
}


<?php
class Application_Model_Maquinas extends Zend_Db_Table_Abstract
{
     protected $_name = 'maquinas_clientes';
     protected $_primary = 'Id_MaquinaC';
     
   function guardarMaquinas($datos){
    
      return $this->insert($datos);

   }

    function actualizarMaquinas($datos,$Id_maquina){
    
    $where = "Id_MaquinaC=$Id_maquina";
    return $this->update($datos, $where);

   }
   
}


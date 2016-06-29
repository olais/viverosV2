<?php
class Application_Model_Usuarios extends Zend_Db_Table_Abstract
{
     protected $_name = 'usuarios';
     protected $_primary = 'Id_usuario';
     
   function guardarUsuarios($datos){
    
      return $this->insert($datos);

   }
    function consultaUsuarios(){

    	  $db = Zend_Db_Table_Abstract::getDefaultAdapter();
          $select = $db->select()  ->from ('usuarios');
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();

                        return $rows;

    }
   
   
}


<?php
class Application_Model_Produccion extends Zend_Db_Table_Abstract
{
     protected $_name = 'procesos';
     protected $_primary = 'Id_orden';
     
   
    function disenoProceso(){

    	  $db = Zend_Db_Table_Abstract::getDefaultAdapter();
          $select = $db->select()  ->from ('procesos');
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
		   return $rows;

    }
    
   
}


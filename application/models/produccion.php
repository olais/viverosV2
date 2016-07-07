<?php
class Application_Model_Produccion extends Zend_Db_Table_Abstract
{
     protected $_name = 'procesos';
     protected $_primary = 'Id_orden';
     
   
     function consultarClienteOP(){

     $response=new stdClass();
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();

          $select = $db->select()
                    ->from ('clientes',array('Nombre','Id_cliente'));
					    $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                        $response->rows=$rows;

                        echo json_encode($response);

   }
    function consultarMaquinaOP($idCliente){
    	  $response=new stdClass();
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();

          $select = $db->select()
                    ->from ('maquinas_clientes')
                    ->where('Id_Cliente=?',$idCliente);
					    $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                        $response->rows=$rows;
				   echo json_encode($response);

    }
    function consultarRadiosMaquinaOP($idMaquina){
    	 $response=new stdClass();
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();

          $select = $db->select()
                    ->from ('maquinas_clientes')
                    ->where('Id_MaquinaC=?',$idMaquina);
					    $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                        $response->rows=$rows;
				   echo json_encode($response);

    }
    function disenoProceso(){

    	  $db = Zend_Db_Table_Abstract::getDefaultAdapter();
          $select = $db->select()  ->from ('procesos');
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
		   return $rows;

    }


    
   
}


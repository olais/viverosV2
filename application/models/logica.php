<?php

class Application_Model_Logica extends Zend_Db_Table_Abstract
{
     protected $_name = 'clientes';
     protected $_primary = 'Id_cliente';
     
   function nuevoCliente($insert){
     
      return $this->insert($insert);


   }
    function bajas($id){
        $where="id=$id";
        $this->delete($where);
        
    }
    function consultarID($id){
        
        $q = $this->select()->where('id = ?', $id);
        return $this->fetchRow($q);
    }
    function actualizar($id,$nombre,$direccion,$tel,$email){
     
        $data = array("Nombre" => $nombre,"Direccion"=>$direccion,"Telefono"=>$tel,"Email"=>$email);
        $where = "id = $id";
        $this->update($data, $where);
    }
    
    function consultarTodos(){

         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
          $select = $db->select()
                    ->from ('clientes');
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                       return $rows;
        
    }

    function consultarContactos($id_cliente){
          $db = Zend_Db_Table_Abstract::getDefaultAdapter();
          $select = $db->select()
                    ->from ('contactos')
                    ->where("Id_cliente=$id_cliente");
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                       return $rows;

    }

    function consultarCliente($id_cliente){
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
          $select = $db->select()
                    ->from ('clientes')
                    ->where("Id_cliente=$id_cliente");
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                       return $rows;

    }


    public function consultarDirecciones($id_cliente){
           $db = Zend_Db_Table_Abstract::getDefaultAdapter();
           $select = $db->select()
                    ->from ('Direcciones')
                    ->where("Id_cliente=$id_cliente");
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                       return $rows; 

    }
}


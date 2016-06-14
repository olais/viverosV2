<?php

class Application_Model_DbTable_Menu extends Zend_Db_Table_Abstract
{
    protected $_name = 'permisos_tipousuario';
    protected $_primary='Id_tipousuario';
    protected $model;
    protected $menu = [];
    protected $orden;
    protected $produccion = false;


    public function __construct() {
        $this->datosUsuario = Zend_Auth::getInstance()->getStorage()->read();
        $this->model = new Application_Model_Menu_Constructor();
       
        parent::__construct();
    }
    
    public function Buscar(){
     $db = Zend_Db_Table_Abstract::getDefaultAdapter();
          $select = $db->select()
                    ->from ('permisos_tipousuario')
                    ->where('Id_tipousuario=?',$this->datosUsuario->Id_tipousuario);
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                       return $rows;
     
    }

   
}

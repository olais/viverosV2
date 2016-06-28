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
    
    function consultarFiltro($_search,$Id_estatus,$Nombre,$RFC,$Telefono1,$Telefono2, $Fax,$Correo,$Web){
         if($_search=="true"){ //buscadores
            $response=new stdClass();
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
          $select = $db->select()
                    ->from ('v_clientes');
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                        $count= count($rows);
                        if($count>0){
                
                        $page=$_REQUEST['page'];
                        $limit=$_REQUEST['rows'];
                        $sidx = $_REQUEST['sidx']; 
                        $sord = $_REQUEST['sord']; 
                           $select = $db->select()
                                    ->from ('clientes');
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                        $count= count($rows);
                        if( $count >0 ) {

                                $total_pages = ceil($count/$limit);

                        } else {

                                $total_pages = 0;

                                }

                    if ($page > $total_pages) $page=$total_pages;
                        $start = $limit*$page - $limit;

                        if(isset($Id_estatus) && $Id_estatus !=""){
                      $select = $db->select() ->from ('v_clientes')->where('estatus like ?','%'.$Id_estatus.'%');
                        }
                          if(isset($Nombre) && $Nombre !=""){
                      $select = $db->select() ->from ('v_clientes')->where('Nombre like ?', '%'.$Nombre.'%');
                        }
                         if(isset($RFC) && $RFC !=""){
                      $select = $db->select() ->from ('v_clientes')->where('RFC like ?','%'.$RFC.'%');
                        }
                          if(isset($Telefono1) && $Telefono1 !=""){
                      $select = $db->select() ->from ('v_clientes')->where('Telefono1 like ?','%'.$Telefono1.'%');
                        }
                         if(isset($Telefono2) && $Telefono2 !=""){
                      $select = $db->select() ->from ('v_clientes')->where('Telefono2 like ?','%'.$Telefono2.'%');
                        }
                         if(isset($Fax) && $Fax !=""){
                      $select = $db->select() ->from ('v_clientes')->where('Fax like ?','%'.$Fax.'%');
                        }
                         if(isset($Correo) && $Correo !=""){
                      $select = $db->select() ->from ('v_clientes')->where('Correo like ?','%'.$Correo.'%');
                        }
                          if(isset($Web) && $Web !=""){
                      $select = $db->select() ->from ('v_clientes')->where('Web like ?','%'.$Web.'%');
                        }
                       $sql = $db->query($select);
                       $rows2 = $sql->fetchAll();

                       $response->rows= $rows2;
                       $response->page = $page;
                       $response->total = $total_pages;
                       $response->records = $count;
                       echo json_encode($response);


                        }
                       
        }
        
    }

   function consultarTodos(){

     $response=new stdClass();
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
          $select = $db->select()
                    ->from ('v_clientes')

                    ->order('Id_cliente DESC');
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                        echo json_encode($rows);

   }

    function consultarContactos($id_cliente){
          $db = Zend_Db_Table_Abstract::getDefaultAdapter();
          $select = $db->select()
                    ->from ('contactos')
                    ->where("Id_cliente=$id_cliente");
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                       
                       echo json_encode($rows);

    }

    function consultarContactosFiltros($_search,$nombre,$apellido,$puesto,$tel1,$ext1,$tel2,$ext2,$celular,$correo,$Fec_Nac,$fb,$tw,$sky){

          if($_search=="true"){
            $response=new stdClass();
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
          $select = $db->select()
                    ->from ('contactos');
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                        $count= count($rows);
                        if($count>0){
                
                        $page=$_REQUEST['page'];
                        $limit=$_REQUEST['rows'];
                        $sidx = $_REQUEST['sidx']; 
                        $sord = $_REQUEST['sord']; 
                           $select = $db->select()
                                    ->from ('contactos');
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                        $count= count($rows);
                        if( $count >0 ) {

                                $total_pages = ceil($count/$limit);

                        } else {

                                $total_pages = 0;

                                }

                    if ($page > $total_pages) $page=$total_pages;
                        $start = $limit*$page - $limit;

                        
                          if(isset($nombre) && $nombre !=""){
                      $select = $db->select() ->from ('contactos')->where('Nombre like ?', '%'.$nombre.'%');
                        }
                         if(isset($apellido) && $apellido !=""){
                      $select = $db->select() ->from ('contactos')->where('Apellidos like ?','%'.$apellido.'%');
                        }
                          if(isset($puesto) && $puesto !=""){
                      $select = $db->select() ->from ('contactos')->where('Puesto like ?','%'.$puesto.'%');
                        }
                         if(isset($tel1) && $tel1 !=""){
                      $select = $db->select() ->from ('contactos')->where('Telefono1 like ?','%'.$tel1.'%');
                        }
                         if(isset($ext1) && $ext1 !=""){
                      $select = $db->select() ->from ('contactos')->where('Extension1 like ?','%'.$ext1.'%');
                        }
                        if(isset($tel2) && $tel2 !=""){
                      $select = $db->select() ->from ('contactos')->where('Telefono2 like ?','%'.$tel2.'%');
                        }
                         if(isset($ext2) && $ext2 !=""){
                      $select = $db->select() ->from ('contactos')->where('Extension1 like ?','%'.$ext2.'%');
                        }
                         if(isset($celular) && $celular !=""){
                      $select = $db->select() ->from ('contactos')->where('Celular like ?','%'.$celular.'%');
                        }
                         if(isset($correo) && $correo !=""){
                      $select = $db->select() ->from ('contactos')->where('Correo like ?','%'.$correo.'%');
                        }
                          if(isset($Fec_Nac) && $Fec_Nac !=""){
                      $select = $db->select() ->from ('contactos')->where('Fec_Nac like ?','%'.$Web.'%');
                        }
                        if(isset($fb) && $fb !=""){
                      $select = $db->select() ->from ('contactos')->where('Facebook like ?','%'.$fb.'%');
                        }
                        if(isset($tw) && $tw !=""){
                      $select = $db->select() ->from ('contactos')->where('Twitter ?','%'.$tw.'%');
                        }
                        if(isset($sky) && $sky !=""){
                      $select = $db->select() ->from ('contactos')->where('Skype ?','%'.$sky.'%');
                        }
                       $sql = $db->query($select);
                       $rows2 = $sql->fetchAll();

                       $response->rows= $rows2;
                       $response->page = $page;
                       $response->total = $total_pages;
                       $response->records = $count;
                       echo json_encode($response);


                        }
                       
        }


    }

    function consultarCliente($id_cliente){
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
          $select = $db->select()
                    ->from ('clientes')
                    ->where("Id_cliente=$id_cliente");
                        $sql = $db->query($select);
                      return  $rows = $sql->fetchAll();
                      
                      

    }


    public function consultarDirecciones($id_cliente){
           $db = Zend_Db_Table_Abstract::getDefaultAdapter();
           $select = $db->select()
                    ->from ('Direcciones')
                    ->where("Id_cliente=$id_cliente");
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                       echo json_encode($rows);

    }
   public function consultarDireccionesFiltros($_search,$calle,$colonia,$ciudad,$municipio,$estado,$cp,$nota){

          if($_search=="true"){
            $response=new stdClass();
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
          $select = $db->select()
                    ->from ('Direcciones');
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                        $count= count($rows);
                        if($count>0){
                
                        $page=$_REQUEST['page'];
                        $limit=$_REQUEST['rows'];
                        $sidx = $_REQUEST['sidx']; 
                        $sord = $_REQUEST['sord']; 
                           $select = $db->select()
                                    ->from ('Direcciones');
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                        $count= count($rows);
                        if( $count >0 ) {

                                $total_pages = ceil($count/$limit);

                        } else {

                                $total_pages = 0;

                                }

                    if ($page > $total_pages) $page=$total_pages;
                        $start = $limit*$page - $limit;

                        
                          if(isset($calle) && $calle !=""){
                      $select = $db->select() ->from ('Direcciones')->where('Calle like ?', '%'.$calle.'%');
                        }
                          if(isset($colonia) && $colonia !=""){
                      $select = $db->select() ->from ('Direcciones')->where('Colonia like ?', '%'.$colonia.'%');
                        }
                         if(isset($ciudad) && $ciudad !=""){
                      $select = $db->select() ->from ('Direcciones')->where('Ciudad like ?','%'.$ciudad.'%');
                        }
                          if(isset($municipio) && $municipio !=""){
                      $select = $db->select() ->from ('Direcciones')->where('Municipio like ?','%'.$municipio.'%');
                        }
                         if(isset($estado) && $estado !=""){
                      $select = $db->select() ->from ('Direcciones')->where('Estado like ?','%'.$estado.'%');
                        }
                         if(isset($cp) && $cp !=""){
                      $select = $db->select() ->from ('Direcciones')->where('CP like ?','%'.$cp.'%');
                        }
                        if(isset($nota) && $nota !=""){
                      $select = $db->select() ->from ('Direcciones')->where('Nota like ?','%'.$nota.'%');
                        }
                        
                       $sql = $db->query($select);
                       $rows2 = $sql->fetchAll();

                       $response->rows= $rows2;
                       $response->page = $page;
                       $response->total = $total_pages;
                       $response->records = $count;
                       echo json_encode($response);


                        }
                       
        }


    }
 public function consultatTiposClientes(){

                       $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                      $select = $db->select()
                                ->from ('tipos_clientes');
                               // ->where('Id_estatus =?',10);
                       $sql = $db->query($select);
                      return  $rows = $sql->fetchAll();
                      
  }

  public function consultatTiposContactos(){

        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                      $select = $db->select()
                                ->from ('tipos_contactos');
                               // ->where('Id_estatus =?',10);
                       $sql = $db->query($select);
                      return  $rows = $sql->fetchAll();
  }
  public function consultatTiposDirecciones(){
       $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                      $select = $db->select()

                                ->from ('tipos_direcciones');
                               // ->where('Id_estatus =?',10);

                       $sql = $db->query($select);
                      return  $rows = $sql->fetchAll();

  }

  public function consultaTiposMaquinas(){
     $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                      $select = $db->select()

                                ->from ('maquinas_clientes');
                               // ->where('Id_estatus =?',10);

                       $sql = $db->query($select);
                      return  $rows = $sql->fetchAll();

  }

  public function consultarMaquinas($id_cliente){

       $db = Zend_Db_Table_Abstract::getDefaultAdapter();
          $select = $db->select()
                    ->from ('maquinas_clientes')
                    ->where("Id_cliente=$id_cliente");
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                       
                       echo json_encode($rows);
  }

 public function consultatTiposUsuarios(){

                       $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                      $select = $db->select()
                                ->from ('tipos_usuarios');
                       $sql = $db->query($select);
                      return  $rows = $sql->fetchAll();
                      
  }

}


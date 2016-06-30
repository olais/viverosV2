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
          $select = $db->select()  ->from ('v_usuarios');
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
		   return $rows;

    }
    function consultaUsuariosFiltros($_search,$Descripcion,$Usuario,$tipo,$estatus){

    	if($_search=="true"){ //buscadores
            $response=new stdClass();
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
          $select = $db->select()
                    ->from ('v_usuarios');
                        $sql = $db->query($select);
                        $rows = $sql->fetchAll();
                        $count= count($rows);
                        if($count>0){
                
                        $page=$_REQUEST['page'];
                        $limit=$_REQUEST['rows'];
                        $sidx = $_REQUEST['sidx']; 
                        $sord = $_REQUEST['sord']; 
                           $select = $db->select()
                                    ->from ('v_usuarios');
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

                        if(isset($Descripcion) && $Descripcion !=""){
                      $select = $db->select() ->from ('v_usuarios')->where('Descripcion like ?','%'.$Descripcion.'%');
                        }
                          if(isset($Usuario) && $Usuario !=""){
                      $select = $db->select() ->from ('v_usuarios')->where('Usuario like ?', '%'.$Usuario.'%');
                        }
                         if(isset($tipo) && $tipo !=""){
                      $select = $db->select() ->from ('v_usuarios')->where('tipousuario like ?','%'.$tipo.'%');
                        }
                          if(isset($estatus) && $estatus !=""){
                      $select = $db->select() ->from ('v_usuarios')->where('estatus like ?','%'.$estatus.'%');
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

    function actualizarUsuarios($datos,$Id_usuario){
    
    $where = "Id_usuario=$Id_usuario";
    return $this->update($datos, $where);

   }
   
   
   
}


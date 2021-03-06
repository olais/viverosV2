<?php

class EditarController extends Zend_Controller_Action
{

    public function init()
    {
        $auth = Zend_Auth::getInstance(); 
        if (!$auth->hasIdentity())
        { 
            $this->_redirect('login'); 
        }
    }

    public function indexAction()

    {
     
        $id_cliente=$_REQUEST['id'];
        $con=new Application_Model_Logica();
        $clientes=  $con->consultarCliente($id_cliente);
        $this->view->clientes=$clientes;
        $datos=  $con->consultatTiposContactos();
        $this->view->datos=$datos; 

        $tiposDir=  $con->consultatTiposDirecciones();
        $this->view->tiposDir= $tiposDir; 

        $tiposMaq=  $con->consultaTiposMaquinas();
        $this->view->tiposMaq= $tiposMaq; 

                 
    }

    public function contactosAction(){

     /*$this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
         $_search=$_REQUEST['_search'];
        if($_search=="true"){
       
                                
            $nombre=(isset($_REQUEST['Nombre']))? $_REQUEST['Nombre'] : '';
            $apellido=(isset($_REQUEST['Apellidos']))? $_REQUEST['Apellidos'] : '';
            $puesto=(isset($_REQUEST['Puesto']))?  $_REQUEST['Puesto'] : '';
            $tel1=(isset( $_REQUEST['Telefono1']))?  $_REQUEST['Telefono1'] : '';
            $ext1=(isset($_REQUEST['Extension1']))? $_REQUEST['Extension1'] : '';
            $tel2=(isset($_REQUEST['Telefono2']))? $_REQUEST['Telefono2'] : '';
            $ext2=(isset($_REQUEST['Extension2']))? $_REQUEST['Extension2'] : '';
            $celular=(isset($_REQUEST['Celular']))? $_REQUEST['Celular'] : '';
            $correo=(isset($_REQUEST['Correo']))?  $_REQUEST['Correo'] : '';
            $Fec_Nac=(isset( $_REQUEST['Fec_Nac']))?  $_REQUEST['Fec_Nac'] : '';
            $fb=(isset($_REQUEST['Facebook']))? $_REQUEST['Facebook'] : '';
            $tw=(isset($_REQUEST['Twitter']))? $_REQUEST['Twitter'] : '';
            $sky=(isset($_REQUEST['Skype']))? $_REQUEST['Skype'] : '';


        $con=new Application_Model_Logica();
        $datos=  $con->consultarContactosFiltros($_search,$nombre,$apellido,$puesto,$tel1,$ext1,$tel2,$ext2,$celular,$correo,$Fec_Nac,$fb,$tw,$sky);
            return $datos;

         }else{
            $id_cliente=$_REQUEST['id'];
            $con=new Application_Model_Logica();
            $datos=  $con->consultarContactos($id_cliente);
            return $datos;
       
         }*/
    }

     public function direccionesAction(){

     /* $this->_helper->layout->disableLayout();
      $this->_helper->viewRenderer->setNoRender();
      $id_cliente=$_REQUEST['id'];
      $con=new Application_Model_Logica();
      $datos=  $con->consultarDirecciones($id_cliente);
       
       echo json_encode($datos); */
    }

    public function guardarclienteAction(){
      $this->_helper->layout->disableLayout();
      $this->_helper->viewRenderer->setNoRender();
      $tipo=$_REQUEST['tipo'];
      $estatus=$_REQUEST['estatus'];
      $nombre=$_REQUEST['nombre'];
      $rfc=$_REQUEST['rfc'];
      $tel1=$_REQUEST['tel1'];
      $tel2=$_REQUEST['tel2'];
      $fax=$_REQUEST['fax'];
      $correo=$_REQUEST['correo'];
      $web=$_REQUEST['web'];

      $insert=array(
        "Id_cliente"=>"",
        "Id_tipoCliente"=>$tipo,
        "Id_estatus"=>$estatus,
        "Nombre"=>$nombre,
        "RFC"=>$rfc,
        "Telefono1"=>$tel1,
        "Telefono2"=>$tel2,
        "Fax"=>$fax,
        "Correo"=>$correo,
        "Web"=>$web,
        "ContactoPri"=>''

        );

      $con=new Application_Model_Logica();
      $datos=  $con->nuevoCliente($insert);
      $response=new stdClass();
      $response->id=$datos;

      echo json_encode($response);

    }


    public function guardarcontactosAction(){
           $this->_helper->layout->disableLayout();
           $this->_helper->viewRenderer->setNoRender();

            $idc=$_REQUEST['idC'];
            $tipo=$_REQUEST['tipoContacto'];
            $estatus=$_REQUEST['estatusC'];
            $nombre=$_REQUEST['nombreC'];
            $apellidos=$_REQUEST['apellidosC'];
            $puesto=$_REQUEST['puestoC'];
            $tel1=$_REQUEST['tel1C'];
            $exten1=$_REQUEST['exten1'];
            $tel2=$_REQUEST['tel2C'];
            $exten2=$_REQUEST['exten2'];
            $celular=$_REQUEST['celular'];
            $correoC=$_REQUEST['correoC'];
            $fechaN=$_REQUEST['fechaN'];
            $face=$_REQUEST['face'];
            $tw=$_REQUEST['tw'];
            $sky=$_REQUEST['sky'];


            $contactos=array(
              "Id_contacto"=>"",
              "Id_cliente"=>$idc,
              "Id_tipocontacto"=>$tipo,
              "Id_estatus"=>$estatus,
              "Nombre"=>$nombre,
              "Apellidos"=>$apellidos,
              "Puesto"=>$puesto,
              "Telefono1"=>$tel1,
              "Extension1"=>$exten1,
              "Telefono2"=>$tel2,
              "Extension2"=>$exten2,
              "Celular"=>$celular,
              "Correo"=>$correoC,
              "Fec_Nac"=>$fechaN,
              "Facebook"=>$face,
              "Twitter"=>$tw,
              "Skype"=>$sky

              );


      $con=new Application_Model_Contactos();
      $datos=  $con->nuevoContacto($contactos);
      $response=new stdClass();
      $response->id=$datos;

      echo json_encode($response);



    }

    public function actualizarcontactosAction(){
           $this->_helper->layout->disableLayout();
           $this->_helper->viewRenderer->setNoRender();

            $idc=$_REQUEST['idC'];
            $tipo=$_REQUEST['tipoContacto'];
            $Id_contacto=$_REQUEST['idContacto'];
            $estatus=$_REQUEST['estatusC'];
            $nombre=$_REQUEST['nombreC'];
            $apellidos=$_REQUEST['apellidosC'];
            $puesto=$_REQUEST['puestoC'];
            $tel1=$_REQUEST['tel1C'];
            $exten1=$_REQUEST['exten1'];
            $tel2=$_REQUEST['tel2C'];
            $exten2=$_REQUEST['exten2'];
            $celular=$_REQUEST['celular'];
            $correoC=$_REQUEST['correoC'];
            $fechaN=$_REQUEST['fechaN'];
            $face=$_REQUEST['face'];
            $tw=$_REQUEST['tw'];
            $sky=$_REQUEST['sky'];


            $contactos=array(
             
              "Id_cliente"=>$idc,
              "Id_tipocontacto"=>$tipo,
              "Id_estatus"=>$estatus,
              "Nombre"=>$nombre,
              "Apellidos"=>$apellidos,
              "Puesto"=>$puesto,
              "Telefono1"=>$tel1,
              "Extension1"=>$exten1,
              "Telefono2"=>$tel2,
              "Extension2"=>$exten2,
              "Celular"=>$celular,
              "Correo"=>$correoC,
              "Fec_Nac"=>$fechaN,
              "Facebook"=>$face,
              "Twitter"=>$tw,
              "Skype"=>$sky

              );


      $con=new Application_Model_Contactos();
      $datos=  $con->actualizaContacto($contactos,$Id_contacto);
      $response=new stdClass();
      $response->id=$datos;
     
      echo json_encode($response);


    }

    function guardardireccionAction(){
       $this->_helper->layout->disableLayout();
       $this->_helper->viewRenderer->setNoRender();


        $idD=$_REQUEST['idClienteDir'];
        $tipo=$_REQUEST['tipoDireccion'];
        $estatus=$_REQUEST['estatusD'];
        $calle=$_REQUEST['calle'];
        $colonia=$_REQUEST['colonia'];
        $ciudad=$_REQUEST['ciudad'];
        $muni=$_REQUEST['muni'];
        $estado=$_REQUEST['estado'];
        $cp=$_REQUEST['cp'];
        $nota=$_REQUEST['nota'];

         $direcciones=array(
          "Id_direccion"=>"",
          "Id_cliente"=>$idD,
          "Id_tipodireccion"=>$tipo,
          "Id_estatus"=>$estatus,
          "Calle"=>$calle,
          "Colonia"=>$colonia,
          "Ciudad"=>$ciudad,
          "Municipio"=>$muni,
          "Estado"=>$estado,
          "CP"=>$cp,
          "Nota"=>$nota);

          
      $con=new Application_Model_Direcciones();
      $datos=  $con->guardarDirecciones($direcciones);
      $response=new stdClass();
      $response->id=$datos;
     
      echo json_encode($response);
        

    }
   function actualizardireccionesAction(){

       $this->_helper->layout->disableLayout();
       $this->_helper->viewRenderer->setNoRender();


        $idD=$_REQUEST['idClienteDir'];
        $Id_direccion=$_REQUEST['Id_direccion'];//falta
        $tipo=$_REQUEST['tipoDireccion'];
        $estatus=$_REQUEST['estatusD'];
        $calle=$_REQUEST['calle'];
        $colonia=$_REQUEST['colonia'];
        $ciudad=$_REQUEST['ciudad'];
        $muni=$_REQUEST['muni'];
        $estado=$_REQUEST['estado'];
        $cp=$_REQUEST['cp'];
        $nota=$_REQUEST['nota'];

         $direcciones=array(
          "Id_cliente"=>$idD,
          "Id_tipodireccion"=>$tipo,
          "Id_estatus"=>$estatus,
          "Calle"=>$calle,
          "Colonia"=>$colonia,
          "Ciudad"=>$ciudad,
          "Municipio"=>$muni,
          "Estado"=>$estado,
          "CP"=>$cp,
          "Nota"=>$nota);
      $con=new Application_Model_Direcciones();
      $datos=  $con->actualizaDirecciones($direcciones,$Id_direccion);
      $response=new stdClass();
      $response->id=$datos;
    
      echo json_encode($response);
        
   }

   public function guardarmaquinasAction(){
       $this->_helper->layout->disableLayout();
       $this->_helper->viewRenderer->setNoRender();

               $maquinas=array(
                'Id_MaquinaC'=>'',
                'Id_Cliente'=>$_REQUEST['idCM'],
                'Descripcion'=>$_REQUEST['descripcionM'],
                /*'PerfEnPegue'=>$_REQUEST['PerfEnPegue'],
                'DescPerfEnPegue'=>$_REQUEST['DescPerfEnPegue'],*/
                'Rama'=>$_REQUEST['rama'],
                'MedidaRama'=>$_REQUEST['MedidaRama'],
                'Pinza'=>$_REQUEST['pinza'],
                'Id_estatus'=>10,
                'MedidaPinza'=>$_REQUEST['MedidaPinza'],
                'Perforaciones'=>$_REQUEST['perforaciones'],
                'Centerline'=>$_REQUEST['centerline'],
                'MedidaCenterline'=>$_REQUEST['MedidaCenterline'],
                'Desbarbe'=>$_REQUEST['desbarde'],
                'Compensacion'=>$_REQUEST['compensacion'],
                 'Madera'=>'',
                 'Id_estatus'=>'' 

                );

        $con=new Application_Model_Maquinas();
        $datos=  $con->guardarMaquinas($maquinas);
        $response=new stdClass();
        $response->id=$datos;

           echo json_encode($response);


   }

   public function actualizarmaquinasAction(){
       $this->_helper->layout->disableLayout();
       $this->_helper->viewRenderer->setNoRender();
       
        
               $maquinas=array(
               
                'Descripcion'=>$_REQUEST['descripcionM'],
               /* 'PerfEnPegue'=>$_REQUEST['PerfEnPegue'],
                'DescPerfEnPegue'=>$_REQUEST['DescPerfEnPegue'],*/
                'Rama'=>$_REQUEST['rama'],
                'MedidaRama'=>$_REQUEST['MedidaRama'],
                'Pinza'=>$_REQUEST['pinza'],
                'Id_estatus'=>10,
                'MedidaPinza'=>$_REQUEST['MedidaPinza'],
                'Perforaciones'=>$_REQUEST['perforaciones'],
                'Centerline'=>$_REQUEST['centerline'],
                'MedidaCenterline'=>$_REQUEST['MedidaCenterline'],
                'Desbarbe'=>$_REQUEST['desbarde'],
                'Compensacion'=>$_REQUEST['compensacion'],
                'Madera'=>'',
                'Id_estatus'=>''

                );

        $con=new Application_Model_Maquinas();
        $datos=  $con->actualizarMaquinas($maquinas,$_REQUEST['idM']);
        $response=new stdClass();
        $response->id=$datos;

           echo json_encode($response);

   }
   public function actualizarclientesAction(){
      $this->_helper->layout->disableLayout();
      $this->_helper->viewRenderer->setNoRender();
      $tipo=$_REQUEST['tipo'];
      $estatus=$_REQUEST['estatus'];
      $nombre=$_REQUEST['nombre'];
      $rfc=$_REQUEST['rfc'];
      $tel1=$_REQUEST['tel1'];
      $tel2=$_REQUEST['tel2'];
      $fax=$_REQUEST['fax'];
      $correo=$_REQUEST['correo'];
      $web=$_REQUEST['web'];

      $id_cliente=$_REQUEST['idCliente'];

      $datos=array(
        
        "Id_tipoCliente"=>$tipo,
        "Id_estatus"=>$estatus,
        "Nombre"=>$nombre,
        "RFC"=>$rfc,
        "Telefono1"=>$tel1,
        "Telefono2"=>$tel2,
        "Fax"=>$fax,
        "Correo"=>$correo,
        "Web"=>$web,
        "ContactoPri"=>''

        );

      $con=new Application_Model_Logica();
      $datos=  $con->actualizarCliente($datos,$id_cliente);
      $response=new stdClass();
      $response->id=$datos;

      echo json_encode($response);




   }






}






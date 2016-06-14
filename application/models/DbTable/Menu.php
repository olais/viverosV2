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
        
        $this->menu[0]['html']=$this->model->getinicio();
        $this->menu[0]['ordenamiento']=0;

        $this->menu[22]['html']=$this->model->getsalir();
        $this->menu[22]['ordenamiento']=22;  
        $this->orden=1;
        parent::__construct();
    }
    
    public function Buscar(){
        $select = $this->select()->where('Id_tipousuario=?',$this->datosUsuario->Id_tipousuario);
        $this->sql=$this->fetchAll($select)->toArray();
    }

    public function llenarMenu(){
        $this->Buscar();
         foreach ($this->sql as $key=> $value){
            switch ($key){
              case 'mnuCatalogos': 
               $this->menu[$this->orden]['html']= $this->model->getcatalogos();
               $this->menu[$this->orden]['ordenamiento']=1;
               break;

            }

            /*switch ($row['moduloid']){
                case 15:
                   $this->menu[$this->orden]['html']= $this->model->getcatalogos();
                   $this->menu[$this->orden]['ordenamiento']=1;
                   break;
               case 3:
                   $this->menu[$this->orden]['html']= $this->model->getadministracion();
                   $this->menu[$this->orden]['ordenamiento']=2;
                   break;
               case 2:
                    $this->menu[$this->orden]['html']=$this->model->getcontabilidad();
                    $this->menu[$this->orden]['ordenamiento']=3;
                   break;
               case 1:
                    $this->menu[$this->orden]['html']= $this->model->getplaneacion();
                    $this->menu[$this->orden]['ordenamiento']=4;
                    break;
               case 6:
                    $this->model->setpreprensa();
                    $this->produccion = true;
                    break;
                case 7:
                   $this->model->setprensa();
                    $this->produccion = true;
                   break;
                case 8:
                   $this->model->setcontrolcalidad();
                    $this->produccion = true;
                   break;
               case 9:
                   $this->model->setcorteauto();
                   $this->produccion = true;
                   break;
               case 10:
                   $this->model->setlaminado();
                   $this->produccion = true;
                   break;
               case 11:
                   $this->model->setcortemanual();
                   $this->produccion = true;
                   break;
                case 12:
                   $this->model->setbarnizuv();
                    $this->produccion = true;
                   break;
                case 13:
                   $this->model->setengrapado();
                    $this->produccion = true;
                   break;
              case 20:
                   $this->model->setcarteras();
                  $this->produccion = true;
                   break;
               case 16:
                   $this->model->setencuadernado();
                   $this->produccion = true;
                   break;
                case 17:
                   $this->model->setcanvas();
                    $this->produccion = true;
                   break;
               case 21:
                   $this->model->setacabadomanual();
                   $this->produccion = true;
                   break;
                case 18:
                   $this->model->setempacado();
                    $this->produccion = true;
                   break;
               case 19:
                   $this->model->setenvios();
                   $this->produccion = true;
                   break;
                case 14:
                   $this->menu[$this->orden]['html']= $this->model->getatnclientes();
                    $this->menu[$this->orden]['ordenamiento']=21;
                   break;*/
           // }
           // $this->orden++;
        }
        if($this->produccion){
            $this->menu[$this->orden]['html'] = $this->model->getproduccion();
            $this->menu[$this->orden]['ordenamiento']= 6;
        }
        
        $this->Ordenar();
        return $this->menu;
}
       
    public function Ordenar(){
        foreach ($this->menu as $key => $row) {
            $aux[$key] = $row['ordenamiento'];
        }
        array_multisort($aux, SORT_ASC, $this->menu);
    }
}

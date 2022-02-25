<?php
class Proveedores extends Controlador{
    public function __construct(){
     
        parent::__construct();
    }
    public function index()
    {
     
        $data['Ciudad'] = $this->model->getCiudades();
        $this->Vistas->getvist($this,"index",$data);
    }

    public function listar()
    { 
        $data=$this->model->getProveedores();
   
    
        //for ($i = 0 ; $i < count ($data); $i++){

          //  $data[$i]['acciones'] = ' 
            //<div> 
    
           //<button class="btn btn-primary" type="button" onclick="btnEditarTipoCompra('.$data[$i]['id_tipoCompra'].');"><i class="fas fa-edit"></i> </button> 
           //</div>';
         
    
           
        //}
    

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
}


public function registrar(){

    $nombre =$_POST['nombre'];
    $id = $_POST['id'];
    $ruc =$_POST['ruc'];
    $telefono =$_POST['telefono'];
    $direccion =$_POST['direccion'];
    $ciudad =$_POST['ciudad'];
   
  
  if ( empty($nombre) || empty($ruc) || empty($telefono)||empty($direccion)|| empty($ciudad)) {
     $msg ="Todos los campos son obligatorios";
  }  else{ 
     if ($id =="") {
          $data = $this->model->registrarProveedor($nombre,$ruc,$telefono,$direccion,$ciudad);
      if ($data == "ok") {
          $msg ="si";
      }else if($data =="existe"){
          $msg="el proveedor ya existe!!";
      }else{
          $msg="Error al registrar el proveedor";
        }
  
      } 

    else{
      $data = $this->model->modificarProveedor($nombre,$id);
      if ($data == "modificado") {
          $msg ="modificado";
      }else{
          $msg="Error al modificar proveedor";
        } 
    }



  }
     
  echo json_encode($msg,JSON_UNESCAPED_UNICODE);
  die();
  }
  

  public function editar(int $id)
  {
    $data=$this->model->editarProveedor($id);
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
    die();
  }
  


 

}
?>
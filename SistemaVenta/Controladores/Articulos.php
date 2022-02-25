<?php
class Articulos extends Controlador{
    public function __construct(){
     
        parent::__construct();
    }
    public function index()
    {
     
        $data['Procedencia'] = $this->model->getProcedencias();
        $this->Vistas->getvist($this,"index",$data);
    }

    public function listar()
    { 
        $data=$this->model->getArticulos();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
}


public function registrar(){

    $nombre =$_POST['nombre'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];
    $procedencia = $_POST['procedencia'];
    $id = $_POST['id'];
   
  
  if ( empty($nombre)||empty($stock)) {
     $msg ="Todos los campos son obligatorios";
  }  else{ 
     if ($id =="") {
          $data = $this->model->registrarArticulos($nombre,$stock,$precio,$procedencia);
      if ($data == "ok") {
          $msg ="si";
      }else if($data =="existe"){
          $msg="Tipo de compra ya existe!!";
      }else{
          $msg="Error al registrar tipo de compra";
        }
  
      } 

    else{
      $data = $this->model->modificarTipoCompra($nombre,$id);
      if ($data == "modificado") {
          $msg ="modificado";
      }else{
          $msg="Error al modificar  tipo de compra";
        } 
    }



  }
     
  echo json_encode($msg,JSON_UNESCAPED_UNICODE);
  die();
  }
  

  public function editar(int $id)
  {
    $data=$this->model->editarTipoCompra($id);
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
    die();
  }


  
  
  public function buscar()
  {
      $codigo = $_POST['codigo'];
      $data = $this->model->buscarProducto($codigo);
      echo json_encode($data);
  }

 

}
?>
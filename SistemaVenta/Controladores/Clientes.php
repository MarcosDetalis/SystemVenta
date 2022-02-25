<?php
class Clientes extends Controlador{
    public function __construct(){
        session_start();
        parent::__construct();
    }
    public function index()
    {
     
      $data['Ciudad'] = $this->model->getCiudades();
      $this->Vistas->getvist($this,"index",$data);
    }

    public function listar()
    { 
        $data=$this->model->getClientes();

    for ($i = 0 ; $i < count ($data); $i++){

        if ($data[$i]['estado'] == 1) {
        $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
        $data[$i]['acciones'] = ' 
        <div> 

       <button class="btn btn-primary btn-block" type="button" onclick="btnEditarCli('.$data[$i]['id_cliente'].');"><i class="fas fa-edit"></i> </button> 
       <button class="btn btn-danger btn-block" type="button" onclick="btnEliminarCli('.$data[$i]['id_cliente'].');"> <i class="fas fa-trash-alt"></i></button> 
       
       </div>';
        }else{
        $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
        $data[$i]['acciones'] = ' 
        <div> 
       <button class="btn btn-success" type="button" onclick="btnreingresarCli('.$data[$i]['id_cliente'].');"> Reingresar</button> 
       </div>';
        }

       
    }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
}


   


public function registrar(){

  $ruc =$_POST['ruc'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion =$_POST['direccion'];
  $telefono = $_POST['telefono'];
  $ciudad = $_POST['ciudad_cli'];
  $id = $_POST['id'];
 

if ( empty($ruc) || empty($nombre)  || empty($telefono) || empty($direccion) || empty($apellido)) {
   $msg ="Todos los campos son obligatorios";
}  else{ 
   if ($id=="") {
        $data = $this->model->registrarCliente($nombre,$apellido,$ruc,$telefono,$direccion,$ciudad);
    if ($data == "ok") {
        $msg ="si";
    }else if($data =="existe"){
        $msg="El ruc ya existe";
    }else{
        $msg="Error al registrar al cliente";
      }

    } 
  else{
    $data = $this->model->modificarCliente($nombre,$apellido,$ruc,$telefono,$direccion,$ciudad,$id);
    if ($data == "modificado") {
        $msg ="modificado";
    }else{
        $msg="Error al modificar el cliente";
      } 
  }
}
   
echo json_encode($msg,JSON_UNESCAPED_UNICODE);
die();
}



public function editar(int $id)
{
  $data=$this->model->editarCli($id);
  echo json_encode($data,JSON_UNESCAPED_UNICODE);
  die();
}




public function eliminar(int $id)
{
    $data = $this->model->accionCli(0,$id);

    if ($data ==1) {
      $msg ="ok";
    }else{
        $msg="error al eliminar cliente";
    }
    echo json_encode($msg,JSON_UNESCAPED_UNICODE);
    die();
}



public function reingresar(int $id)
{
    $data = $this->model->accionCli(1,$id);

    if ($data ==1) {
      $msg ="ok";
    }else{
        $msg="error al reingresar cliente";
    }
    echo json_encode($msg,JSON_UNESCAPED_UNICODE);
    die();
}

 

}
?>
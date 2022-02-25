<?php
class Users extends Controlador{
    public function __construct(){
        session_start();

      
        parent::__construct();
    }

    public function index()
    {
        if (empty($_SESSION['activo'])) {
            header("location:".base_url);
        }
        $data['Ciudad'] = $this->model->getCiudades();
        $this->Vistas->getvist($this,"index",$data);


    }

    public function listar()
    { 
        $data=$this->model->getusuarios();

for ($i = 0 ; $i < count ($data); $i++){

    if ($data[$i]['estado'] == 1) {
        $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
     

    }else{
        $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
       
    }

   
}

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function  validar(){

        if(empty($_POST['usuario']) or empty($_POST['clave'])):
            $msg ="Los campos vacios";
        else:
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $hash = hash("SHA256",$clave);
            $data = $this->model->getusuario($usuario,$hash);

            if($data):
                $_SESSION['id_vendedor']=$data['id_vendedor'];
                $_SESSION['nombre_vendedor']=$data['nombre_vendedor'];
                $_SESSION['apellido_vendedor']=$data['apellido_vendedor'];
                $_SESSION['activo']= true;
                $msg ="ok";
            else: 
                $msg ="usuario o contraseña incorrecta";
            endif;
        endif;

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }



public function registrar(){

  $usuario =$_POST['usuario'];
  $apellido = $_POST['apellido'];
  $direccion =$_POST['direccion'];
  $ci = $_POST['ci'];
  $telefono = $_POST['telefono'];
  $ciudad = $_POST['ciudad_cli'];

  $clave =$_POST['clave'];
  $confirmar = $_POST['confirmar'];
  $id = $_POST['id'];
  $hash = hash("SHA256",$clave);

if ( empty($usuario) || empty($apellido)) {
   $msg ="Todos los campos son obligatorios";
}  else{ 
   if ($_POST['id']=="") {
        if ( $clave != $confirmar){ 
        $msg="Las Contraseñas con coinciden";
    }if(empty($clave)){
        $msg="Las Contraseñas vacias";
    }else{
        $data = $this->model->registrarUsuario($usuario,$apellido,$ci,$telefono,$direccion,$ciudad,$hash);
    if ($data == "ok") {
        $msg ="si";
    }else if($data =="existe"){
        $msg="El usuario ya existe";
    }else{
        $msg="Error al registrar al usuario";
      }

    } 
  }else{
    $data = $this->model->modificarUsuario($usuario,$nombre,$caja,$id);
    if ($data == "modificado") {
        $msg ="modificado";
    }else{
        $msg="Error al modificar el usuario";
      } 
  }
}
   
echo json_encode($msg,JSON_UNESCAPED_UNICODE);
die();
}



public function editar(int $id)
{
  $data=$this->model->editarUser($id);
  echo json_encode($data,JSON_UNESCAPED_UNICODE);
  die();
}




public function eliminar(int $id)
{
    $data = $this->model->accionUser(0,$id);

    if ($data ==1) {
      $msg ="ok";
    }else{
        $msg="error al eliminar";
    }
    echo json_encode($msg,JSON_UNESCAPED_UNICODE);
    die();
}



public function reingresar(int $id)
{
    $data = $this->model->accionUser(1,$id);

    if ($data ==1) {
      $msg ="ok";
    }else{
        $msg="error al reingresar";
    }
    echo json_encode($msg,JSON_UNESCAPED_UNICODE);
    die();
}

public function salir()
{
   header("location:".base_url);
   session_destroy();
   
}

}
?>
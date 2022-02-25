<?php
class Ciudades extends Controlador{
    public function __construct(){
     
        parent::__construct();
    }
    public function index()
    {
     
        $this->Vistas->getvist($this,"index");
    }

    public function listar()
    { 
        $data=$this->model->getCiudades();
   
    
        for ($i = 0 ; $i < count ($data); $i++){

            $data[$i]['acciones'] = ' 
            <div> 
    
           <button class="btn btn-primary" type="button" onclick="btnEditarCiudad('.$data[$i]['id_ciudad'].');"><i class="fas fa-edit"></i> </button> 
           </div>';
         
    
           
        }
    

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
}


public function registrar(){

    $nombre =$_POST['nombre'];

    $id = $_POST['id'];
   
  
  if ( empty($nombre)) {
     $msg ="Todos los campos son obligatorios";
  }  else{ 
     if ($id =="") {
          $data = $this->model->registrarCiudad($nombre);
      if ($data == "ok") {
          $msg ="si";
      }else if($data =="existe"){
          $msg="Ciudad ya existe!!";
      }else{
          $msg="Error al registrar  la ciudad";
        }
  
      } 

    else{
      $data = $this->model->modificarCiudad($nombre,$id);
      if ($data == "modificado") {
          $msg ="modificado";
      }else{
          $msg="Error al modificar la ciudad";
        } 
    }



  }
     
  echo json_encode($msg,JSON_UNESCAPED_UNICODE);
  die();
  }
  

  public function editar(int $id)
  {
    $data=$this->model->editarCiudad($id);
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
    die();
  }
  


 

}
?>
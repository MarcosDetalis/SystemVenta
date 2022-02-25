<?php
class TipoCompras extends Controlador{
    public function __construct(){
     
        parent::__construct();
    }
    public function index()
    {
     
        $this->Vistas->getvist($this,"index");
    }

    public function listar()
    { 
        $data=$this->model->getTipoCompras();
   
    
        for ($i = 0 ; $i < count ($data); $i++){

            $data[$i]['acciones'] = ' 
            <div> 
    
           <button class="btn btn-primary" type="button" onclick="btnEditarTipoCompra('.$data[$i]['id_tipoCompra'].');"><i class="fas fa-edit"></i> </button> 
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
          $data = $this->model->registrarTipoCompra($nombre);
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
  


 

}
?>
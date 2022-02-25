<?php
class TipoPagos extends Controlador{
    public function __construct(){
     
        parent::__construct();
    }
    public function index()
    {
     
        $this->Vistas->getvist($this,"index");
    }

    public function listar()
    { 
        $data=$this->model->getTipoPagos();
   
    
        for ($i = 0 ; $i < count ($data); $i++){

            $data[$i]['acciones'] = ' 
            <div> 
    
           <button class="btn btn-primary" type="button" onclick="btnEditarTipoPago('.$data[$i]['id_tipoPago'].');"><i class="fas fa-edit"></i> </button> 
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
          $data = $this->model->registrarTipoPago($nombre);
      if ($data == "ok") {
          $msg ="si";
      }else if($data =="existe"){
          $msg="Tipo de pago ya existe!!";
      }else{
          $msg="Error al registrar tipo de pago";
        }
  
      } 

    else{
      $data = $this->model->modificarTipoPago($nombre,$id);
      if ($data == "modificado") {
          $msg ="modificado";
      }else{
          $msg="Error al modificar  tipo de pago";
        } 
    }



  }
     
  echo json_encode($msg,JSON_UNESCAPED_UNICODE);
  die();
  }
  

  public function editar(int $id)
  {
    $data=$this->model->editarTipoPago($id);
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
    die();
  }
  


 

}
?>
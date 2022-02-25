<?php
class TipoPagosModel extends Query{

    private $nombre,$id;

    public function __construct()
    {
        parent::__construct();
    }
    public function getTipoPagos()
    {
        $sql = "SELECT * FROM tipoPagos";
        $data = $this->selectAll($sql);
        return $data;
    }
  


    public function  registrarTipoPago(string $nombre){
        $this->nombre = $nombre;

   
        $verificar = "SELECT * FROM tipoPagos WHERE descripcion_tipoPago ='$this->nombre'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
   
           $sql = "INSERT INTO tipoPagos (descripcion_tipoPago) VALUES (?)";
           $datos = array($this->nombre);
           $data = $this->save($sql,$datos);
           if ($data==1) {
              $res ="ok";
           }else{
               $res ="error";
           }
        }else{
            $res ="existe";
        }
    
        return $res;
    }

    public function  modificarTipoPago(string $nombre,int $id){
        $this->nombre = $nombre;
        $this->id = $id;

         $sql = "UPDATE  tipoPagos SET  descripcion_tipoPago =? WHERE id_tipoPago =?";
         $datos = array($this->nombre,$this->id);
         $data = $this->save($sql,$datos);
         if ($data==1) {
            $res ="modificado";
         }else{
             $res ="error";
      }
  
      return $res;
  }
  

  
    public function editarTipoPago(int $id)
    {
        $sql ="SELECT * FROM tipoPagos WHERE id_tipoPago ='$id'";
        $data= $this->select($sql);
        return $data;
    }
   

}
?>
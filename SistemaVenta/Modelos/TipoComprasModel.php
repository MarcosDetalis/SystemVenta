<?php
class TipoComprasModel extends Query{

    private $nombre,$id;

    public function __construct()
    {
        parent::__construct();
    }
    public function getTipoCompras()
    {
        $sql = "SELECT * FROM tipoCompras";
        $data = $this->selectAll($sql);
        return $data;
    }
  


    public function  registrarTipoCompra(string $nombre){
        $this->nombre = $nombre;

   
        $verificar = "SELECT * FROM tipoCompras WHERE descripcion_tipoCompra ='$this->nombre'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
   
           $sql = "INSERT INTO tipoCompras (descripcion_tipoCompra) VALUES (?)";
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

    public function  modificarTipoCompra(string $nombre,int $id){
        $this->nombre = $nombre;
        $this->id = $id;

         $sql = "UPDATE  tipoCompras SET  descripcion_tipoCompra =? WHERE id_tipoCompra =?";
         $datos = array($this->nombre,$this->id);
         $data = $this->save($sql,$datos);
         if ($data==1) {
            $res ="modificado";
         }else{
             $res ="error";
      }
  
      return $res;
  }
  

  
    public function editarTipoCompra(int $id)
    {
        $sql ="SELECT * FROM tipoCompras WHERE id_tipoCompra ='$id'";
        $data= $this->select($sql);
        return $data;
    }
   

}
?>
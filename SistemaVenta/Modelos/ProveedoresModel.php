<?php
class ProveedoresModel extends Query{

    private $nombre,$id,$ruc,$telefono,$direccion,$ciudad;

    public function __construct()
    {
        parent::__construct();
    }



    public function getCiudades()
    {
        $sql = "SELECT * FROM Ciudad";
        $data = $this->selectAll($sql);
        return $data;
    }



    public function getProveedores()
    {
        $sql = "SELECT Pro.*, C.id_ciudad as id_ciudad, C.nombre_ciudad FROM Proveedores Pro INNER JOIN Ciudad C where Pro.Ciudad_id_ciudad = C.id_ciudad;";
        $data = $this->selectAll($sql);
        return $data;
    }
  


    public function  registrarProveedor(string $nombre,int $ruc,int $telefono,string $direccion,int $ciudad){
        $this->nombre = $nombre;
        $this->ruc = $ruc;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->ciudad = $ciudad;


   
        $verificar = "SELECT * FROM Proveedores WHERE nombre_proveedor ='$this->nombre'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
   
           $sql = "INSERT INTO Proveedores (nombre_proveedor, ruc_proveedor, telefono_proveedor, direccion_proveedor, Ciudad_id_ciudad) VALUES (?, ?, ?, ?, ?)";
           $datos = array($this->nombre,$this->ruc,$this->telefono,$this->direccion,$this->ciudad);
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
<?php
class ClientesModel extends Query{

    private $ruc,$nombre,$telefono,$direccion,$id,$estado,$apellido,$ciudad_cli;

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


 

    public function getClientes()
    {
        $sql = "SELECT Cli.*, C.id_ciudad as id_ciudad, C.nombre_ciudad FROM Clientes Cli INNER JOIN Ciudad C where Cli.Ciudad_id_ciudad = C.id_ciudad;";
        $data = $this->selectAll($sql);
        return $data;
    }


   public function  registrarCliente(string $nombre,string $apellido,string $ruc,string $telefono, string $direccion, int $ciudad_cli){
 
     $this->nombre = $nombre;
     $this->apellido = $apellido;
     $this->ruc = $ruc;
     $this->telefono = $telefono;
     $this->direccion = $direccion;
     $this->ciudad_cli = $ciudad_cli;
     $verificar = "SELECT * FROM Clientes WHERE ruc_cliente='$this->ruc'";
     $existe = $this->select($verificar);
     if (empty($existe)) {

        $sql = "INSERT INTO Clientes (nombre_cliente,apellido_cliente,ruc_cliente,telefono_cliente,direccion_cliente,Ciudad_id_ciudad) VALUES (?,?,?,?,?,?)";
        $datos = array($this->nombre,$this->apellido,$this->ruc,$this->telefono,$this->direccion,$this->ciudad_cli);
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


 public function  modificarCliente(string $nombre,string $apellido,string $ruc,string $telefono, string $direccion, int $ciudad_cli ,int $id){
  
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->ruc = $ruc;
    $this->telefono = $telefono;
    $this->direccion = $direccion;
    $this->ciudad_cli = $ciudad_cli;
    $this->id = $id;
       $sql = "UPDATE  Clientes SET  nombre_cliente =? ,apellido_cliente =?,ruc_cliente=?,telefono_cliente =? ,direccion_cliente=?,Ciudad_id_ciudad=? WHERE id_cliente =?";
       $datos = array($this->nombre,$this->apellido,$this->ruc,$this->telefono,$this->direccion,$this->ciudad_cli,$this->id);
       $data = $this->save($sql,$datos);
       if ($data==1) {
          $res ="modificado";
       }else{
           $res ="error";
    }

    return $res;
}



 public function editarCli(int $id)
 {
     $sql ="SELECT * FROM Clientes WHERE id_cliente ='$id'";
     $data= $this->select($sql);
     return $data;
 }


public function accionCli( int $estado,int $id)
{
    $this->id=$id;
    $this->estado=$estado;
    $sql = "UPDATE Clientes SET estado = ? WHERE id_cliente=?";

    $datos = array($this->estado,$this->id);
    $data =$this->save($sql,$datos);
    return $data;
}
}
?>
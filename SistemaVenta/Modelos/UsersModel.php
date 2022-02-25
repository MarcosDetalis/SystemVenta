<?php
class UsersModel extends Query{

    private $usuario,$apellido,$ci,$telefono,$direccion,$ciudad,$clave,$id,$estado;

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



    public function getusuario(string $usuario, string $clave)
    {
        $sql = "SELECT * FROM Vendedores WHERE nombre_vendedor = '$usuario' AND clave ='$clave'";
        $data = $this->select($sql);
        return $data;
    }

 
    public function getusuarios()
    {
        $sql = "SELECT * From Vendedores";

        $data = $this->selectAll($sql);
        return $data;
    }

    
   public function  registrarUsuario(string $usuario, string $apellido, string $ci ,int $telefono,string $direccion,int $ciudad,string $clave){
     $this->usuario = $usuario;
     $this->apellido = $apellido;
     $this->ci = $ci;
     $this->telefono = $telefono;
     $this->direccion = $direccion;
     $this->ciudad = $ciudad;
     $this->clave = $clave;
  
     $verificar = "SELECT * FROM Vendedores WHERE documento_vendedor='$this->ci'";
     $existe = $this->select($verificar);
     if (empty($existe)) {

        $sql = "INSERT INTO Vendedores (nombre_vendedor, apellido_vendedor, documento_vendedor, telefono_vendedor, direccion_vendedor, Ciudad_id_ciudad, clave) VALUES (?,?,?,?,?,?,?)";
        $datos = array($this->usuario,$this->apellido,$this->ci,$this->telefono,$this->direccion,$this->ciudad,$this->clave);
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


 public function  modificarUsuario(string $usuario, string $nombre,int $id_caja ,int $id){
    $this->usuario = $usuario;
    $this->nombre = $nombre;
    $this->id = $id;
    $this->id_caja = $id_caja;
       $sql = "UPDATE  usuarios SET  usuario =? ,nombre =?,id_caja=? WHERE id =?";
       $datos = array($this->usuario,$this->nombre,$this->id_caja,$this->id);
       $data = $this->save($sql,$datos);
       if ($data==1) {
          $res ="modificado";
       }else{
           $res ="error";
    }

    return $res;
}



 public function editarUser(int $id)
 {
     $sql ="SELECT * FROM usuarios  WHERE id ='$id'";
     $data= $this->select($sql);
     return $data;
 }


public function accionUser( int $estado,int $id)
{
    $this->id=$id;
    $this->estado=$estado;
    $sql = "UPDATE usuarios SET estado = ? WHERE id=?";

    $datos = array($this->estado,$this->id);
    $data =$this->save($sql,$datos);
    return $data;
}
}
?>
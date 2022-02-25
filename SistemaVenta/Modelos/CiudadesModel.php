<?php
class CiudadesModel extends Query{

    private $nombre,$id;

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
  


    public function  registrarCiudad(string $nombre){
        $this->nombre = $nombre;

   
        $verificar = "SELECT * FROM Ciudad WHERE nombre_ciudad ='$this->nombre'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
   
           $sql = "INSERT INTO Ciudad (nombre_ciudad) VALUES (?)";
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

    public function  modificarCiudad(string $nombre,int $id){
        $this->nombre = $nombre;
        $this->id = $id;

         $sql = "UPDATE  Ciudad SET  nombre_ciudad =? WHERE id_ciudad =?";
         $datos = array($this->nombre,$this->id);
         $data = $this->save($sql,$datos);
         if ($data==1) {
            $res ="modificado";
         }else{
             $res ="error";
      }
  
      return $res;
  }
  

  
    public function editarCiudad(int $id)
    {
        $sql ="SELECT * FROM Ciudad WHERE id_ciudad ='$id'";
        $data= $this->select($sql);
        return $data;
    }
   

}
?>
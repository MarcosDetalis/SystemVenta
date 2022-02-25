<?php
class ProcedenciasModel extends Query{

    private $nombre,$id;

    public function __construct()
    {
        parent::__construct();
    }
    public function getProcedencias()
    {
        $sql = "SELECT * FROM Procedencias";
        $data = $this->selectAll($sql);
        return $data;
    }
  


    public function  registrarProcedencia(string $nombre){
        $this->nombre = $nombre;

   
        $verificar = "SELECT * FROM Procedencias WHERE nombre_procedencia ='$this->nombre'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
   
           $sql = "INSERT INTO Procedencias (nombre_procedencia) VALUES (?)";
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

    public function  modificarProcedencia(string $nombre,int $id){
        $this->nombre = $nombre;
        $this->id = $id;

         $sql = "UPDATE  Procedencias SET  nombre_procedencia =? WHERE id_procedencia =?";
         $datos = array($this->nombre,$this->id);
         $data = $this->save($sql,$datos);
         if ($data==1) {
            $res ="modificado";
         }else{
             $res ="error";
      }
  
      return $res;
  }
  

  
    public function editarProcedencia(int $id)
    {
        $sql ="SELECT * FROM Procedencias WHERE id_procedencia ='$id'";
        $data= $this->select($sql);
        return $data;
    }
   

}
?>
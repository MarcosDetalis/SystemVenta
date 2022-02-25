<?php
class ArticulosModel extends Query{

    private $nombre,$stock,$precio,$procedencia,$id;

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
  


    public function getArticulos()
    {
        $sql = "SELECT Art.*, Pc.id_procedencia as id_procedencia, Pc.nombre_procedencia FROM Articulos Art INNER JOIN Procedencias Pc where Art.Procedencias_id_procedencia = Pc.id_procedencia;";
        $data = $this->selectAll($sql);
        return $data;
    }
  


    public function  registrarArticulos(string $nombre,int $stock,int $precio,int $procedencia){
        $this->nombre = $nombre;
        $this->stock = $stock;
        $this->precio = $precio;
        $this->procedencia = $procedencia;
        $verificar = "SELECT * FROM Articulos WHERE nombre_articulo ='$this->nombre'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
   
           $sql = "INSERT INTO Articulos (nombre_articulo, stock_articulo, precio_articulo,Procedencias_id_procedencia) VALUES (?,?,?,?)";
           $datos = array($this->nombre,$this->stock,$this->precio,$this->procedencia);
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

   

}
?>
<?php
class ProductosModel extends Query{

    private  $codigo,$descripcion,$precio_venta,$precio_compra,$unidad,$categoria,$id,$estado,$img;

    public function __construct()
    {
        parent::__construct();
    }
   

    public function getunidad(){

        $sql = "SELECT * FROM  medidas  WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getcategoria(){

        $sql = "SELECT * FROM  categorias  WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }



    public function getProductos()
    {
        $sql = "SELECT p.*, m.id as id_medi, m.nombre as medida,c.id as id_cate, c.nombre as categoria 
        From productos p 
        inner join medidas m ON p.id_medida = m.id 
        inner join categorias c on p.id_categoria = c.id  ";

        $data = $this->selectAll($sql);
        return $data;
    }
   


   public function  registrarProd(string $codigo,string $descripcion,string $precio_compra,string $precio_venta,int $unidad,int $categoria ,string $img){

     $this->codigo = $codigo;
     $this->descripcion = $descripcion;
     $this->precio_compra = $precio_compra;
     $this->precio_venta = $precio_venta;
     $this->unidad = $unidad;
     $this->categoria = $categoria;
    $this->img=$img;


     $verificar = "SELECT * FROM productos WHERE codigo ='$this->codigo'";
     $existe = $this->select($verificar);
     if (empty($existe)) {

        $sql = "INSERT INTO productos (codigo, descripcion, precio_compra, precio_venta,id_medida,id_categoria,imagen) VALUES (?,?,?,?,?,?,?)";
        $datos = array(
        $this->codigo,
        $this->descripcion,
        $this->precio_compra,
        $this->precio_venta,
        $this->unidad,
        $this->categoria,
        $this->img
          );
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


 public function  modificarProd(string $codigo,string $descripcion,string $precio_compra,string $precio_venta,int $unidad,int $categoria,string $img ,int $id){
    $this->codigo = $codigo;
    $this->descripcion = $descripcion;
    $this->precio_compra = $precio_compra;
    $this->precio_venta = $precio_venta;
    $this->unidad = $unidad;
    $this->categoria = $categoria;
    $this->id = $id;
    $this->img=$img;
       $sql = "UPDATE  productos SET  codigo =? 
       ,descripcion =?
       ,precio_compra=?
       ,precio_venta=?
       ,id_medida=?
       ,id_categoria=?
       ,Imagen=?    
        WHERE id =?";

         $datos = array(
            $this->codigo,
            $this->descripcion,
            $this->precio_compra,
            $this->precio_venta,
            $this->unidad,
            $this->categoria,
            $this->img,
            $this->id);
       $data = $this->save($sql,$datos);
       if ($data==1) {
          $res ="modificado";
       }else{
           $res ="error";
    }

    return $res;
}



 public function editarProd(int $id)
 {
     $sql ="SELECT * FROM productos  WHERE id ='$id'";
     $data= $this->select($sql);
     return $data;
 }


public function accionProd( int $estado,int $id)
{
    $this->id=$id;
    $this->estado=$estado;
    $sql = "UPDATE productos SET estado = ? WHERE id=?";

    $datos = array($this->estado,$this->id);
    $data =$this->save($sql,$datos);
    return $data;
}
}
?>
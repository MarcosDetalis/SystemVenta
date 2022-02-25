<?php
class VentasModel extends Query{

    private $codigo,$nombre,$cantidad,$precio,$total,
    $id_producto,$id_usuario,$ruc,$id,
    $codigotrans,$tipoPago,$tipoCompra,
    $VentaCabecera,$Articulo,$cliente;

    public function __construct()
    {
        parent::__construct();
    }
    public function buscarProducto(int $codigo){
        $this->codigo = $codigo;
        $sql = "SELECT * FROM Articulos WHERE id_articulos = '{$this->codigo}'";
        $data = $this->select($sql);
        if (empty($data)) {
            $data = 0;
        }
        return $data;
    }
    public function buscarCli(int $ruc){

        $sql ="SELECT * FROM Clientes WHERE ruc_cliente ='$ruc'";
        $data= $this->select($sql);
        return $data;

    }
    public function getVentas(){

        $sql = "SELECT * FROM Ventatemp where Vendedores_id_vendedor = $_SESSION[id_vendedor] ";
        $data= $this->selectAll($sql);
        return $data;
    }
    public function insertarDetalle(String $nombre, string $cantidad ,string $precio, string $total, string $id_producto ,string $id_usuario){
        
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->total = $total;
        $this->id_producto = $id_producto;
        $this->id_usuario = $id_usuario;

            $sql = "INSERT INTO Ventatemp(nombre_ventatemp, cantidad_ventatemp, precio_ventatemp, total_ventatemp, Vendedores_id_vendedor ,Articulo_id_articulos) VALUES (?,?,?,?,?,?)";
            $datos = array($this->nombre,$this->cantidad, $this->precio, $this->total,$this->id_usuario,$this->id_producto);
            $data = $this->save($sql,$datos);
            return $data;
    }

    public function eliminarCompra(int $id){
        $this->id = $id;
        $sql ="DELETE FROM Ventatemp WHERE id_ventatemp= ? ";
        $datos = array($this->id);
        $data = $this->save($sql,$datos);
        return $data;

    }

    public function buscarProductoexiste(int $id_producto)
    {
        $sql = "SELECT * FROM Ventatemp WHERE Vendedores_id_vendedor = $_SESSION[id_vendedor]  AND Articulo_id_articulos = '$id_producto'";
        $data = $this->select($sql);
        return $data;
    }

    public function actualizarCantidad(int $cantidad,int $total, int $id){
        $this->cantidad = $cantidad;
        $this->total = $total;
        $this->id = $id;
        $sql = "UPDATE Ventatemp SET cantidad_ventatemp =?, total_ventatemp =? WHERE Articulo_id_articulos=?";
        $datos = array($this->cantidad, $this->total ,$this->id);
        $data = $this->save($sql,$datos);
        return $data;
    }

    public function getTipoPagos()
    {
        $sql = "SELECT * FROM tipoPagos";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getTipoCompras()
    {
        $sql = "SELECT * FROM tipoCompras";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getVentasListar()
    {
        $sql = "SELECT VentC.id_ventaCabeceras,VentC.fecha_ventaCabeceras,Cli.nombre_cliente,VentC.total FROM VentasCabeceras VentC INNER JOIN Clientes Cli where VentC.Clientes_id_cliente = Cli.id_cliente;";
        $data = $this->selectAll($sql);
        return $data;
    }


  
    public function Venta(String $codigotrans, string $id_usuario ,string $tipoPago, string $tipoCompra,string $cliente,string $total){
        
        $this->codigotrans = $codigotrans;
        $this->id_usuario = $id_usuario;
        $this->tipoPago = $tipoPago;
        $this->tipoCompra = $tipoCompra;
        $this->cliente = $cliente;
        $this->total = $total;
            $sql = "INSERT INTO VentasCabeceras(codigoTransaccion, Vendedores_id_vendedor, tipoPagos_id_tipoPago, tipoCompras_id_tipoCompra,Clientes_id_cliente,total) VALUES (?,?,?,?,?,?)";
            $datos = array($this->codigotrans,$this->id_usuario, $this->tipoPago, $this->tipoCompra,$this->cliente,$this->total);
            $data = $this->save($sql,$datos);
            if ($data==1) {
                $res ="ok";
             }else{
                 $res ="error";
             }
            return $res;


    }

    public function buscaridC()
    {
        $sql = "SELECT MAX(id_ventaCabeceras) from VentasCabeceras";
        $data = $this->select($sql);
        return $data;
    }
    public function verificarProductos()
    {

        $sql = "SELECT * FROM Ventatemp where Vendedores_id_vendedor = $_SESSION[id_vendedor] ";
        $data= $this->selectAll($sql);
        return $data;
    }


    public function registrarDetalle(String $cantidad, string $VentaCabecera ,string $Articulo){
        
        $this->cantidad = $cantidad;
        $this->VentaCabecera = $VentaCabecera;
        $this->Articulo = $Articulo;

            $sql = "INSERT INTO VentaDetalles(cantidadVendida,ventasCabeceras_id_ventaCabeceras,articulos_id_articulos) VALUES (?,?,?)";
            $datos = array($this->cantidad,$this->VentaCabecera, $this->Articulo);
            $data = $this->save($sql,$datos);
           


    }

    public function stockActual($id_producto)
    {
        $sql = "SELECT stock_articulo FROM Articulos WHERE id_articulos = '{$id_producto}'";
        $data = $this->select($sql);
        return $data;
    }


    public function registrarStock(int $cantidad, int $id)
    {
        $this->cantidad = $cantidad;
        $this->id = $id;
        $sql = "UPDATE Articulos SET stock_articulo =? WHERE id_articulos =?";
        $datos = array($this->cantidad, $this->id);
        $data = $this->save($sql,$datos);
        return $data;
    }

    public function VaciarCompra()
    {
        $sql = "DELETE FROM Ventatemp WHERE Vendedores_id_vendedor =?";
        $datos = array($_SESSION['id_vendedor'] );
        $data = $this->save($sql,$datos);
        return $data;
    }

    public function buscaridtrans()
    {
        $sql = "SELECT MAX(codigoTransaccion) from VentasCabeceras";
        $data = $this->select($sql);
        return $data;
    }

    public function total()
    {
        $sql = "SELECT sum(total_ventatemp) as total FROM Ventatemp WHERE Vendedores_id_vendedor =$_SESSION[id_vendedor]";
        $data = $this->select($sql);
        return $data;
    }



    public function ListaVentas(string $id)
    {
        $sql = "SELECT tipC.descripcion_tipoCompra, tipP.descripcion_tipoPago, VentC.id_ventaCabeceras, Cli.nombre_cliente, Cli.ruc_cliente, Cli.telefono_cliente FROM VentasCabeceras VentC INNER JOIN Clientes Cli INNER JOIN tipoPagos tipP INNER JOIN tipoCompras tipC where VentC.Clientes_id_cliente = Cli.id_cliente and VentC.tipoPagos_id_tipoPago = tipP.id_tipoPago and VentC.tipoCompras_id_tipoCompra = tipC.id_tipoCompra and VentC.id_ventaCabeceras = '$id'";
        $data = $this->select($sql);
        return $data;
    }

 
    public function Articulo(string $id)
    {
        $sql = "SELECT Art.nombre_articulo,VentD.cantidadVendida,Art.precio_articulo FROM VentaDetalles VentD INNER JOIN Articulos Art where VentD.articulos_id_articulos = Art.id_articulos and VentD.ventasCabeceras_id_ventaCabeceras ='$id'";
        $VentD = $this->selectAll($sql);
        return $VentD;
    }
    
}
?>
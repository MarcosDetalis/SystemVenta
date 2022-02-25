<?php
 class Ventas extends Controlador{
    public function __construct(){
        session_start();
        parent::__construct();
    }

    public function listarVentas()
    {

       
        $this->Vistas->getvist($this,"listar");

    }


    public function index()
    {

        $data['tipoPago'] = $this->model->getTipoPagos();
        $data['tipoCompra'] = $this->model->getTipoCompras();
        $this->Vistas->getvist($this,"index",$data,$data);

    }
  
   

    public function registrar(){


        $codigo = $_POST['codigo'];
        $ruc = $_POST['ruc_cliente'];
        $id = $_POST['nombre'];
        $id_usuario = $_SESSION['id_vendedor'];
    }    

    public function buscar(int $codigo)
    {
       
        $data = $this->model->buscarProducto($codigo);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }


    public function buscarCli(int $ruc)
    {
       
        $data = $this->model->buscarCli($ruc);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
  
    public function ingresar()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $total = $cantidad * $precio;
        $id_usuario = $_SESSION['id_vendedor'];
        $data = $this->model->buscarProductoexiste($id);
        if ($data) {
            $idP = $data['Articulo_id_articulos'];
            $cant = $data['cantidad_ventatemp'];
            $cantidad = $_POST['cantidad'] + $cant;
            $total = $data['precio_ventatemp'] * $cantidad;

            $this->model->actualizarCantidad($cantidad,$total ,$idP);
            echo "1";
        }else{
           $data = $this->model->insertarDetalle($nombre, $cantidad, $precio, $total,$id,$id_usuario);
            if ($data > 0) {
            $this->Listar();
            }else{
            echo "error";
            }
        }
      
    }

    public function listarVenta(){
        $data=$this->model->getVentasListar();  

        for ($i = 0 ; $i < count ($data); $i++){
            $data[$i]['acciones'] = ' 
            <div> 
            <a href="/CrearSystem/Ventas/ver?id='.$data[$i]['id_ventaCabeceras'].'" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Ver</a>
           </div>';
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();  


    }
    public function listar(){
            $data=$this->model->getVentas();  

            for ($i = 0 ; $i < count ($data); $i++){
                $data[$i]['acciones'] = ' 
                <div> 
               <button class="btn btn-danger eliminar" id ="eliminar" type="button" onclick="btnEliminarCompra('.$data[$i]['id_ventatemp'].');">Eliminar</button> 
               </div>';
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();  
            
        }



    public function eliminar(int $id){
    $data = $this->model->eliminarCompra($id);
    if ($data ==1) {
      $msg ="ok";
    }else{
        $msg="error al eliminar";
    }
    echo json_encode($msg,JSON_UNESCAPED_UNICODE);
    die();
    }
    public function Venta(){
        
        $id_usuario = $_SESSION['id_vendedor'];
        $tipoPago = $_POST['tipoPago'];
        $tipoCompra = $_POST['tipoCompra'];
        $cliente = $_POST['cliente'];
        $total = $_POST['total'];
        $default = 15;
        $data = $this->model->buscaridtrans();
        $codigotrans = $data['MAX(codigoTransaccion)'] + 1;
        if ($cliente == 0 || $cliente == "") {
        $data = $this->model->Venta($codigotrans, $id_usuario, $tipoPago,$tipoCompra,$default,$total);
        if ($data == "ok") {
            $msg ="si";
        }
    }else{

   
    $data = $this->model->Venta($codigotrans, $id_usuario, $tipoPago,$tipoCompra,$cliente,$total);
    if ($data == "ok") {
        $msg ="si";
    }

}
        echo json_encode($msg,JSON_UNESCAPED_UNICODE);
        $data = $this->model->buscaridC();
        $result = $data['MAX(id_ventaCabeceras)'];
        $productos = $this->model->verificarProductos();
         foreach ($productos as $data) {

            $stock = $this->model->stockActual($data['Articulo_id_articulos']);
            $stockActual = $stock['stock_articulo'];


            $insertar = $this->model->registrarDetalle( $data['cantidad_ventatemp'],$result,$data['Articulo_id_articulos']);

            $this->model->registrarStock($stockActual - $data['cantidad_ventatemp'], $data['Articulo_id_articulos']);
        }

        $this->model->VaciarCompra();



        die();

    }
    public function anular(){
        $this->model->VaciarCompra();
    }

    public function total(){
       $data= $this->model->total();
    
       echo json_encode($data,JSON_UNESCAPED_UNICODE);
       die();
    }

    public function ver()
    {
        $id = $_GET['id'];
        $data['VentC']= $this->model->ListaVentas($id);
        $VentD=$this->model->Articulo($id);
        $this->Vistas->getvist($this,"VerVentas",$data,$VentD);
    }


}

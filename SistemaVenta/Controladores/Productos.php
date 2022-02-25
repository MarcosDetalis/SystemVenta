<?php
class Productos extends Controlador
{
    public function __construct()
    {

        parent::__construct();
    }
    public function index()
    {
        $data['unidades'] = $this->model->getunidad();
        $data['categorias'] = $this->model->getcategoria();
        $this->Vistas->getvist($this, "index", $data);
    }

    public function listar()
    {
        $data = $this->model->getProductos();

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['Imagen'] = '<img class="img-thumbnail"src="' . base_url . "Acceso/img/" . $data[$i]['Imagen'] . '" width="100"/>';
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = ' 
        <div> 

       <button class="btn btn-primary" type="button" onclick="btnEditarProd(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i> </button> 
       <button class="btn btn-danger" type="button" onclick="btnEliminarProd(' . $data[$i]['id'] . ');"> <i class="fas fa-trash-alt"></i></button> 
       
       </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = ' 
        <div> 
       <button class="btn btn-success" type="button" onclick="btnreingresarProd(' . $data[$i]['id'] . ');"> Reingresar</button> 
       </div>';
            }
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }





    public function registrar()
    {
        // print_r($_POST);
        // exit;


        $id = $_POST['id'];
        $codigo = $_POST['cod_barra'];
        $descripcion = $_POST['descrip'];
        $precio_compra = $_POST['precio_compra'];
        $precio_venta = $_POST['precio_venta'];
        $unidad = $_POST['unidad'];
        $categoria = $_POST['categoria'];
        $img = $_FILES['imagen'];
        $name = $img['name'];
        $tmpname = $img['tmp_name'];
        $destino = "Acceso/img/" . $name;

       $fecha = date("YmdHis");


        if (empty($codigo) || empty($descripcion) || empty($precio_compra) || empty($precio_venta) || empty($unidad) || empty($categoria)) {
            $msg = "Todos los campos son obligatorios";
        } else {
            if (!empty($name)) {
                $imgNombre = $fecha . ".jpg";
                $destino = "Acceso/img/" . $imgNombre;
            } else if (!empty($_POST['foto_actual']) && empty($name) ) {
                $imgNombre = $_POST['foto_actual'];
            }else{
                $imgNombre = "default.jpg";
            }
            if ($id == "") {
                $data = $this->model->registrarProd($codigo, $descripcion, $precio_compra, $precio_venta, $unidad, $categoria, $imgNombre);
                if ($data == "ok") {
                    if (!empty($name)) {
                        move_uploaded_file($tmpname, $destino);
                    }

                    $msg = "si";
                  
                } else if ($data == "existe") {
                    $msg = "El producto ya existe";
                } else {
                    $msg = "Error al registrar el producto";
                }
            } else {
                
                    $imgDelete = $this->model->editarProd($id);
                    if ($imgDelete['Imagen'] != 'default.jpg' || $imgDelete['Imagen'] != "") {
                        if (file_exists("Acceso/img/" . $imgDelete['Imagen'])) {

                            unlink("Acceso/img/" . $imgDelete['Imagen']);
                        }
                    }

                    $data = $this->model->modificarProd($codigo, $descripcion, $precio_compra, $precio_venta, $unidad, $categoria, $imgNombre, $id);
                    if ($data == "modificado") {
                        if (!empty($name)) {
                            move_uploaded_file($tmpname, $destino);
                        }
                        $msg = "modificado";
                    } else {
                        $msg = "Error al modificar la categoria";
                    }
                
            }
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }



    public function editar(int $id)
    {
        $data = $this->model->editarProd($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function eliminar(int $id)
    {
        $data = $this->model->accionProd(0, $id);

        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "error al eliminar el producto ";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }





    public function reingresar(int $id)
    {
        $data = $this->model->accionProd(1, $id);

        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "error al reingresar el producto";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}

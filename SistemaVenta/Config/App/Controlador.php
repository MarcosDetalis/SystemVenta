<?php
class Controlador{
    public function __construct(){
        $this->Vistas = new Vistas();
        $this->cargarModel();
    }

    public function cargarModel(){
        $model = get_class($this)."Model";
        $ruta = "Modelos/".$model.".php";
        if (file_exists($ruta)):
            require_once $ruta;
            $this->model = new $model();
        endif;
  }
}

?>
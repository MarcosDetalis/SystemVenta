<?php
 class Vistas{
public function getvist($controlador ,$vista,$data="",$VentD="")
{
$controlador = get_class($controlador);
    if($controlador =="Home"):
    $vista = "Vistas/".$vista.".php";
    else:
        $vista ="Vistas/".$controlador."/".$vista.".php";
    endif;
require $vista;
    }

}




?>
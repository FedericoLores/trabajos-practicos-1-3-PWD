<?php
include_once (__DIR__.'/../estructura/header_accion.php');
include_once (__DIR__.'/../../control/AbmAuto.php');
include_once (__DIR__.'/../../utils/scripts.php');
include_once (__DIR__.'/../../modelo/Auto.php');
include_once (__DIR__.'/../../modelo/conector/BaseDatos.php');
$datos = datosRecibidos();
$obj = new AbmAuto();

if(isset($datos['accion'])){
    $resp = false;
    if($datos['accion']=='editar'){
        if($obj->modificacion($datos)){
            $resp = true;
        }
    }
    if($datos['accion']=='borrar'){
        if($obj->baja($datos)){
            $resp =true;
        }
    }
    if($datos['accion']=='nuevo'){
        if($obj->alta($datos)){
            $resp =true;
        }
    }
    if($resp){
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    }else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
    }
}
?>
<h3>Auto</h3>
<a href="../indexAuto.php">Volver</a>

<?php	
echo $mensaje;
?>
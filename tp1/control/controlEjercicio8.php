<?php
class ControlEj8{
    public function calcularPrecio($datos){
        $precio = null;
        if(!empty($datos)){
            $estudiante = $datos['estudiante'];
            $edad = $datos['edad'];
            $precio = 300;
            if($edad == ''){
                $precio = 0;
            }elseif($estudiante == 'es estudiante' || $edad < 12){
                if($edad >= 12){
                    $precio = 180;
                }else{
                    $precio = 160;
                }            
            }
        }
        return $precio;
    }
}
?>
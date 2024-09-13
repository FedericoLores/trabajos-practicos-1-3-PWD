<?php 

function autocargado($clase){
    $directorios = array(
        $_SESSION['ROOT'].'modelo/tp4/',
        $_SESSION['ROOT'].'modelo/conector/',
        $_SESSION['ROOT'].'control/tp4/'
    );
    $total = count($directorios);
    $i = 0;
    while($i<$total && !(file_exists($directorios[$i] . $clase . ".php" ))){
        $i++;
    }
    if($i<$total){
        include_once($directorios[$i] . $clase . ".php");
    }
}

spl_autoload_register('autocargado');


function datosRecibidos() {
	$datos=[];
    if (!empty($_POST)){
        $datos = $_POST;
    }elseif(!empty($_GET)){
        $datos = $_GET;
	}
	return $datos;

}

?>
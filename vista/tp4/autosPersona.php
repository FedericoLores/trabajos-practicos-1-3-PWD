<?php
$titulo = "Trabajo práctico 4";
$ejercicio = "ejercicio 5 (lista personas)";
$descripcion = 'Crear una página "listaPersonas.php" que muestre un listado con las personas que se
encuentran cargadas y un link a otra página “autosPersona.php” que recibe un dni de una persona y muestra
los datos de la persona y un listado de los autos que tiene asociados. Recordar usar la capa de control antes
generada, no se puede acceder directamente a las clases del ORM.';
include_once ('../estructura/header.php');
include_once('../../configuracion.php');
$persona = new AbmPersona();
$datos = datosRecibidos();
$dni = "";
if ($persona->seteadosCamposClaves($datos)){
    $listaPersonas = $persona->buscar($datos);
    if (count($listaPersonas)==1){
        $dni = $datos['NroDni'];
    }
}
?>
<div class="card m-3">
<div class="card-title text-center mt-3">
    <h4>Autos Persona</h4>
</div>

<form method="post" action="../accion/tp4/accionAutosPersona.php" id="autosPersona" class="needs-validation" novalidate>
	<div class="container">
        <label for="NroDni" class="form-label">Numero de DNI</label>
        <input id="NroDni" name ="NroDni" type="number" class="form-control" value="<?php echo $dni;?>" min="10000000" max="99999999" required/>
        <div class="invalid-feedback">El DNI debe tener 8 digitos</div>
        <input id="accion" name ="accion" value="listar autos persona" type="hidden">
        <div class="row my-2">
            <div class="col mx-2">
                <a  class="btn btn-primary" href="listaPersonas.php">Volver</a>
                <input type="submit" name="submit" class="btn btn-success mx-2" onclick="validar('autosPersona')" value="Enviar">
            </div>
        </div>
    </div>
	
</form>

</div>
<!--<input id="accion" name ="accion" value="nuevo" type="hidden">-->
<?php include_once '../estructura/footer.php';?>
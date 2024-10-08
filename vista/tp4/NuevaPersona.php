<?php
$titulo = "Trabajo práctico 4";
$ejercicio = "ejercicio 6 (nueva persona)";
$descripcion = "Crear una página “NuevaPersona.php” que contenga un formulario que permita solicitar todos
los datos de una persona. Estos datos serán enviados a una página “accionNuevaPersona.php” que cargue
un nuevo registro en la tabla persona de la base de datos. Se debe mostrar un mensaje que indique si se
pudo o no cargar los datos de la persona. Utilizar css y validaciones javaScript cuando crea conveniente.
Recordar usar la capa de control antes generada, no se puede acceder directamente a las clases del ORM.";
include_once ('../estructura/header.php');
include_once('../../configuracion.php');
?>
<div class="card m-3">
<div class="card-header text-center mt-3">
    <h4>Nueva Persona</h4>
</div>

<form method="post" action="../accion/tp4/accionNuevaPersona.php" id="nuevaPersona" class="needs-validation" novalidate>
	<div class="container">
        <div class="col">
            <label for="NroDni" class="form-label">Numero de DNI</label>
            <input id="NroDni" name ="NroDni" type="number" class="form-control" min="10000000" max="99999999" placeholder="00000000" required/>
            <div class="invalid-feedback">El DNI debe tener 8 digitos</div>
        </div>
        <div class="col">
            <label for="Apellido" class="form-label">Apellido</label>
            <input id="Apellido" name ="Apellido" type="text" class="form-control" minlength="2" maxlength="50" pattern="^[A-Za-zÁÉÍÓÚÑáéíóúñü]+(?: [A-Za-zÁÉÍÓÚÑáéíóúñü]+)*$" placeholder="Apellido" required/>
            <div class="invalid-feedback">Ingrese un apellido sin numeros o simbolos</div>
        </div>
        <div class="col">
            <label for="Nombre" class="form-label">Nombre</label>
            <input id="Nombre" name ="Nombre" type="text" min="0" class="form-control" minlength="2" maxlength="50" pattern="^[A-Za-zÁÉÍÓÚÑáéíóúñü]+(?: [A-Za-zÁÉÍÓÚÑáéíóúñü]+)*$" placeholder="Nombre" required/>
            <div class="invalid-feedback">Ingrese un nombre sin numeros o simbolos</div>
        </div>
        <div class="col">
            <label for="fechaNac" class="form-label">Fecha de nacimiento</label>
            <input id="fechaNac" name ="fechaNac" type="date" class="form-control" min="1900-01-01" max="<?php echo date("Y-m-d");?>" required/>
            <div class="invalid-feedback">Ingrese una fecha válida</div>
        </div>
        <div class="col">
            <label for="Telefono" class="form-label">Telefono</label>
            <input id="Telefono" name ="Telefono" type="text" class="form-control" minlength="6" maxlength="15" pattern="^[0-9]+([ \-]?[0-9]+)*$" placeholder="54 299-123-4567" required/>
            <div class="invalid-feedback">El telefono debe contener entre 6 y 15 digitos</div>
        </div>
        <div class="col">
            <label for="Domicilio" class="form-label">Domicilio</label>
            <input id="Domicilio" name ="Domicilio" type="text" class="form-control" pattern="^(?=.*[A-Za-zñÑäëïöüáéíóúÁÉÍÓÚ])[A-Za-zñÑäëïöüáéíóúÁÉÍÓÚ\d\s]+$" minlength="3" maxlength="50" placeholder="calle siempreviva 123 departamento 5" required/>
            <div class="invalid-feedback">Ingrese un domicilio valido</div>
        </div>
        <input id="accion" name ="accion" value="nuevo" type="hidden">
        <div class="row my-2">
            <div class="col mx-2">
                <a  class="btn btn-primary" href="listaPersonas.php">Volver</a>
                <input type="submit" name="submit" class="btn btn-success mx-2" onclick="validar('nuevaPersona')" value="Enviar">
            </div>
        </div>
    </div>
	
</form>

</div>
<?php include_once '../estructura/footer.php';?>
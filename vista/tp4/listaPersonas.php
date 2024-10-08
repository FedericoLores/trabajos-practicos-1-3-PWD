<?php
$titulo = "Trabajo práctico 4";
$ejercicio = "ejercicio 5 (lista personas)";
$descripcion = 'Crear una página "listaPersonas.php" que muestre un listado con las personas que se
encuentran cargadas y un link a otra página “autosPersona.php” que recibe un dni de una persona y muestra
los datos de la persona y un listado de los autos que tiene asociados. Recordar usar la capa de control antes
generada, no se puede acceder directamente a las clases del ORM.';
include_once ('../estructura/header.php');
include_once('../../configuracion.php');
$objAbmPersona = new AbmPersona();

$listaPersona = $objAbmPersona->buscar(null);
?>
<div class="card m-3">
	<div class="card-header text-center">
		<h3>Lista de Persona</h3>
	</div>
<div class="card-body">
	<table class="table table-striped">
	<thead class="table-primary">
	<tr>
		<th scope="col">Numero de DNI</th>
		<th scope="col">Apellido</th>
		<th scope="col">Nombre</th>
		<th scope="col">Fecha de nacimiento</th>
        <th scope="col">Telefono</th>
        <th scope="col">Domicilio</th>
		<th scope="col">Autos</th>
		<th scope="col">Editar</th>
		<th scope="col">Eliminar</th>
	</tr>
	</thead>
<?php	

if(count($listaPersona)>0){
	echo '<tbody class="table-group-divider">';
    foreach($listaPersona as $objPersona){ 
        echo '<tr><td>'.$objPersona->getDni().'</td>';
		echo '<td>'.$objPersona->getApellido().'</td>';
		echo '<td>'.$objPersona->getNombre().'</td>';
		echo '<td>'.$objPersona->getFechaNac().'</td>';
        echo '<td>'.$objPersona->getTelefono().'</td>';
		echo '<td>'.$objPersona->getDomicilio().'</td>';
		echo '<td><a class="btn btn-warning" href="autosPersona.php?NroDni='.$objPersona->getDni().'">Autos</a></td>';
        echo '<td><a class="btn btn-success" href="../accion/tp4/accionBuscarPersona.php?NroDni='.$objPersona->getDni().'&accion=buscar">editar</a></td>';
		echo '<td><button type="button" class="btn btn-danger" onclick="confirmarBorrar(\''.$objPersona->getDni().'\', \'#confirmarEliminarPersona\',
			\'eliminarPersona\', \'insertarDni\', \'../accion/tp4/accionPersona.php?accion=borrar&NroDni=\')">borrar</button></td></tr>';
	}
	echo "</tbody>";
}else{
	echo '<tr><td class="container text-center">No hay personas cargadas</td></tr>';
}

?>
</table>
<div class="modal fade" tabindex="-1" id="confirmarEliminarPersona">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5">Eliminar de la base de datos</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<span>Esta seguro que desea eliminar de la base de datos a la persona con DNI: <span class="text-body bg-warning text-decoration-none px-1" id="insertarDni"></span></span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
				<a id="eliminarPersona" class="btn btn-success">Confirmar eliminacion</a>
			</div>
		</div>
  </div>
</div>
<div class="container text-center mb-3">
	<a class="btn btn-primary p-2" href="nuevaPersona.php">Ingresar una persona</a>
	<a class="btn btn-primary p-2 mx-2" href="buscarPersona.php">Buscar una persona</a>
</div>
</div>
</div>
<?php include_once '../estructura/footer.php';?>
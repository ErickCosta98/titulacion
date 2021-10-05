<?php
require_once 'persona.php';
require_once 'objpersona.php';
$valor = $_GET['valor'];
?>
<table class="table table-dark table-striped">
	<thead>
		<tr>
			<th>Identificador</th>
			<th>Curp</th>
			<th>Nombre</th>
			<th>Apellido Paterno</th>
			<th>Apellido Materno</th>
			<th>Correo Electronico</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
$persona = new Persona();
foreach ($persona->getPersonas("%" . $valor . "%") as $row) {
    $objPersona = new ObjPersona();
    $objPersona = $row;
    ?>
		<tr>
			<td><?php echo $objPersona->idPersona; ?></td>
			<td><?php echo $objPersona->curp; ?></td>
			<td><?php echo $objPersona->nombre; ?></td>
			<td><?php echo $objPersona->apelPat; ?></td>
			<td><?php echo $objPersona->apelMat; ?></td>
			<td><?php echo $objPersona->correo; ?></td>
			<td><button class="btn btn-warning" >Editar</button></td>
			<td><button class="btn btn-danger">Eliminar</button></td>
		</tr>
		<?php }?>
	</tbody>
</table>

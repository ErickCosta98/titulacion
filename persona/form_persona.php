
<?php
$action = $_GET['action'];
?>

<link rel="stylesheet" type="text/css" href="../public/css/togle.css">
<script type="text/javascript" src="../persona/persona.js"></script>
<?php
if ($action == "agregar") {
    ?>
<!-- Agregar -->
<div class="border-top-0 border-dark">
	<div class="col-sm-12 border">
		<form id="formDatPersonal">
		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Curp</label>
				<input type="text" class="form-control" name="txtCurp" id="txtCurp" placeholder="CURP">
			</div>
			<div class="form-group col-md-4">
				<label>Nombre</label>
				<input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="NOMBRE">
			</div>
			<div class="form-group col-md-4">
				<label>Primer Apellido</label>
				<input type="text" class="form-control" name="txtApelPat" id="txtApelPat" placeholder="PRIMER APELLIDO">
			</div>
			<div class="form-group col-md-4">
				<label>Segundo Apellido</label>
				<input type="text" class="form-control" name="txtApelMat" id="txtApelMat" placeholder="SEGUNDO APELLIDO">
			</div>
			<div class="form-group col-md-4">
				<label>Correo Electronico</label>
				<input type="text" class="form-control" name="txtCorreo" id="txtCorreo" placeholder="CORREO ELECTRONICO">
			</div>
		</div>
	</form>
	</div>
</div>
<br>
<div class="border-top-0 border-dark">
	<div class="col-sm-12 border">
		<br>
		<div class="form-row">
			<div class="form-group col-md-4">
				<div class="switch-button">
					<label><strong>Capturar Datos de Profesionista</strong></label><br>
   					<input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox" onclick="activarProfesionista()">
    				<label for="switch-label" class="switch-button__label"></label>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<div class="border-top-0 border-dark">
	<div id="datProfesionista">
	</div>
</div>
<br>
<div class="border-top-0 border-dark">
	<div class="col-sm-12 border">
		<br>
		<div class="form-group col-md-4">
				<button class="btn btn-success" id="btnAgregar" onclick="Insertar()">Aceptar</button>
		</div>
	</div>
</div>
<?php } else {
    ?>
<!-- Editar -->
 <?php }?>

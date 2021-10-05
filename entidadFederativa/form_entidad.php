<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="../public/lib/alertify.min.js"></script>
	<script type="text/javascript" src="../public/lib/sweetalert2.all.min.js"></script>
	<script type="text/javascript" src="../entidadFederativa/entidad.js"></script>
</head>
<body>
	<a href="javascript:void(0)" onclick="cargarInstitucion('0');">
	<img src="../public/img-system/regresar.png" id="img-regresar">
	</a>
	<br><br>
	
	<?php
	require_once 'entidad.php';
    $entidad = new Entidad();
if (isset($_GET['idEntidad'])) {
    $idEntidad = $_GET['idEntidad'];
    require_once 'objEntidad.php';
  
    foreach ($entidad->MostrarEntidadId($idEntidad) as $row) {
        $objEntidad = new ObjEntidad();
        $objEntidad = $row;
        ?>
<!--Edita -->
		<div>
		<form id="frmEntidad" method="POST" var="Editar">
	<input type="hidden" name="txtId" id="txtId" value="<?php echo $idEntidad; ?>">
		<div class="form-row">
			<div class="form-group col-md-3">
				<label>Entidad </label>
      			<input type="text" class="form-control" id="TxtEntidad" name="TxtEntidad" value="<?php echo $objEntidad->entidad; ?>" required>
			</div>
					
			<div class="form-group col-md-2">
				<label>&nbsp;</label>
				<br>
      			<button class="btn btn-success" id="btnAceptar">Guardar</button>
			</div>
		</div>
	</form>
		</div>
	<?php }
} ?>
</body>

</html>


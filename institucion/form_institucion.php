<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../public/lib/css/alertify.min.css">
	<link rel="stylesheet" type="text/css" href="../public/lib/css/themes/default.min.css">
	<script type="text/javascript" src="../public/lib/alertify.min.js"></script>
	<script type="text/javascript" src="../public/lib/sweetalert2.all.min.js"></script>
	<script type="text/javascript" src="../institucion/institucion.js"></script>
</head>
<body>
	<a href="javascript:void(0)" onclick="cargarInstitucion('0');">
	<img src="../public/img-system/regresar.png" id="img-regresar">
	</a>
	<br><br>
	
	<?php
	require_once 'institucion.php';
    $institucion = new Institucion();
if (isset($_GET['idInstitucion'])) {
    $idInstitucion = $_GET['idInstitucion'];
    require_once 'objInstitucion.php';
  
    foreach ($institucion->MostrarInstitucionId($idInstitucion) as $row) {
        $objInstitucion = new ObjInstitucion();
        $objInstitucion = $row;
        ?>
<!--Edita -->
		<div>
		<form id="frmCarrera" method="POST" var="Editar">
	<input type="hidden" name="txtCarrera" id="txtCarrera" value="<?php echo $idInstitucion; ?>">
		<div class="form-row">
			<div class="form-group col-md-3">
				<label>Clave </label>
      			<input type="text" class="form-control" id="txtclave" name="txtclave" value="<?php echo $objInstitucion->clave; ?>" required>
			</div>
			<div class="form-group col-md-3">
				<label>nombre</label>
      			<input type="text" id="Txtnombre" name="Txtnombre" class="form-control"  required value="<?php echo $objInstitucion->nombre; ?>" >
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


<!DOCTYPE html>
<html>
<head>

	<script type="text/javascript" src="../public/lib/alertify.min.js"></script>
	<script type="text/javascript" src="../public/lib/sweetalert2.all.min.js"></script>
	<script type="text/javascript" src="../estandar/estandar.js"></script>
</head>
<body>
	<a href="javascript:void(0)" onclick="cargarInstitucion('0');">
	<img src="../public/img-system/regresar.png" id="img-regresar">
	</a>
	<br><br>
	
	<?php
	require_once 'estandar.php';
    $estandar = new Estandar();
if (isset($_GET['idEstandar'])) {
    $idEstandar = $_GET['idEstandar'];
    require_once 'objEstandar.php';
  
    foreach ($estandar->MostrarEstandarId($idEstandar) as $row) {
        $objEstandar = new ObjEstandar();
        $objEstandar = $row;
        ?>
<!--Edita -->
		<div>
		<form id="frmEstandar" method="POST" var="Editar">
	<input type="hidden" name="txtId" id="txtId" value="<?php echo $idEstandar; ?>">
		<div class="form-row">
			<div class="form-group col-md-3">
				<label>Folio </label>
      			<input type="text" class="form-control" id="TxtEstandar" name="TxtEstandar" value="<?php echo $objEstandar->folio; ?>" required>
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


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nuevo</title>
	<link rel="stylesheet" type="text/css" href="../public/lib/css/alertify.min.css">
	<link rel="stylesheet" type="text/css" href="../public/lib/css/themes/default.min.css">
	<script type="text/javascript" src="../public/lib/alertify.min.js"></script>
	<script type="text/javascript" src="../public/lib/sweetalert2.all.min.js"></script>
	<script type="text/javascript" src="../carrera/carrera.js"></script>
</head>
<body>
	<a href="javascript:void(0)" onclick="cargarCarrera('0');">
	<img src="../public/img-system/regresar.png" id="img-regresar">
	</a>
	<br><br>
	<?php
   if(isset($_GET['idCarrera'])){
   	$idCarrera = $_GET['idCarrera'];
   	require_once 'objCarrera.php';
   	require_once 'carrera.php';
   	$carrera = new Carrera();
   	foreach ($carrera->getCarreraId($idCarrera) as $row) {
   		$objCarrrera = new ObjCarrera();
   		$objCarrera = $row;
   		?>
     <div>
   	<form id="frmCarrera" method="POST" action="Editar">
		<input type="hidden" name="txtIdCarrera" id="txtIdCarrera" value="<?php echo $idCarrera;?>">
		<div class="form-row">
			<div class="form-group col-md-3">
				<label>Cve Carrera </label>
      			<input type="text" class="form-control" name="txtcvcarrera" id="txtcvcarrera" value="<?php echo $objCarrera->ccarrera;?>"required>
			</div>
			<div class="form-group col-md-3">
				<label>Nombre </label>
      			<input type="text" class="form-control" value="<?php echo $objCarrera->nombre;?>" name="txtnombre" id="txtnombre" required>
			</div>
			<div class="form-group col-md-3">
				<label>Fecha de Inicio </label>
      			<input type="date" class="form-control" value="<?php echo $objCarrera->fechainicio;?>" name="txtfechaInicio" id="txtfechaInicio" required>
			</div>
			<div class="form-group col-md-3">
				<label>Fecha Termino</label>
      			<input type="date" class="form-control" value="<?php echo $objCarrera->fechatermino;?>" name="txtfechaTermino" id="txtfechaTermino" required>
			</div>
			<div class="form-group col-md-3">
				<label>Id Autorizacion </label>
      			<input type="number" class="form-control" value="<?php echo $objCarrera->idautorizacion;?>" name="txtidAutorizacion" id="txtidAutorizacion" required>
			</div>
				<div class="form-group col-md-3">
				<label>Autorizacion </label>
      			<input type="tel" class="form-control" value="<?php echo $objCarrera->autorizacion;?>" name="txtAutorizacion" id="txtAutorizacion" required>
			</div>
				<div class="form-group col-md-3">
				<label>Numero de rvoe </label>
      			<input type="number" class="form-control" value="<?php echo $objCarrera->numerorvoe;?>" name="txtnumerorvoe" id="txtnumerorvoe" required>
			</div>
			<div class="form-group col-md-2">
				<label>&nbsp;</label>
				<br>
      			<button class="btn btn-success" id="btnAgregar">Aceptar</button>
			</div>
		</div>
	</form>
    </div>

   <?php
   	}

   }else{
   	?>
    <div>
   	<form id="frmCarrera" method="POST">
		<input type="hidden" name="txtIdCarrera" id="txtIdCarrera" value="0">
		<div class="form-row">
			<div class="form-group col-md-3">
				<label>Cve Carrera </label>
      			<input type="text" class="form-control" placeholder="cvcarrera" name="txtcvcarrera" id="txtcvcarrera" required>
			</div>
			<div class="form-group col-md-3">
				<label>Nombre </label>
      			<input type="text" class="form-control" placeholder="Nombre" name="txtnombre" id="txtnombre" required>
			</div>
			<div class="form-group col-md-3">
				<label>Fecha de Inicio </label>
      			<input type="date" class="form-control" placeholder="Fecha de Inicio" name="txtfechaInicio" id="txtfechaInicio" required>
			</div>
			<div class="form-group col-md-3">
				<label>Fecha Termino</label>
      			<input type="date" class="form-control" placeholder="Fecha de Termino" name="txtfechaTermino" id="txtfechaTermino" required>
			</div>
			<div class="form-group col-md-3">
				<label>Id Autorizacion </label>
      			<input type="number" class="form-control" placeholder="Id Autorizacion" name="txtidAutorizacion" id="txtidAutorizacion" required>
			</div>
				<div class="form-group col-md-3">
				<label>Autorizacion </label>
      			<input type="tel" class="form-control" placeholder="Autorizacion" name="txtAutorizacion" id="txtAutorizacion" required>
			</div>
				<div class="form-group col-md-3">
				<label>Numero de rvoe </label>
      			<input type="number" class="form-control" placeholder="Numero de Rvoe" name="txtnumerorvoe" id="txtnumerorvoe" required>
			</div>
			<div class="form-group col-md-2">
				<label>&nbsp;</label>
				<br>
      			<button class="btn btn-success" id="btnAgregar">Aceptar</button>
			</div>
		</div>
	</form>
    </div>
   <?php }?>
</body>
</html>
<?php
require_once '../Nivel/nivel.php';
require_once '../federativa/entidad_federativa.php';
?>
<div id="datForm" class="col-sm-12 border">
	<form id="formProfesionista">
		<div class="form-row">
			<div class="form-group col-md-4">
			<label>Instituto de Procedencia</label>
			<input type="text" class="form-control" name="txtInstituto" id="txtInstituto" placeholder="INSTITUCIÓN">
			</div>
			<div class="form-group col-md-4">
				<label>Nivel</label>
				  <select id="cmbNivel" name="cmbNivel" class="form-control">
				  	<?php
$nivel = new Nivel();
$niv   = $nivel->getNivel();
for ($i = 0; $i < sizeof($niv); $i++) {
    $niveles = explode("*", $niv[$i]);
    ?>
				<option value="<?php echo $niveles[0] ?>"><?php echo $niveles[1]; ?></option>
<?php }?>
			</select>
			</div>
			<div class="form-group col-md-4">
				<label>Entidad Federativa</label>
				<select id="cmbEntidad" name="cmbEntidad" class="form-control">
				<?php
$entidad    = new EntidadFederativa();
$entidadFed = $entidad->getEntidad();
for ($i = 0; $i < sizeof($entidadFed); $i++) {
    $entFe = explode("*", $entidadFed[$i]);
    ?>
    			<option value="<?php echo $entFe[0]; ?>"><?php echo $entFe[1]; ?> </option>
<?php }?>
				</select>
			</div>
			<div class="form-group col-md-4">
				<label>Fecha de Inicio</label>
				<input type="date" class="form-control" name="txtInicio">
			</div>
			<div class="form-group col-md-4">
				<label>Fecha Termino</label>
				<input type="date" class="form-control" name="txtTermino">
			</div>
			<div class="form-group col-md-4">
				<label>Número de Cedula</label>
				<input type="text" class="form-control" id="txtCedula" name="txtCedula" placeholder="NÚMERO DE CEDULA">
			</div>
		</div>
	</form>
</div>

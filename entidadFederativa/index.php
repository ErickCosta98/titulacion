<?php
$valor = $_GET['valor'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carrera</title>
  
	<script type="text/javascript" src="../principal/principal.js"></script>
	<script type="text/javascript" src="../public/lib/sweetalert2.all.min.js"></script>
	<script type="text/javascript" src="../entidadFederativa/entidad.js"></script>

</head>
<body>
<?php
require_once 'entidad.php';
require_once 'objEntidad.php';
?>	
<h1>Modulo Institucion</h1>
<div>
		<!-- Apartado de Bsuqueda -->
	 <div class="row">
    <div class="col-sm-2 my-2">
      <label>Buscar Carrera</label>
    </div>
    <div class="col-sm-3 my-1">
      <input type="text" class="form-control" id="txtValor" placeholder="BUSCAR">
    </div>
    <div class="col-sm-1 my-1">
       <a href="javascript:void(0)" onclick="cargarEntidadFed('1')" class="btn btn-warning">Aceptar</a>
    </div>
    <div class="col-sm-2 my-1">
      <a href="javascript:void(0)" onclick="AgregarEntidadFed();" class="btn btn-success">Agregar Nuevo</a>
    </div>
  </div>
  <table class="table table-dark">
  	<thead>
  	<tr>
  		<th>Entidad</th>
  		<th></th>
  		<th></th>
  	</tr>	
  	</thead>
  	<tbody>
  		<?php
       $entidad = new Entidad();
       foreach ($entidad->getEntidad("%" . $valor ."%") as $row) {
       	$objEntidad = new ObjEntidad();
       	$objEntidad = $row;
      ?>
      <tr>
      	<td><?php echo $objEntidad->entidad;?></td>

      	<td><button class="btn btn-warning" onclick="Editar(<?php echo $objEntidad->idEntidad; ?>);">Editar</button></td>
		<td><button class="btn btn-danger"  onclick="Eliminar(<?php echo $objEntidad->idEntidad; ?>);">Eliminar</button></td>
      </tr>


    <?php  }?>
  	</tbody>
  </table>
</div>

</body>
</html>
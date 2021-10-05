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
	<script type="text/javascript" src="../Carrera/carrera.js"></script>

</head>
<body>
<?php
require_once 'carrera.php';
require_once 'objCarrera.php';
?>	
<h1>Modulo de Carreras</h1>
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
       <a href="javascript:void(0)" onclick="cargarCarrera('1')" class="btn btn-warning">Aceptar</a>
    </div>
    <div class="col-sm-2 my-1">
      <a href="javascript:void(0)" onclick="AgregarNuevo();" class="btn btn-success">Agregar Nuevo</a>
    </div>
  </div>
  <table class="table table-dark">
  	<thead>
  	<tr>
  		<th>Cve Carrera</th>
  		<th>Nombre</th>
  		<th>Fecha Inicio</th>
  		<th>Fecha Termino</th>
  	    <th>Id Autorizacion</th>
  		<th>Autorizacion</th>	
  		<th>Numero Rvoe</th>
  		<th></th>
  		<th></th>
  	</tr>	
  	</thead>
  	<tbody>
  		<?php
       $carrera = new Carrera();
       foreach ($carrera->getCarrera("%" . $valor ."%") as $row) {
       	$objCarrera = new ObjCarrera();
       	$objCarrera = $row;
      ?>
      <tr>
      	<td><?php echo $objCarrera->ccarrera;?></td>
      	<td><?php echo $objCarrera->nombre;?></td>
      	<td><?php echo $objCarrera->fechainicio;?></td>
      	<td><?php echo $objCarrera->fechatermino;?></td>
      	<td><?php echo $objCarrera->idautorizacion;?></td>
      	<td><?php echo $objCarrera->autorizacion;?></td>
      	<td><?php echo $objCarrera->numerorvoe;?></td>

      	<td><button class="btn btn-warning" onclick="Editar(<?php echo $objCarrera->idcarrera; ?>);">Editar</button></td>
		<td><button class="btn btn-danger"  onclick="Eliminar(<?php echo $objCarrera->idcarrera; ?>);">Eliminar</button></td>
      </tr>


    <?php  }?>
  	</tbody>
  </table>
</div>

</body>
</html>
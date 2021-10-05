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
	<script type="text/javascript" src="../estandar/estandar.js"></script>

</head>
<body>
<?php
require_once 'estandar.php';
require_once 'objEstandar.php';
?>	
<h1>Modulo Estandar</h1>
<div>
		<!-- Apartado de Bsuqueda -->
	 <div class="row">
    <div class="col-sm-2 my-2">
      <label>Buscar Estandar</label>
    </div>
    <div class="col-sm-3 my-1">
      <input type="text" class="form-control" id="txtValor" placeholder="BUSCAR">
    </div>
    <div class="col-sm-1 my-1">
       <a href="javascript:void(0)" onclick="cargarEstandar('1')" class="btn btn-warning">Aceptar</a>
    </div>
    <div class="col-sm-2 my-1">
      <a href="javascript:void(0)" onclick="AgregarEstandar();" class="btn btn-success">Agregar Nuevo</a>
    </div>
  </div>
  <table class="table table-dark">
  	<thead>
  	<tr>
  		<th>Estandar</th>
  		<th></th>
  		<th></th>
  	</tr>	
  	</thead>
  	<tbody>
  		<?php
       $estandar = new Estandar();
       foreach ($estandar->getEstandar("%" . $valor ."%") as $row) {
       	$objEstandar = new ObjEstandar();
       	$objEstandar = $row;
      ?>
      <tr>
      	<td><?php echo $objEstandar->folio;?></td>

      	<td><button class="btn btn-warning" onclick="Editar(<?php echo $objEstandar->idEstandar; ?>);">Editar</button></td>
		<td><button class="btn btn-danger"  onclick="Eliminar(<?php echo $objEstandar->idEstandar; ?>);">Eliminar</button></td>
      </tr>


    <?php  }?>
  	</tbody>
  </table>
</div>

</body>
</html>
<?php
require_once 'persona.php';
require_once 'objpersona.php';
?>
<script type="text/javascript" src="../persona/persona.js"></script>
<script type="text/javascript" src="../public/lib/sweetalert2.all.min.js"></script>
<h1>Modulo</h1>
<div>
	<div class="row">
			<div class="col-sm-2 my-2">
				<label>Buscar Persona</label>
			</div>
			<div class="col-sm-3 my-1">
					<input type="text" name="txtValor" id="txtValor" onkeyup="buscarP()">
			</div>
			<div class="col-sm-1 my-1">
       			<a href="javascript:void(0)" class="btn btn-info" onclick="agregarP()">Nuevo Registro</a>
    		</div>
	</div>
	<div id="tbl-persona">
	</div>
</div>

<script type="text/javascript">
	$('#tbl-persona').load('../persona/tbl_persona.php?valor=' + '');
</script>

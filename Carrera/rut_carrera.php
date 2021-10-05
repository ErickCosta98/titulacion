<?php
require_once 'carrera.php';
$carrera = new Carrera();

if(isset($_GET['idCarrera']))
{
if($carrera->eliminar($_GET['idCarrera'])){
	echo "true";
}else{
	echo "false";
}
}else{

  $idCarrera = $_POST['txtIdCarrera'];
  $cvcarrera = $_POST['txtcvcarrera'];
  $nombre = $_POST['txtnombre'];
  $fechaInicio = $_POST['txtfechaInicio'];
  $fechaTermino = $_POST['txtfechaTermino'];
  $idAutorizacion = $_POST['txtidAutorizacion'];
  $autorizacion = $_POST['txtAutorizacion'];
  $numerorvoe = $_POST['txtnumerorvoe'];
  $estado = "Activo";
if($idCarrera == 0){
 if($carrera->agregar($idCarrera, $cvcarrera, $nombre, $fechaInicio, $fechaTermino, $idAutorizacion, $autorizacion,$numerorvoe,$estado)){
 	echo "true";
 }else{
 	echo "false";
 }
}else{
if ($carrera->editar($idCarrera, $cvcarrera, $nombre, $fechaInicio, $fechaTermino, $idAutorizacion, $autorizacion,$numerorvoe,$estado)) {
            echo "true";
    } else {
            echo "false";
    }

}

}


?>
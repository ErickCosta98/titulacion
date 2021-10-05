<?php
require_once 'estandar.php';
$ValorEstandar = new Estandar();
if (isset($_GET['idEstandar'])) {
    if ($ValorEstandar->eliminar($_GET['idEstandar'])) {
        echo "true";
    } else {
       echo "false";
    }
} else if(isset($_POST['txtId'])) 
  {
        $idEntidad= $_POST['txtId'];
        $entidad = $_POST['TxtEstandar'];
        if($ValorEstandar->editar($idEntidad,$entidad)) {
            echo "true";
        } else {
            echo "false";
        }
   
 } else {
    $var       = json_decode($_POST["datos"]);
    $estandar   = $var[0];
    $estado    = "Activo";
    if ($ValorEstandar->Insertar($estandar,$estado)) {
        echo "true";
    } else {
        echo "false";
    }
}
  
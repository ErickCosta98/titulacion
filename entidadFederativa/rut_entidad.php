<?php
require_once 'entidad.php';
$ValorEntidad = new Entidad();
if (isset($_GET['idEntidad'])) {
    if ($ValorEntidad->eliminar($_GET['idEntidad'])) {
        echo "true";
    } else {
       echo "false";
    }
} else if(isset($_POST['txtId'])) 
  {
        $idEntidad= $_POST['txtId'];
        $entidad = $_POST['TxtEntidad'];
        if($ValorEntidad->editar($idEntidad,$entidad)) {
            echo "true";
        } else {
            echo "perro";
        }
   
 } else {
    $var       = json_decode($_POST["datos"]);
    $entidad    = $var[0];
    $estado    = "Activo";
    if ($ValorEntidad->Insertar($entidad,$estado)) {
        echo "true";
    } else {
        echo "false";
    }
}
  
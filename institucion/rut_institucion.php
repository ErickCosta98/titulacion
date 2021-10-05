<?php
require_once 'institucion.php';
$institucion = new Institucion();

if (isset($_GET['idInstitucion'])) {
    if ($institucion->eliminar($_GET['idInstitucion'])) {
        echo "true";
    } else {
       echo "false";
    }
} else if(isset($_POST['txtCarrera'])) 
  {
        $idInstitucion = $_POST['txtCarrera'];
        $clave = $_POST['txtclave'];
        $nombre = $_POST['Txtnombre'];
        $estado = "Activo";
        if($institucion->editar($idInstitucion,$clave,$nombre,$estado)) {
            echo "true";
        } else {
            echo "perro";
        }
   
 } else {
         $var       = json_decode($_POST["datos"]);
    $nombre    = $var[0];
    $clave    = $var[1];
    $estado    = "Activo";
    if ($institucion->Insertar($nombre,$clave,$estado)) {
        echo "true";
    } else {
        echo "false";
    }
    }

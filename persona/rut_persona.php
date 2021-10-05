<?php
require_once '../persona/persona.php';
$persona   = new Persona();
$idPersona = 0;
$curp      = $_POST['txtCurp'];
$nombre    = $_POST['txtNombre'];
$apelPat   = $_POST['txtApelPat'];
$apelMat   = $_POST['txtApelMat'];
$correo    = $_POST['txtCorreo'];
$estado    = "Activo";
$persona->agregarP($idPersona, $curp, $nombre, $apelPat, $apelMat, $correo, $estado);
if (isset($_POST["txtInstituto"])) {
    require_once '../antecedente/antecedente.php';
    $antecedente   = new Antecedente();
    $idAntecedente = 0;
    $instituto     = $_POST['txtInstituto'];
    $nivel         = $_POST['cmbNivel'];
    $entidadF      = $_POST['cmbEntidad'];
    $fechaIn       = $_POST['txtInicio'];
    $fechaTe       = $_POST['txtTermino'];
    $numCedula     = $_POST['txtCedula'];
    $idPersona     = $persona->getIdPersona();
    $antecedente->agregar($idAntecedente, $instituto, $nivel, $entidadF, $fechaIn, $fechaTe, $numCedula, $idPersona);
}

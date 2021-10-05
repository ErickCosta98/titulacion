<?php
/**
 *
 */
require_once '../bd/bd.php';

class Antecedente
{

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function agregar($idAntecedente, $instituto, $nivel, $entidadF, $fechaIn, $fechaTe, $numCedula, $idPersona)
    {
        $query = $this->conexion->conn()->prepare("INSERT INTO antecedente(id_antecedente,institucion_procedencia,id_tipoAntecedente,id_entidad_federativa,fecha_inicio,fecha_termino,no_cedula,id_persona) VALUES (:idAntecedente,:insProcedencia,:nivel,:idEntidad,:fechaInicio,:fechatermino,:noCedula,:idPersona)");
        $query->execute(["idAntecedente" => $idAntecedente, "insProcedencia" => $instituto, "nivel" => $nivel, "idEntidad" => $entidadF, "fechaInicio" => $fechaIn, "fechatermino" => $fechaTe, "noCedula" => $numCedula, "idPersona" => $idPersona]);
    }

}

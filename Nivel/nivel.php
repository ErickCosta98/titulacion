<?php
/**
 *
 */
require_once '../bd/bd.php';
class Nivel
{

    private $conexion;
    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function getNivel()
    {
        $item  = array();
        $query = $this->conexion->conn()->query("SELECT CONCAT(id_tipo_estudio_antecedente,'* [ ',tipo_estudio_antecedente,' ] ',tipo_educativo_antecedente) as nivel  FROM estudio_antecedente");
        $query->execute();
        while ($row = $query->fetch()) {
            $item[] = $row['nivel'];
        }
        return $item;
    }
}

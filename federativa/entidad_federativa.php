<?php

/**
 *
 */
require_once '../bd/bd.php';
class EntidadFederativa
{
    private $conexion;
    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function getEntidad()
    {
        $item  = array();
        $query = $this->conexion->conn()->query("SELECT CONCAT(id_entidad,'* [',c_entidad_abr,'] ',entidad_federativa) AS entidad FROM entidad_federativa");
        $query->execute();
        while ($row = $query->fetch()) {
            $item[] = $row['entidad'];
        }
        return $item;
    }
}

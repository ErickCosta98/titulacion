<?php /**
 *
 */
require_once '../bd/bd.php';
class Persona
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function getPersonas($valor)
    {
        $items = [];
        $query = $this->conexion->conn()->prepare("SELECT id_persona, curp, nombre, primer_apellido, segundo_apellido, correo_electronico,estado FROM persona WHERE estado='Activo' AND CONCAT(id_persona,curp,nombre,primer_apellido,segundo_apellido) LIKE :valor");
        $query->execute(["valor" => $valor]);
        while ($row = $query->fetch()) {
            $item            = new ObjPersona();
            $item->idPersona = $row['id_persona'];
            $item->curp      = $row['curp'];
            $item->nombre    = $row['nombre'];
            $item->apelPat   = $row['primer_apellido'];
            $item->apelMat   = $row['segundo_apellido'];
            $item->correo    = $row['correo_electronico'];
            $item->estado    = $row['estado'];
            array_push($items, $item);
        }
        return $items;
    }

    public function agregarP($idPersona, $curp, $nombre, $apelPat, $apelMat, $correo, $estado)
    {
        try {
            $query = $this->conexion->conn()->prepare("INSERT INTO persona(id_persona,curp,nombre,primer_apellido,segundo_apellido,correo_electronico,estado) VALUES(:idPersona,:curp,:nombre,:primerApel,:segundoApel,:correo,:estado)");
            $query->execute(["idPersona" => $idPersona, "curp" => $curp, "nombre" => $nombre, "primerApel" => $apelPat, "segundoApel" => $apelMat, "correo" => $correo, "estado" => $estado]);
            return true;
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function getIdPersona()
    {
        $idPersona = "";
        $query     = $this->conexion->conn()->prepare("SELECT MAX(id_persona) AS idP FROM persona");
        $query->execute();
        while ($row = $query->fetch()) {
            $idPersona = $row['idP'];
        }
        return $idPersona;
    }
}

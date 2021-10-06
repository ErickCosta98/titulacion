<?php /**
 *
 */
require_once '../bd/bd.php';
class Titulo
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function getResponsables()
    {
        $items=[];
        $query = $this->conexion->conn()->prepare("SELECT responsable.*,persona.nombre,persona.primer_apellido,persona.segundo_apellido,persona.curp FROM responsable INNER JOIN persona ON  responsable.id_persona = persona.id_persona");
        $query->execute();
        // $items = $query->fetchAll(PDO::FETCH_ASSOC);
        while ($row = $query->fetch()) {
            $item = [
                    'nombre'=>$row['nombre'],
                    'primerApellido'=>$row['primer_apellido'],
                    'segunApellido'=>$row['segundo_apellido'],
                    'curp'=>$row['curp']
            ] ;
            array_push($items, $item);
        }
        return $items;
    }

    
}

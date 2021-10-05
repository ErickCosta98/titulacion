<?php
require_once '../bd/bd.php';
require_once 'objCarrera.php';
class Carrera{
	private $conexion;
	public function __construct()
	{
		$this->conexion = new Conexion();
	}

public function getCarrera($valor){
	$items = [];
	$query = $this->conexion->conn()->prepare("SELECT id_carrera,Cve_carrera,nombre,fecha_inicio,fecha_terminacion,id_autorizacion_reconocimiento,autorizacion_reconocimiento,numero_rvoe,estado FROM carrera WHERE estado='Activo' AND CONCAT('nombre') LIKE :valor");
	$query->execute(["valor" => $valor]);
	while ($row = $query->fetch()) {
		$item = new ObjCarrera();
		$item->idcarrera = $row['id_carrera'];
		$item->ccarrera = $row['Cve_carrera'];
		$item->nombre = $row['nombre'];
		$item->fechainicio = $row['fecha_inicio'];
		$item->fechatermino = $row['fecha_terminacion'];
		$item->idautorizacion = $row['id_autorizacion_reconocimiento'];
		$item->autorizacion = $row['autorizacion_reconocimiento'];
		$item->numerorvoe = $row['numero_rvoe'];
		$item->estado = $row['estado'];

array_push($items, $item);

	}
	return $items;
}

public function getCarreraId($valor){
	$items = [];
	$query = $this->conexion->conn()->prepare("SELECT id_carrera,Cve_carrera,nombre,fecha_inicio,fecha_terminacion,id_autorizacion_reconocimiento,autorizacion_reconocimiento,numero_rvoe, estado FROM carrera WHERE estado='Activo' AND id_carrera=:idCarrera");
	$query->execute(["idCarrera" => $valor]);
	while ($row = $query->fetch()) {
		$item = new ObjCarrera();
		$item->idcarrera = $row['id_carrera'];
		$item->ccarrera = $row['Cve_carrera'];
		$item->nombre = $row['nombre'];
		$item->fechainicio = $row['fecha_inicio'];
		$item->fechatermino = $row['fecha_terminacion'];
		$item->idautorizacion = $row['id_autorizacion_reconocimiento'];
		$item->autorizacion = $row['autorizacion_reconocimiento'];
		$item->numerorvoe = $row['numero_rvoe'];
		$item->estado = $row['estado'];
array_push($items, $item);

	}
	return $items;
}
    public function agregar($idCarrera, $cvcarrera, $nombre, $fechaInicio, $fechaTermino, $idAutorizacion, $autorizacion,$numerorvoe,$estado)
    {
        try {
            $query = $this->conexion->conn()->prepare("INSERT INTO carrera(id_carrera,Cve_carrera,nombre,fecha_inicio,fecha_terminacion,id_autorizacion_reconocimiento,autorizacion_reconocimiento,numero_rvoe,estado) VALUES (:idCarrera,:cvcarrera,:nombre,:fechaInicio,:fechaTermino,:idAutorizacion,:autorizacion,:numerorvoe,:estado)");
            $query->execute([null,"cvcarrera" => $cvcarrera, "nombre" => $nombre, "fechaInicio" => $fechaInicio, "fechaTermino" => $fechaTermino, "idAutorizacion" => $idAutorizacion, "autorizacion" => $autorizacion, "numerorvoe" => $numerorvoe, "estado" => $estado]);
            return true;
        } catch (PDOException $e) {
            return $false;
        }
    }
    public function editar($idCarrera, $cvcarrera, $nombre, $fechaInicio, $fechaTermino, $idAutorizacion, $autorizacion, $numerorvoe){
    	try{

         $query = $this->conexion->conn()->prepare("UPDATE carrera SET Cve_carrera=:cvcarrera,nombre=:nombre,fecha_inicio=:fechaInicio,fecha_terminacion=:fechaTermino,id_autorizacion_reconocimiento=:idAutorizacion,autorizacion_reconocimiento=:autorizacion,numero_rvoe=:numerorvoe WHERE id_carrera=:idCarrera");

         $query->execute(["idCarrera" => $idCarrera, "cvcarrera" => $cvcarrera, "nombre" => $nombre, "fechaInicio" => $fechaInicio, "fechaTermino" => $fechaTermino, "idAutorizacion" => $idAutorizacion, "autorizacion" =>$autorizacion, "numerorvoe" => $numerorvoe]);
         return true;
    	}catch (PDOException $e){
    		echo $e;
         return false;
    	}

    }
        public function eliminar($idCarrera)
    {
        try {
            $query = $this->conexion->conn()->prepare("UPDATE carrera SET estado='Eliminado' WHERE id_carrera=:idCarrera");
            $query->execute(["idCarrera" => $idCarrera]);
            return true;
        } catch (PDOException $e) {
            return false;
        }

    }

}
?>
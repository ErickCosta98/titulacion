<?php
require_once '../bd/bd.php';
require_once 'objInstitucion.php';
class Institucion{
	private $conexion;
	public function __construct()
	{
		$this->conexion = new Conexion();
	}

public function getInstitucion($valor){
	$items = [];
	$query = $this->conexion->conn()->prepare("SELECT id_institución,clave,nombre,estado FROM institucion WHERE estado='Activo' AND CONCAT('nombre') LIKE :valor");
	$query->execute(["valor" => $valor]);
	while ($row = $query->fetch()) {
		$item = new ObjInstitucion();
		$item->idinstitucion = $row['id_institución'];
		$item->clave = $row['clave'];
		$item->nombre = $row['nombre'];
		$item->estado = $row['estado'];

array_push($items, $item);

	}
	return $items;
}
  public function Insertar($clave,$nombre,$estado){
     try{

        $query = $this->conexion->conn()->prepare("INSERT INTO institucion(clave,nombre,estado) VALUES (:clave,:nombre,:estado)");
            $query->execute([null,"clave" => $clave, "nombre" => $nombre,"estado" => $estado]);
            return true;

     } catch (PDOException $e) {
            echo $e;
        }
    }
      public function editar($idInstitucion,$clave,$nombre,$estado){
     try{

        $query = $this->conexion->conn()->prepare("UPDATE institucion SET clave=:clave,nombre=:nombre,estado=:estado WHERE id_institución=:idInstitucion");
            $query->execute(["idInstitucion"=>$idInstitucion,"clave" => $clave, "nombre" => $nombre,"estado" => $estado]);
            return true;

     } catch (PDOException $e) {
            echo $e;
        }
    }
     public function eliminar($idInstitucion){
     try{

        $query = $this->conexion->conn()->prepare("UPDATE institucion SET estado='Eliminado' WHERE id_institución=:idInstitucion");
            $query->execute(["idInstitucion"=>$idInstitucion]);
            return true;

     } catch (PDOException $e) {
            echo $e;
        }
    }
    public function MostrarInstitucionId($var){
        $items = [];
        $query = $this->conexion->conn()->prepare("SELECT institucion.id_institución AS id, institucion.clave AS clave, institucion.nombre AS nombre from institucion WHERE id_institución =:id");
             $query->execute(['id' => $var]);

            while ($row = $query->fetch()){
           $item = new ObjInstitucion();
           $item->idinstitucion =$row['id'];
           $item->clave = $row['clave'];
           $item->nombre = $row['nombre'];


           array_push($items, $item);
        }
        return $items;
}

}
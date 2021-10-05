<?php
require_once '../bd/bd.php';
require_once 'objEntidad.php';
class Entidad{
	private $conexion;
	public function __construct()
	{
		$this->conexion = new Conexion();
	}
	public function Insertar($entidad,$estado){
		     try{

        $query = $this->conexion->conn()->prepare("INSERT INTO entidad_federativa(entidad_federativa,estado) VALUES (:entidad,:estado)");
            $query->execute([null,"entidad" => $entidad, "estado" => $estado]);
            return true;

     } catch (PDOException $e) {
            echo $e;
            return false;
        }
	}

public function getEntidad($valor){
	$items = [];
	$query = $this->conexion->conn()->prepare("SELECT id_entidad,entidad_federativa FROM entidad_federativa WHERE estado='Activo' AND CONCAT('entidad') LIKE :valor");
	$query->execute(["valor" => $valor]);
	while ($row = $query->fetch()) {
		$item = new ObjEntidad();
		$item->idEntidad = $row['id_entidad'];
		$item->entidad = $row['entidad_federativa'];

array_push($items, $item);

	}
	return $items;
}
    public function MostrarEntidadId($var){
        $items = [];
        $query = $this->conexion->conn()->prepare("SELECT entidad_federativa.id_entidad AS id, entidad_federativa.entidad_federativa AS entidad from entidad_federativa WHERE id_entidad =:id");
             $query->execute(['id' => $var]);

            while ($row = $query->fetch()){
           $item = new ObjEntidad();
           $item->idEntidad = $row['id'];
		   $item->entidad = $row['entidad'];


           array_push($items, $item);
        }
        return $items;
}
     public function editar($idEntidad,$entidad){
     try{

        $query = $this->conexion->conn()->prepare("UPDATE entidad_federativa SET entidad_federativa=:entidad WHERE id_entidad=:idEntidad");
            $query->execute(["idEntidad"=>$idEntidad,"entidad"=>$entidad]);
            return true;

     } catch (PDOException $e) {
            echo $e;
        }
    }
      public function eliminar($idEntidad){
     try{

        $query = $this->conexion->conn()->prepare("UPDATE entidad_federativa SET estado='Eliminado' WHERE id_entidad=:idEntidad");
            $query->execute(["idEntidad"=>$idEntidad]);
            return true;

     } catch (PDOException $e) {
            echo $e;
        }
    }


}
?>
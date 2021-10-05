<?php
require_once '../bd/bd.php';
require_once 'objEstandar.php';
class Estandar{
	private $conexion;
	public function __construct()
	{
		$this->conexion = new Conexion();
	}
	public function getEstandar($valor){
	$items = [];
	$query = $this->conexion->conn()->prepare("SELECT id_estandar,folio_control FROM estandar WHERE estado='Activo' AND CONCAT('folio_control') LIKE :valor");
	$query->execute(["valor" => $valor]);
	while ($row = $query->fetch()) {
		$item = new objEstandar();
		$item->idEstandar = $row['id_estandar'];
		$item->folio = $row['folio_control'];

array_push($items, $item);

	}
	return $items;
}
	public function Insertar($estandar,$estado){
		     try{

        $query = $this->conexion->conn()->prepare("INSERT INTO estandar(folio_control,estado) VALUES (:estandar,:estado)");
            $query->execute([null,"estandar" => $estandar, "estado" => $estado]);
            return true;

     } catch (PDOException $e) {
            echo $e;
            return false;
        }
	}
    public function MostrarEstandarId($var){
        $items = [];
        $query = $this->conexion->conn()->prepare("SELECT estandar.id_estandar AS id, estandar.folio_control AS folio from estandar WHERE id_estandar =:id");
             $query->execute(['id' => $var]);

            while ($row = $query->fetch()){
           $item = new objEstandar();
           $item->idEstandar = $row['id'];
		   $item->folio = $row['folio'];


           array_push($items, $item);
        }
        return $items;
}
   public function editar($idEstandar,$folio){
     try{

        $query = $this->conexion->conn()->prepare("UPDATE estandar SET folio_control=:folio WHERE id_estandar=:idEstandar");
        $query->execute(["idEstandar"=>$idEstandar,"folio"=>$folio]);
            return true;

     } catch (PDOException $e) {
            echo $e;
        }
    }

      public function eliminar($idEstandar){
     try{

        $query = $this->conexion->conn()->prepare("UPDATE estandar SET estado='Eliminado' WHERE id_estandar=:idEstandar");
            $query->execute(["idEstandar"=>$idEstandar]);
            return true;

     } catch (PDOException $e) {
            echo $e;
        }
    }

}
?>
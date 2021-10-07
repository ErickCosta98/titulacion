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
        $query = $this->conexion->conn()->prepare("SELECT responsable.*,persona.nombre,persona.primer_apellido,persona.segundo_apellido,persona.curp,cargo_firmantes.cargo_firmante as cargo FROM responsable INNER JOIN persona INNER JOIN cargo_firmantes ON  responsable.id_persona = persona.id_persona AND responsable.id_cargo = cargo_firmantes.id_cargo");
        $query->execute();
        // $items = $query->fetchAll(PDO::FETCH_ASSOC);
        while ($row = $query->fetch()) {
            $item = [
                    'nombre'=>$row['nombre'],
                    'primerApellido'=>$row['primer_apellido'],
                    'segunApellido'=>$row['segundo_apellido'],
                    'curp'=>$row['curp'],
                    'idCargo'=>$row['id_cargo'],
                    'cargo'=>$row['cargo'],
                    'abrTitulo'=>$row['abr_titulo'],
                    'sello'=>$row['sello'],
                    'certificadoResponsable'=>$row['certificado_responsable'],
                    'noCertificadoResponsable'=>$row['no_certificado']
            ] ;
            array_push($items, $item);
        }
        return $items;
    }


    public function getInstitucion(){
        $items =[];
        $query = $this->conexion->conn()->prepare('SELECT * FROM institucion');
        $query->execute();
        while ($row = $query->fetch()) {
            $item = [
                    'cveInstitucion'=>$row['clave'],
                    'nombreInstitucion'=>$row['nombre'],
            ] ;
            array_push($items, $item);
        }
        return $items;

    }


    public function getCarrera(){
        $items = [];
        $query = $this->conexion->conn()->prepare('SELECT carrera.*,autorizacion.autorizacion FROM carrera INNER JOIN autorizacion ON carrera.id_carrera = 2  AND carrera.id_autorizacion_reconocimiento= autorizacion.id_autorizacion');
        $query->execute();
        while ($row = $query->fetch()) {
            $item = [
                    'cveCarrera'=>$row['Cve_carrera'],
                    'nombreCarrera'=>$row['nombre'],
                    'fechaInicio'=>$row['fecha_inicio'],
                    'fechaTerminacio'=>$row['fecha_terminacion'],
                    'idAutorizacionReconocimiento'=>$row['id_autorizacion_reconocimiento'],
                    'autorizacionReconocimiento'=>$row['autorizacion']
            ] ;
            array_push($items, $item);
        }
        
        return $items;

    }

    public function getProfesionista(){
        $items = [];
        $query = $this->conexion->conn()->prepare('SELECT persona.* FROM profesionista INNER JOIN persona ON profesionista.id_profesionista = 1  AND profesionista.id_persona = persona.id_persona' );
        $query->execute();
        while ($row = $query->fetch()) {
            $item = [
                'curp'=>$row['curp'],
                'nombre'=>$row['nombre'],
                'primerApellido'=>$row['primer_apellido'],
                'segunApellido'=>$row['segundo_apellido'],
                'correoElectronico'=>$row['correo_electronico']
            ] ;
            array_push($items, $item);
        }
        
        return $items;


    }

    public function getExpedicion(){
        $items = [];
        $query = $this->conexion->conn()->prepare('SELECT * FROM expedicion WHERE id_expedicion = 1');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_ASSOC);
        // while ($row = $query->fetch()) {
        //     $item = [
        //         'curp'=>$row['curp'],
        //         'nombre'=>$row['nombre'],
        //         'primerApellido'=>$row['primer_apellido'],
        //         'segunApellido'=>$row['segundo_apellido'],
        //         'correoElectronico'=>$row['correo_electronico']
        //     ] ;
        //     array_push($items, $item);
        // }
        
        return $items;

    }




    
}

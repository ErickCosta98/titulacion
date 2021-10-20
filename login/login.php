<?php

require_once '../bd/bd.php';



class Login
{
    private $conexion;
    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    // public function getResponsables()
    // {
    //     $items=[];
    //     $query = $this->conexion->conn()->prepare("SELECT responsable.*,persona.nombre,persona.primer_apellido,persona.segundo_apellido,persona.curp,cargo_firmantes.cargo_firmante as cargo FROM responsable INNER JOIN persona INNER JOIN cargo_firmantes ON  responsable.id_persona = persona.id_persona AND responsable.id_cargo = cargo_firmantes.id_cargo");
    //     $query->execute();
    //     // $items = $query->fetchAll(PDO::FETCH_ASSOC);
    //     while ($row = $query->fetch()) {
    //         $item = [
    //                 'nombre'=>$row['nombre'],
    //                 'primerApellido'=>$row['primer_apellido'],
    //                 'segunApellido'=>$row['segundo_apellido'],
    //                 'curp'=>$row['curp'],
    //                 'idCargo'=>$row['id_cargo'],
    //                 'cargo'=>$row['cargo'],
    //                 'abrTitulo'=>$row['abr_titulo'],
    //                 'sello'=>$row['sello'],
    //                 'certificadoResponsable'=>$row['certificado_responsable'],
    //                 'noCertificadoResponsable'=>$row['no_certificado']
    //         ] ;
    //         array_push($items, $item);
    //     }
    //     return $items;
    // }

    public function singup($nombre, $usuario, $password)
    {
        try {
            $query = $this->conexion->conn()->prepare("INSERT INTO usuarios(nombre,username,password) VALUES(:nombre,:username,:password)");
            $query->bindParam(':nombre', $nombre);
            $query->bindParam(':username', $usuario);
            $passworde = password_hash($password, PASSWORD_BCRYPT);
            $query->bindParam(':password', $passworde);
            $query->execute();
            return true;
        } catch (Exception $e) {
            echo $e;
        }
    }
}
// $users = [
//     [
//         'usuario'=>'Admin1',
//         'password'=>'Admin001'
//     ],
//     [
//         'usuario'=>'Admin2',
//         'password'=>'Admin001'
//     ],
//     [
//         'usuario'=>'Admin3',
//         'password'=>'Admin001'
//     ],
//     ];



// // echo json_encode($users);
// foreach ($users as $key => $value) {
//     echo 'Usuario:'.$value['usuario'].'&nbsp;Password:'.$value['password'].'<br>';
// }

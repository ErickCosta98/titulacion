<?php
require_once '../login/login.php';

$user = new Login();

$nombre = $_POST['nombre'] ;
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$user->singup($nombre,$usuario,$password);
echo 'hola';

?>
<?php

/**
 *
 */

class Conexion
{
    public $HOST     = "localhost:3306";
    public $BD       = "titulacion";
    public $USER     = "root";
    public $PASSWORD = "";
    public $CHARSET  = "utf8mb4";

    public function conn()
    {
        try {
            $connection = "mysql:host=" . $this->HOST . ";dbname=" . $this->BD . ";charset=" . $this->CHARSET;
            $options    = [
                PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO($connection, $this->USER, $this->PASSWORD, $options);
            return $pdo;
        } catch (PDOException $e) {
            echo "<h1>Error Durante la conexion a la Base de datos<h1>";
        }
    }
}

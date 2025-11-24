<?php
namespace Models;

use PDO;
use Database\Conexion;

class Usuario
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = Conexion::getConexion();
    }

    public function buscarUsuario($nombre, $apellidos, $correo)
    {
        $sql = "SELECT * FROM usuarios 
                WHERE nombre = :nombre 
                AND apellidos = :apellidos 
                AND correo = :correo";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':nombre'    => $nombre,
            ':apellidos' => $apellidos,
            ':correo'    => $correo
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

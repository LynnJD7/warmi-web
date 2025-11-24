<?php
namespace Models;

use PDO;
use Database\Conexion;

class Evidencia {

    public function listarPorUsuario($user_id) {
        $conn = Conexion::getConexion(); // ✅ autoload + namespace correcto

        $stmt = $conn->prepare("SELECT id, nombre_archivo, tipo, fecha_captura, tamano_bytes
            FROM evidencias
            WHERE user_id = :user_id
            ORDER BY id DESC
        ");

        $stmt->execute([
            'user_id' => $user_id
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerArchivo($user_id, $nombre_archivo) {
        $conn = Conexion::getConexion(); // ✅ coherente

        $stmt = $conn->prepare("SELECT nombre_archivo, tipo, archivo
            FROM evidencias
            WHERE user_id = :user_id
            AND nombre_archivo = :nombre
        ");

        $stmt->execute([
            'user_id' => $user_id,
            'nombre'  => $nombre_archivo
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

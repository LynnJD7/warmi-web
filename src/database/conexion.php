<?php
namespace Database;

require_once __DIR__ . '/../Helpers/env_loader.php';

use PDO;
use PDOException;
use Exception;

class Conexion {

    private static $instance = null;

    public static function getConexion() {

        if (self::$instance !== null) {
            return self::$instance;
        }

        $host = env("DB_HOST");
        $port = env("DB_PORT");
        $database = env("DB_DATABASE");
        $user = env("DB_USER");
        $password = env("DB_PASSWORD");

        try {
            self::$instance = new PDO(
                "mysql:host=$host;port=$port;dbname=$database;charset=utf8",
                $user,
                $password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );

            return self::$instance;

        } catch (PDOException $e) {
            error_log("Error de conexión: " . $e->getMessage());
            throw new Exception("Error interno del servidor.");
        }
    }
}

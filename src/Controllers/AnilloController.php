<?php
namespace Controllers;

use Models\Pedido;
use Database\Conexion;

class AnilloController
{
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }

        require PUBLIC_PATH . '/anillo.php';
    }

    public function estadoPago()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            echo json_encode(["error" => "no_auth"]);
            return;
        }

        $pedidoId = $_GET["pedido_id"] ?? null;

        if (!$pedidoId) {
            echo json_encode(["error" => "no_id"]);
            return;
        }

        $conexion = Conexion::getConexion();
        $pedidoModel = new Pedido($conexion);

        $data = $pedidoModel->obtenerEstadoPago((int)$pedidoId, (int)$_SESSION["user_id"]);

        echo json_encode($data ?: ["estado" => "no_existe"]);
    }
}

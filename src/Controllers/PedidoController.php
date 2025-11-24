<?php
namespace Controllers;

use Models\Pedido;
use Database\Conexion;

class PedidoController
{
    public function guardar()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            echo json_encode(["error" => "No autenticado"]);
            return;
        }

        $conexion = Conexion::getConexion();
        $pedido = new Pedido($conexion);

        $data = [
            "cantidad"     => $_POST['cantidad'] ?? null,
            "nombre"       => $_POST['nombre_entrega'] ?? null,
            "direccion"    => $_POST['direccion_entrega'] ?? null,
            "metodo_pago"  => $_POST['metodo_pago'] ?? null,
            "id_usuario"   => $_SESSION['user_id']
        ];

        if ($pedido->crear($data)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false]);
        }
    }

    public function estado()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            echo json_encode(["estado" => "error"]);
            return;
        }

        $pedidoId = $_GET['pedido_id'] ?? null;

        if (!$pedidoId) {
            echo json_encode(["estado" => "no_id"]);
            return;
        }

        $conexion = Conexion::getConexion();
        $pedido = new Pedido($conexion);

        $estado = $pedido->obtenerEstado((int)$pedidoId, (int)$_SESSION['user_id']);

        echo json_encode($estado ?: ["estado" => "no_encontrado"]);
    }
}

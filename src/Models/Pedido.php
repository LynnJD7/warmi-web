<?php
namespace Models;

use PDO;

class Pedido
{
    private PDO $db;

    public function __construct(PDO $conexion)
    {
        $this->db = $conexion;
    }

    public function obtenerEstadoPago(int $pedidoId, int $usuarioId): ?array
    {
        $sql = "SELECT estado 
                FROM pedidos 
                WHERE id = :id 
                AND id_usuario = :usuario";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id'      => $pedidoId,
            ':usuario' => $usuarioId
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}

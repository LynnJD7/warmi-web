<?php
namespace Controllers;

use Models\Evidencia;

class EvidenciasController {

    public function listar() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            echo json_encode([]);
            return;
        }

        $evidencia = new Evidencia();
        $data = $evidencia->listarPorUsuario($_SESSION['user_id']);

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function descargar() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            http_response_code(403);
            exit("Acceso no autorizado");
        }

        if (!isset($_GET['nombre_archivo'])) {
            http_response_code(400);
            exit("Archivo no especificado");
        }

        $evidencia = new Evidencia();
        $file = $evidencia->obtenerArchivo($_SESSION['user_id'], $_GET['nombre_archivo']);

        if (!$file) {
            http_response_code(404);
            exit("Archivo no encontrado");
        }

        $ext = pathinfo($file['nombre_archivo'], PATHINFO_EXTENSION);

        $mime = match (strtolower($ext)) {
            'jpg', 'jpeg' => 'image/jpeg',
            'png'         => 'image/png',
            'mp4'         => 'video/mp4',
            default       => 'application/octet-stream',
        };

        header("Content-Type: $mime");
        header("Content-Disposition: attachment; filename=\"{$file['nombre_archivo']}\"");
        header("Content-Length: " . strlen($file['archivo']));

        echo $file['archivo'];
    }
}

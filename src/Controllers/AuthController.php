<?php
namespace Controllers;

use Models\Usuario;

class AuthController
{
    public function login()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require PUBLIC_PATH . '/login.php';
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit;
        }

        $nombre    = clean($_POST['nombre'] ?? '');
        $apellidos = clean($_POST['apellidos'] ?? '');
        $correo    = clean($_POST['correo'] ?? '');

        if (!$nombre || !$apellidos || !$correo) {
            redirect('/warmi-web/public/index.php?route=login&error=missing_data');
        }

        $usuario = new Usuario();
        $user = $usuario->buscarUsuario($nombre, $apellidos, $correo);

        if (!$user) {
            redirect('/warmi-web/public/index.php?route=login&error=invalid_credentials');
        }

        $_SESSION['user_id']        = $user['id'];
        $_SESSION['user_nombre']    = $user['nombre'];
        $_SESSION['user_apellidos'] = $user['apellidos'];
        $_SESSION['user_correo']    = $user['correo'];

        redirect('/warmi-web/public/index.php?route=dashboard');
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_destroy();
        redirect('/warmi-web/public/');
    }
}

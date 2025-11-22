<?php
session_start();
require '../database/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

$nombre = $_POST['nombre'] ?? '';
$apellidos = $_POST['apellidos'] ?? '';
$correo = $_POST['correo'] ?? '';

if (empty($nombre) || empty($apellidos) || empty($correo)) {
    header("Location: ../../public/index.php?error=missing_data");
    exit;
}

// Verificar usuario
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE nombre = :nombre AND apellidos = :apellidos AND correo = :correo");
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':apellidos', $apellidos);
$stmt->bindParam(':correo', $correo);

$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {

    // -------------- FIX REAL -----------------
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_nombre'] = $user['nombre'];
    $_SESSION['user_apellidos'] = $user['apellidos'];
    $_SESSION['user_correo'] = $user['correo'];

    // -----------------------------------------

    header("Location: ../../public/dashboard.php");
    exit;

} else {
    header("Location: ../../public/index.php?error=invalid_credentials");
    exit;
}
?>

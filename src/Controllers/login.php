<?php
session_start();
require '../database/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

$id = $_POST['id'] ?? '';
$nombre = $_POST['nombre'] ?? '';

if (empty($id) || empty($nombre)) {
    header("Location: ../../public/login.php?error=missing_data");
    exit;
}

// Verificar usuario
$stmt = $conn->prepare("
    SELECT * FROM usuarios
    WHERE id = :id AND nombre = :nombre
");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':nombre', $nombre);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {

    // -------------- FIX REAL -----------------
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_nombre'] = $user['nombre'];
    // -----------------------------------------

    header("Location: ../../public/dashboard.php");
    exit;

} else {
    header("Location: ../../public/login.php?error=invalid_credentials");
    exit;
}
?>

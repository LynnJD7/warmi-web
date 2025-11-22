<?php
session_start();
require '../database/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

// Obtener datos globales
$id = $_POST['id'] ?? '';
$nombre = $_POST['nombre'] ?? '';

if (empty($id) || empty($nombre)) {
    // Redireccionar al login con un mensaje de error
    header("Location: ../../public/index.php?error=missing_data");
    exit;
}

// Consulta segura (PELIGRO: Falta verificación de contraseña)
$stmt = $conn->prepare( "SELECT * FROM usuarios 
WHERE id = :id AND nombre = :nombre");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':nombre', $nombre);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['nombre'] = $user['nombre'];
    header("Location: ../../public/dashboard.php");
    exit;
} else {
    header("Location: ../../public/index.php?error=invalid_credentials");
    exit;
}
?>
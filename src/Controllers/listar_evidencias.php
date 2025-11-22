<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit;
}


require __DIR__ . '/../database/conexion.php'; 
header('Content-Type: application/json');

// Si el usuario NO está logueado, devolver lista vacía
if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit;
}

try {
    // Obtener evidencias del usuario
    $stmt = $conn->prepare("SELECT id, nombre_archivo, tipo, fecha_captura, tamano_bytes
        FROM evidencias 
        WHERE user_id = :user_id
        ORDER BY id DESC

    ");
    $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();

    $evidencias = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($evidencias);

} catch (PDOException $e) {
    error_log("ERROR LISTAR EVIDENCIAS: " . $e->getMessage());
    echo json_encode(['error' => $e->getMessage()]);
}


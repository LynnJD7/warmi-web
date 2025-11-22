<?php
session_start();
require "conexion.php"; // Asegúrate de que la ruta sea correcta

header('Content-Type: application/json');

// Verifica que el usuario esté logueado
if(!isset($_SESSION['user_id'])){
    echo json_encode([]);
    exit;
}

try {
    $stmt = $conn->prepare(
        "SELECT id, tipo, nombre_archivo, fecha_captura 
        FROM evidencias WHERE user_id = :user_id 
        ORDER BY fecha_captura DESC");
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();
    $evidencias = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Agregar URL de descarga a cada evidencia
    foreach($evidencias as &$e){
        $e['url_descarga'] = "descargar_evidencia.php?id=".$e['id'];
    }

    echo json_encode($evidencias);

} catch(PDOException $e){
    echo json_encode(['error' => $e->getMessage()]);
}
?>

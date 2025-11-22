<?php
session_start();
require "../database/conexion.php";  // RUTA CORRECTA

// Verificar sesión
if (!isset($_SESSION['user_id'])) {
    die("Acceso no autorizado");
}

// Verificar ID recibido
if (!isset($_GET['nombre_archivo'])) {
    die("ID de evidencia no especificado");
}

$nombre_archivo = $_GET['nombre_archivo'];

// Preparar consulta
$stmt = $conn->prepare(" SELECT nombre_archivo, tipo, archivo 
    FROM evidencias 
    WHERE nombre_archivo = :nombre_archivo AND user_id = :user_id
");

$stmt->bindParam(':nombre_archivo', $nombre_archivo, PDO::PARAM_STR);
$stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();

$evidencia = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$evidencia) { 
    http_response_code(404);
    exit("Archivo no disponible");
}

// Descarga del archivo
header('Content-Description: File Transfer');
$ext = pathinfo($evidencia['nombre_archivo'], PATHINFO_EXTENSION);

$mime = match (strtolower($ext)) {
    'jpg', 'jpeg' => 'image/jpeg',
    'png'         => 'image/png',
    'mp4'         => 'video/mp4',
    default       => 'application/octet-stream',
};
header("Content-Type: $mime");
header('Content-Disposition: attachment; filename="' . $evidencia['nombre_archivo'] . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . strlen($evidencia['archivo']));

echo $evidencia['archivo'];
exit;
?>
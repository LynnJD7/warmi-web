<?php
session_start();
require "conexion.php";

if(!isset($_SESSION['user_id'])){
    die("Acceso no autorizado");
}

if(!isset($_GET['id'])){
    die("ID de evidencia no especificado");
}

$id = $_GET['id'];

// Obtener la evidencia del usuario actual
$stmt = $conn->prepare("SELECT nombre_archivo, tipo, archivo_blob FROM evidencias WHERE id = :id AND user_id = :user_id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();

$evidencia = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$evidencia){
    die("Evidencia no encontrada");
}

// Forzar descarga
header('Content-Description: File Transfer');
header('Content-Type: ' . $evidencia['tipo']);
header('Content-Disposition: attachment; filename="' . $evidencia['nombre_archivo'] . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . strlen($evidencia['archivo_blob']));

echo $evidencia['archivo_blob'];
exit;
?>

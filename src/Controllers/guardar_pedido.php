<?php
require "conexion.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT archivo, nombre_archivo, tipo FROM evidencias WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . $row['nombre_archivo']);
        echo $row['archivo'];
        exit;
    }
}
echo "Archivo no encontrado.";
?>

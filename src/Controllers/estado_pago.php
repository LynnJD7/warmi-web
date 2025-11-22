<?php
session_start();
require "conexion.php";

if(isset($_GET['pedido_id'])){
    $stmt = $conn->prepare("SELECT pagado FROM pedidos WHERE id = :id AND user_id = :user_id");
    $stmt->bindParam(":id", $_GET['pedido_id']);
    $stmt->bindParam(":user_id", $_SESSION['user_id']);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(["pagado" => $row['pagado']]);
    } else {
        echo json_encode(["pagado" => false]);
    }
} else {
    echo json_encode(["pagado" => false]);
}
?>

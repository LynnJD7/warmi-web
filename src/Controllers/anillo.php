<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Anillo WARMI360</title>
<link rel="stylesheet" href="../css/style.css">
<script src="../js/anillo.js"></script>
</head>
<body>
<header>
    <img src="../img/logo.png" alt="Logo" class="logo">
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="nosotros.php">Nosotros</a></li>
            <li><a href="evidencias.php">Evidencias</a></li>
            <li><a href="#" onclick="confirmarLogout()">Cerrar sesión</a></li>
        </ul>
    </nav>
</header>
<main>
    <h1>Dije Inteligente WARMI360</h1>
    <div class="producto">
        <img src="../img/anillo.jpg" alt="Dije Inteligente WARMI360">
        <h2>Dije Inteligente WARMI360</h2>
        <p>Protección, seguridad y estilo en un solo dije. Ideal para mujeres que buscan seguridad y bienestar.</p>
        <p>Precio unitario: S/ <span id="precioUnitario">40</span></p>
        <label>Cantidad:</label>
        <input type="number" id="cantidad" value="1" min="1" onchange="actualizarTotal()">
        <p>Total: S/ <span id="total">40</span></p>
        <button onclick="generarPago()">Generar QR de pago</button>
        <div id="qrPago"></div>
        <div id="estadoPago"></div>
    </div>

    <h2>Datos de entrega</h2>
    <form action="guardar_pedido.php" method="post">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <label>Nombre completo:</label>
        <input type="text" name="nombre_entrega" required>
        <label>Dirección:</label>
        <textarea name="direccion_entrega" required></textarea>
        <label>Teléfono:</label>
        <input type="text" name="telefono" required>
        <input type="hidden" name="cantidad" id="cantidadHidden" value="1">
        <input type="hidden" name="total" id="totalHidden" value="120">
        <button type="submit">Guardar Pedido</button>
    </form>
</main>
<footer>
    &copy; 2025 WARMI360
</footer>
<script>
document.getElementById('cantidad').addEventListener('input', function() {
    const cantidad = this.value;
    const precio = parseFloat(document.getElementById('precioUnitario').innerText);
    const total = cantidad * precio;
    document.getElementById('total').innerText = total.toFixed(2);
    document.getElementById('cantidadHidden').value = cantidad;
    document.getElementById('totalHidden').value = total.toFixed(2);
});
</script>
</body>
</html>
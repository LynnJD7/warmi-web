<?php
require_once __DIR__ . '/_init.php'; // Centraliza session_start()

if (empty($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evidencias - WARMI360</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> 
    
    <script src="https://kit.fontawesome.com/c476b3252a.js" crossorigin="anonymous"></script>

    <!-- Archivo JS que obtiene evidencias -->
    <script src="assets/js/evidencias.js" defer></script>
</head>
<body class="custom-bg-light">

<?php require_once __DIR__ . '/../src/Includes/header.php'; ?>

<main class="container my-5 custom-text-dark">
    <h1 class="display-5 fw-light mb-4 text-center">📂 Lista de Evidencias Guardadas</h1>
    <p class="lead text-center mb-5">
        Aquí puedes revisar y gestionar todos los archivos de evidencia recolectados.
    </p>

    <div class="table-responsive p-3 custom-bg-info rounded-3 shadow-lg">
        <table class="table table-hover table-sm align-middle">
            <thead class="custom-bg-purple text-white">
                <tr>
                    <th>Archivo</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Tamaño</th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody id="tbody-evidencias" class="bg-white">
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Cargando evidencias...
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<footer class="text-center py-3 custom-bg-light custom-text-dark mt-5 border-top">
    <p class="m-0">&copy; 2025 WARMI360. Todos los derechos reservados</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener("evidenciasCargadas", function(event) {
    console.log("📦 Evidencias recibidas desde el servidor:");
    console.log(event.detail);
});
</script>

</body>
</html>

<?php
session_start();

echo "<script>";
echo "console.log('SESSION DATA:', " . json_encode($_SESSION) . ");";
echo "</script>";

// Si 'user_id' no está en la sesión, redirige al login.
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); 
    exit;
}

$user_name = $_SESSION['user_nombre'] ?? 'Usuaria';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - WARMI360</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> 
    <script src="https://kit.fontawesome.com/c476b3252a.js" crossorigin="anonymous"></script>
</head>
<body class="custom-bg-light">

<?php 
// Asegúrate que esta ruta a tu header.php sea correcta
require '../src/includes/header.php'; 
?> 

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <h1 class="display-4 fw-bold custom-text-dark mb-4">
                <i class="fas fa-home me-2 custom-text-purple"></i> Dashboard de Bienvenida
            </h1>
            <p class="lead custom-text-dark mb-5">
                ¡Hola, <?php echo htmlspecialchars($user_name); ?>! Este es tu centro de control WARMI360.
            </p>

            <div class="row g-4">
                
                <div class="col-md-6 col-lg-6">
                    <div class="card h-100 p-3 custom-bg-info border-0 shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-camera fa-3x mb-3 custom-text-purple"></i>
                            <h5 class="card-title fw-bold custom-text-dark">Mis Evidencias</h5>
                            <p class="card-text text-muted">Revisa y gestiona el registro de tus archivos de seguridad.</p>
                            <a href="evidencias.php" class="btn custom-btn-purple mt-2 w-100">
                                <i class="fas fa-eye me-2"></i> Ver Archivos
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 p-3 custom-bg-info border-0 shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-ring fa-3x mb-3 custom-text-purple"></i>
                            <h5 class="card-title fw-bold custom-text-dark">Anillo de Seguridad</h5>
                            <p class="card-text text-muted">Configura o solicita la compra de tu dispositivo inteligente.</p>
                            <a href="anillo.php" class="btn btn-outline-secondary custom-btn-outline-purple mt-2 w-100">
                                Configurar Anillo
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
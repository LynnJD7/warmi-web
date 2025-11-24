<?php
require_once __DIR__ . '/_init.php';

use Controllers\AuthController;

// Base URL dinámica (soporta puerto 8080 y subcarpetas)
$baseUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://"
         . $_SERVER['HTTP_HOST']
         . dirname($_SERVER['SCRIPT_NAME']) . "/";

// -------- ROUTER SENCILLO --------
$path = $_GET['route'] ?? '';

switch ($path) {
    case 'login':
        (new AuthController())->login();
        exit;

    case 'logout':
        (new AuthController())->logout();
        exit;

    case 'dashboard':
        require __DIR__ . '/dashboard.php';
        exit;
}

// --------------------------------------------------------------------
// Cargar los datos del landing (solo si NO entramos al router)
// --------------------------------------------------------------------
$data = require SRC_PATH . '/Data/landing.php';

// Acceder a los datos
$hero       = $data['hero'] ?? [];
$equipo     = $data['equipo'] ?? [];
$pilares    = $data['pilares'] ?? [];
$articulos  = $data['articulos'] ?? [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WARMI360 - Plataforma de Empoderamiento</title>

    <link rel="stylesheet" href="<?= $baseUrl ?>assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c476b3252a.js" crossorigin="anonymous"></script>
</head>

<body class="custom-bg-light">

<?php require_once __DIR__ . '/../src/Includes/header.php'; ?>

<main>

<?php
$heroStyle = "
    background-image: url('{$baseUrl}assets/img/" . ($hero['imagen'] ?? 'header_inicio.png') . "');
    background-size: cover;
    background-position: center;
    min-height: 50vh;
";
?>
<section class="text-white py-5 position-relative" style="<?= $heroStyle ?>">
    <div class="position-absolute w-100 h-100 top-0 start-0"
         style="background-color: rgba(76, 53, 88, 0.6); z-index: 1;"></div>

    <div class="container text-center position-relative" style="z-index: 2;">
        <h1 class="display-3 fw-bold mb-4">
            <?= htmlspecialchars($hero['titulo'] ?? 'Bienvenidas a WARMI360') ?>
        </h1>
        <p class="fs-5 text-light mb-5">
            <?= htmlspecialchars($hero['subtitulo'] ?? '') ?>
        </p>
        <a href="#que-es" class="btn custom-btn-secondary btn-lg fw-bold shadow">
            Descubre cómo funciona
        </a>
    </div>
</section>

<!-- ================= QUE ES ================= -->
<section id="que-es" class="py-5 custom-bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0 text-center">
                <img src="<?= $baseUrl ?>assets/img/warmilogo.png"
                     alt="Logo WARMI 360"
                     class="img-fluid rounded-3 shadow"
                     style="max-width: 18rem;">
            </div>
            <div class="col-md-6">
                <h2 class="display-6 fw-bold custom-text-dark mb-4">¿Qué es WARMI 360?</h2>
                <p class="text-secondary mb-4">
                    WARMI360 es una plataforma tecnológica diseñada para proteger a las mujeres peruanas mediante tres componentes: un anillo inteligente, una aplicación móvil y una plataforma web.
                </p>
                <p>
                    Ofrecemos herramientas accesibles y empáticas para la conexión con redes de apoyo y la identificación de la violencia.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= PILARES ================= -->
<section class="container py-5">
    <h2 class="text-center mb-4 fw-bold custom-text-dark">Nuestros pilares</h2>
    <div class="row g-4">
        <?php foreach ($pilares as $pilar): ?>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 custom-bg-info p-3 text-center">
                <i class="fas <?= $pilar['icon'] ?? '' ?> fa-2x mb-3"></i>
                <h5 class="fw-bold"><?= htmlspecialchars($pilar['titulo'] ?? 'Sin título') ?></h5>
                <p class="text-muted"><?= $pilar['texto'] ?? '' ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ================= EQUIPO ================= -->
<section class="container py-5">
    <h2 class="text-center mb-4 fw-bold custom-text-dark">Nuestro equipo</h2>
    <div class="row g-2 justify-content-center">
        <?php foreach ($equipo as $miembro): ?>
        <div class="col-md-3 text-center">
            <div class="card border-0 shadow-sm p-5">
                <img src="<?= $baseUrl ?>assets/img/equipo/<?= htmlspecialchars($miembro['img'] ?? 'default.png') ?>"
                     class="rounded-circle mb-3" width="200"
                     alt="<?= htmlspecialchars($miembro['nombre'] ?? '') ?>">

                <h6 class="fw-bold"><?= htmlspecialchars($miembro['nombre'] ?? 'Sin nombre') ?></h6>
                <small class="text-muted"><?= htmlspecialchars($miembro['rol'] ?? 'Cargo no definido') ?></small>
                <p class="text-muted small"><?= htmlspecialchars($miembro['descripcion'] ?? '') ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ================= ARTÍCULOS ================= -->
<section class="container py-5">
    <h2 class="text-center mb-4 fw-bold custom-text-dark">Artículos recientes</h2>
    <div class="row g-4">
        <?php foreach ($articulos as $articulo): ?>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <img src="<?= $baseUrl ?>assets/img/<?= htmlspecialchars($articulo['img'] ?? 'default.png') ?>"
                     class="card-img-top"
                     alt="<?= htmlspecialchars($articulo['nombre'] ?? '') ?>">

                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($articulo['nombre'] ?? 'Sin título') ?></h5>
                    <p class="card-text text-muted"><?= htmlspecialchars($articulo['descripcion'] ?? '') ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

</main>

<?php require_once __DIR__ . '/../src/Includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

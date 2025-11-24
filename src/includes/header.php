<?php
// Se asume que session_start() ya fue llamado

$baseUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://"
         . $_SERVER['HTTP_HOST']
         . dirname($_SERVER['SCRIPT_NAME']) . "/";

$is_logged_in = isset($_SESSION['user_id']);
$user_name = $_SESSION['user_nombre'] ?? 'Usuario/a';

if (!$is_logged_in) {
    $session_text = 'Iniciar Sesión';
    $session_link = $baseUrl . 'index.php?route=login';
    $session_icon = 'fas fa-sign-in-alt';
}
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light custom-bg-light shadow-sm">
        <div class="container-fluid">

            <!-- logo correcto -->
            <a class="navbar-brand d-flex align-items-center" href="<?= $baseUrl ?>index.php">
                <img src="<?= $baseUrl ?>assets/img/warmilogo.png" alt="Logo WARMI360" style="height: 40px;" class="me-2">
                <span class="fw-bold custom-text-dark">WARMI360</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link custom-text-dark" href="<?= $baseUrl ?>index.php">Inicio</a>
                    </li>

                    <?php if ($is_logged_in): ?>
                        <!-- MENU PERFIL -->
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="btn custom-btn-purple dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle me-2"></i>
                                Mi Perfil
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">

                                <li>
                                    <h6 class="dropdown-header">
                                        Hola, <?= htmlspecialchars($user_name) ?>
                                    </h6>
                                </li>

                                <li><hr class="dropdown-divider"></li>

                                <li>
                                    <a class="dropdown-item" 
                                       href="<?= $baseUrl ?>index.php?route=dashboard">
                                        <i class="fas fa-chart-line me-2 custom-text-purple"></i>
                                        Dashboard
                                    </a>
                                </li>

                                <li><hr class="dropdown-divider"></li>

                                <li>
                                    <a class="dropdown-item text-danger" 
                                       href="<?= $baseUrl ?>index.php?route=logout">
                                        <i class="fas fa-sign-out-alt me-2"></i>
                                        Cerrar Sesión
                                    </a>
                                </li>

                            </ul>
                        </li>

                    <?php else: ?>

                        <!-- BOTÓN INICIAR SESIÓN -->
                        <li class="nav-item ms-lg-3">
                            <a class="btn custom-btn-purple" href="<?= $session_link ?>">
                                <i class="<?= $session_icon ?> me-2"></i> 
                                <?= $session_text ?>
                            </a>
                        </li>

                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </nav>
</header>

<?php
// src/includes/header.php

// NOTA: Asume que session_start(); fue llamado en el archivo de la vista que incluye este header.

// Determinar el estado del usuario: Usando 'id' como se acordó
$is_logged_in = isset($_SESSION['user_id']); 
$user_name = $_SESSION['user_nombre'] ?? 'Usuario/a'; // Para mostrar el nombre en el menú

// --- Lógica del Enlace Único (Usuario NO Logueado) ---
if (!$is_logged_in) {
    $session_text = 'Iniciar Sesión';
    $session_link = 'login.php'; 
    $session_icon = 'fas fa-sign-in-alt'; 
}
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light custom-bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/warmilogo.png" alt="Logo WARMI360" style="height: 40px;">
                <span class="fw-bold custom-text-dark">WARMI360</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link custom-text-dark" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link custom-text-dark" href="anillo.php">Anillo</a></li>
                    
                    <?php if ($is_logged_in): ?>
                        
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="btn custom-btn-purple dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle me-2"></i> Mi Perfil
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <h6 class="dropdown-header">Hola, <?php echo htmlspecialchars($user_name); ?></h6>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="dashboard.php">
                                    <i class="fas fa-chart-line me-2 custom-text-purple"></i> Dashboard
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="../src/Controllers/logout.php">
                                    <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
                                </a></li>
                            </ul>
                        </li>

                    <?php else: ?>
                        
                        <li class="nav-item ms-lg-3">
                            <a class="btn custom-btn-purple" href="<?php echo $session_link; ?>">
                                <i class="<?php echo $session_icon; ?> me-2"></i> <?php echo $session_text; ?>
                            </a>
                        </li>

                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
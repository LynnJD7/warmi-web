<?php

/**
 * Funciones utilitarias globales
 */

// -----------------------------------------------------------------------------------
// Redirección segura
// -----------------------------------------------------------------------------------
function redirect($url) {
    header("Location: $url");
    exit;
}

// -----------------------------------------------------------------------------------
// Sanitizar entrada del usuario
// -----------------------------------------------------------------------------------
function clean($value) {
    return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
}

// -----------------------------------------------------------------------------------
// Verificar si el usuario está autenticado
// -----------------------------------------------------------------------------------
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// -----------------------------------------------------------------------------------
// Requerir login antes de cargar una vista
// -----------------------------------------------------------------------------------
function requireLogin() {
    if (!isLoggedIn()) {
        redirect('/login');
    }
}

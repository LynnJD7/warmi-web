<?php
/**
 * INIT.PHP
 * Configuración base, helpers, sesión y router central
 */

// ------------------------------------------------------
// 1. Definir rutas base
// ------------------------------------------------------
define('BASE_PATH', realpath(dirname(__DIR__)));
define('SRC_PATH', BASE_PATH . '/src');
define('PUBLIC_PATH', BASE_PATH . '/public');

// ------------------------------------------------------
// 2. Cargar helpers esenciales
// ------------------------------------------------------
require_once SRC_PATH . '/Helpers/utils.php';
require_once SRC_PATH . '/Helpers/env_loader.php';

// ------------------------------------------------------
// 3. Autoloader PSR-4 simple
// ------------------------------------------------------
spl_autoload_register(function ($class) {
    $file = SRC_PATH . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// ------------------------------------------------------
// 4. Sesión global
// ------------------------------------------------------
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ------------------------------------------------------
// 5. Router limpio compatible con subcarpetas
// ------------------------------------------------------

// Elimina query string
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Detectar subcarpeta del proyecto (ej: /warmi-web)
$baseFolder = dirname($_SERVER['SCRIPT_NAME']);
if ($baseFolder !== '/') {
    $uri = str_replace($baseFolder, '', $uri);
}

// Normalizar
$uri = rtrim($uri, '/');
$uri = $uri === '' ? '/' : $uri;

// ------------------------------------------------------
// 6. Evitar procesar archivos físicos reales
// ------------------------------------------------------
$physicalFile = PUBLIC_PATH . $uri;
if (file_exists($physicalFile)) {
    return false; // permite que Apache sirva el archivo
}

// ------------------------------------------------------
// 7. Router principal
// ------------------------------------------------------
use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\AnilloController;


switch ($uri) {

    case '/':
        require PUBLIC_PATH . '/index.php';
        break;

    case '/login':
        (new AuthController())->login();
        break;

    case '/logout':
        (new AuthController())->logout();
        break;

    case '/dashboard':
        (new DashboardController())->index();
        break;

    default:
        http_response_code(404);
        echo "<h1>404 - Página no encontrada</h1>";
        break;
}

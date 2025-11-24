<?php

/**
 * Carga sencilla de variables del archivo .env
 */

function env($key, $default = null) {
    static $env_vars = null;

    if ($env_vars !== null) {
        return $env_vars[$key] ?? $default;
    }

    $env_vars = [];

    // Ruta correcta del .env
$envPath = realpath(__DIR__ . '/../../.env');

    if ($envPath === false || !file_exists($envPath)) {
        error_log("⚠ Archivo .env NO encontrado en: " . __DIR__ . '/../../.env');
        return $default;
    }

    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $line = trim($line);

        if ($line === '' || $line[0] === '#') {
            continue;
        }

        if (!str_contains($line, '=')) {
            continue;
        }

        [$envKey, $envValue] = explode('=', $line, 2);

        $env_vars[trim($envKey)] = trim($envValue);
    }

    return $env_vars[$key] ?? $default;
}

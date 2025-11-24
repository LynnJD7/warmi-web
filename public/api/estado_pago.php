<?php
require_once __DIR__ . '/../../src/Helpers/utils.php';
require_once __DIR__ . '/../../src/Helpers/env_loader.php';
require_once __DIR__ . '/../../src/Database/Conexion.php';
require_once __DIR__ . '/../../src/Models/Pedido.php';
require_once __DIR__ . '/../../src/Controllers/AnilloController.php';

$controller = new AnilloController();
$controller->estadoPago();

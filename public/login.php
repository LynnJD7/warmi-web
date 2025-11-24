<?php
require_once __DIR__ . '/_init.php';

$baseUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://"
         . $_SERVER['HTTP_HOST']
         . dirname($_SERVER['SCRIPT_NAME']) . "/";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - WARMI360</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c476b3252a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= $baseUrl ?>assets/css/style.css">
</head>

<body class="custom-bg-light d-flex justify-content-center align-items-center" style="min-height: 100vh;">

<main class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-5">
            <div class="card p-4 shadow-lg border-0 custom-bg-info">
                <div class="card-body">

                    <h1 class="text-center mb-4">
                        <i class="fas fa-lock me-2 custom-text-purple"></i>
                        Iniciar Sesión WARMI360
                    </h1>

                    <!-- ✅ RUTA CORRECTA PARA TU CONTROLADOR -->
                    <form action="<?= $baseUrl ?>index.php?route=login" method="post">


                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" name="correo" class="form-control" required>
                        </div>

                        <button type="submit" class="btn custom-btn-purple w-100">
                            Ingresar
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>

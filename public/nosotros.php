<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros - WARMI360</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <script src="https://kit.fontawesome.com/c476b3252a.js" crossorigin="anonymous"></script>

    <script src="js/main.js" defer></script>
</head>

<body class="custom-bg-light">

    <?php require '../src/includes/header.php'; ?>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <section class="p-5 custom-bg-info rounded-3 shadow-lg custom-text-dark">
                    <h1 class="display-4 fw-bold custom-text-purple mb-4 text-center">
                        <i class="fas fa-heart me-2"></i> Sobre WARMI360
                    </h1>

                    <p class="lead">
                        <span class="fw-bold">WARMI360</span> es más que una plataforma; es un **ecosistema digital**
                        diseñado con el propósito fundamental de mejorar la **seguridad, bienestar y apoyo** para todas
                        las mujeres.
                    </p>

                    <hr class="my-4">

                    <h2 class="h4 fw-bold">Nuestra Misión</h2>
                    <p>
                        Integrar herramientas tecnológicas avanzadas y el apoyo comunitario para crear un escudo de
                        protección. Buscamos empoderar a las mujeres proporcionándoles recursos discretos y efectivos
                        para la gestión de su seguridad personal.
                    </p>

                    <h2 class="h4 fw-bold mt-4">Nuestra Tecnología Integrada</h2>
                    <p>
                        La fortaleza de WARMI360 reside en la sinergia de sus componentes:
                    </p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item custom-bg-info custom-text-dark">
                            <i class="fas fa-mobile-alt me-2 custom-text-purple"></i> **App Móvil:** Para alertas
                            rápidas y geolocalización.
                        </li>
                        <li class="list-group-item custom-bg-info custom-text-dark">
                            <i class="fas fa-desktop me-2 custom-text-purple"></i> **Plataforma Web:** Para gestión de
                            cuentas, visualización de evidencias y acceso a recursos.
                        </li>
                        <li class="list-group-item custom-bg-info custom-text-dark">
                            <i class="fas fa-ring me-2 custom-text-purple"></i> **Anillo Inteligente:** Un dispositivo
                            discreto que activa alertas de emergencia silenciosamente.
                        </li>
                    </ul>

                    <p class="mt-4 text-center fst-italic">
                        "Conecta tu app móvil, plataforma web y nuestro dije inteligente para fomentar solidaridad
                        femenina."
                    </p>
                </section>
            </div>
        </div>
    </main>

    <footer class="text-center py-3 custom-bg-light custom-text-dark mt-5 border-top">
        <p class="m-0">&copy; 2025 WARMI360 - Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
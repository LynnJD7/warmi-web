<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evidencias - WARMI360</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css"> 
    
    <script src="https://kit.fontawesome.com/c476b3252a.js" crossorigin="anonymous"></script>

    <script src="js/evidencias.js" defer></script>
</head>
<body class="custom-bg-light">

<?php require '../src/includes/header.php'; ?>

<main class="container my-5 custom-text-dark">
    <h1 class="display-5 fw-light mb-4 text-center">📂 Lista de Evidencias Guardadas</h1>
    <p class="lead text-center mb-5">Aquí puedes revisar y gestionar todos los archivos de evidencia recolectados.</p>

    <div class="table-responsive p-3 custom-bg-info rounded-3 shadow-lg">
        
        <table class="table table-hover table-sm align-middle">
            
            <thead class="custom-bg-purple text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Archivo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col" class="text-center">Acción</th>
                </tr>
            </thead>
            
            <tbody id="tbody-evidencias" class="bg-white">
                <tr><td colspan="5" class="text-center text-muted">Cargando evidencias...</td></tr>
            </tbody>
        </table>
    </div>

    <div class="text-center mt-5">
        <button class="btn custom-btn-purple btn-lg" disabled>
            <i class="fas fa-download me-2"></i> Descargar las ultimas 5 evidencias (Próximamente)
        </button>
    </div>
</main>

<footer class="text-center py-3 custom-bg-light custom-text-dark mt-5 border-top">
    <p class="m-0">&copy; 2025 WARMI360. Todos los derechos reservados</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
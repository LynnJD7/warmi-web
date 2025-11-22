<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WARMI360</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    
    <script src="https://kit.fontawesome.com/c476b3252a.js" crossorigin="anonymous"></script>
</head>
<body class="custom-bg-light d-flex justify-content-center align-items-center" style="min-height: 100vh;">

<main class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-5">
            <div class="card p-4 shadow-lg border-0 custom-bg-info">
                <div class="card-body">
                    
                    <h1 class="card-title text-center mb-4 custom-text-dark fw-bold">
                        <i class="fas fa-lock me-2 custom-text-purple"></i> Iniciar Sesión WARMI360
                    </h1>
                    
                    <form action="../src/Controllers/login.php" method="post">
                        
                        <div class="mb-3">
                            <label for="id" class="form-label custom-text-dark fw-medium">Nombre</label>
                            <div class="input-group">
                                <span class="input-group-text custom-bg-light custom-text-dark border-end-0"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu Nombre" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="nombre" class="form-label custom-text-dark fw-medium">Apellidos</label>
                            <div class="input-group">
                                <span class="input-group-text custom-bg-light custom-text-dark border-end-0"><i class="fas fa-id-card"></i></span>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingresa tus Apellidos" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="id" class="form-label custom-text-dark fw-medium">Correo</label>
                            <div class="input-group">
                                <span class="input-group-text custom-bg-light custom-text-dark border-end-0"><i class="fas fa-user"></i></span>
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo" required>
                            </div>
                        </div>

                        <button type="submit" class="btn custom-btn-purple w-100 btn-lg">
                            Ingresar
                        </button>
                    </form>

                    <p class="text-center mt-3">
                        <small class="text-muted">¿Necesitas ayuda? Contáctanos.</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
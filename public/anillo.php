<?php
session_start();

echo "<script>";
echo "console.log('SESSION DATA:', " . json_encode($_SESSION) . ");";
echo "</script>";

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anillo Inteligente - WARMI360</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <script src="https://kit.fontawesome.com/c476b3252a.js" crossorigin="anonymous"></script>

    <script src="js/anillo.js" defer></script>
    <script src="js/main.js" defer></script>
</head>

<body class="custom-bg-light">
    <?php require '../src/includes/header.php'; ?>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-4">
                <h1 class="display-5 fw-light custom-text-dark">💜 Compra tu Anillo Inteligente</h1>
                <p class="lead text-muted">Asegura tu bienestar con la tecnología de WARMI360.</p>
            </div>

            <div class="col-md-8 col-lg-6 mb-4">
                <div class="card custom-bg-info border-0 shadow-lg">
                    <div class="row g-0">
                        <div class="col-md-5 text-center p-3 d-flex align-items-center justify-content-center">
                            <img src="img/anillo.png" class="img-fluid rounded-start" alt="Anillo WARMI360"
                                style="max-height: 200px; width: auto;">

                        </div>

                        <div class="col-md-7 p-3">
                            <div class="card-body">
                                <h5 class="card-title custom-text-dark fw-bold fs-4">Anillo WARMI360 - Edición Segura
                                </h5>
                                <p class="card-text fs-5 custom-text-purple mb-4">Precio unitario: S/. 40.00</p>

                                <div class="d-flex align-items-center mb-4">
                                    <label for="cantidad"
                                        class="form-label me-3 mb-0 custom-text-dark fw-medium">Cantidad:</label>
                                    <div class="input-group" style="width: 150px;">
                                        <button class="btn custom-btn-purple" type="button" onclick="disminuir()">
                                            <i class="fas fa-minus text-white"></i>
                                        </button>
                                        <input type="number" class="form-control text-center bg-white" id="cantidad"
                                            value="1" readonly>
                                        <button class="btn custom-btn-purple" type="button" onclick="aumentar()">
                                            <i class="fas fa-plus text-white"></i>
                                        </button>
                                    </div>
                                </div>

                                <p class="mt-3 fs-5 custom-text-dark">Total a pagar: <span id="total"
                                        class="fw-bold custom-text-purple">S/. 40.00</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-lg-6">
                <div class="p-4 custom-bg-info rounded-3 shadow-lg">
                    <h3 class="custom-text-dark mb-4 border-bottom pb-2">Datos de Entrega y Pago</h3>

                    <form id="form-pago">
                        <div class="mb-3">
                            <label for="nombre" class="form-label custom-text-dark">Nombre Completo:</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Tu nombre" required>
                        </div>

                        <div class="mb-3">
                            <label for="direccion" class="form-label custom-text-dark">Dirección de Entrega:</label>
                            <input type="text" class="form-control" id="direccion" placeholder="Dirección de entrega"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="metodo-pago" class="form-label custom-text-dark">Método de Pago:</label>
                            <select class="form-select" id="metodo-pago" required>
                                <option selected disabled value="">Selecciona un método</option>
                                <option value="yape">Yape</option>
                                <option value="plin">Plin</option>
                                <option value="tarjeta">Tarjeta de Crédito/Débito</option>
                            </select>
                        </div>

                        <button type="submit" class="btn custom-btn-purple btn-lg w-100 mt-3"
                            onclick="generarQR(event)">
                            <i class="fas fa-qrcode me-2"></i> Confirmar y Generar Pago
                        </button>
                    </form>

                    <div class="mt-4 text-center">
                        <p class="custom-text-dark fw-bold">Detalle de Pago:</p>
                        <pre id="qr" class="custom-bg-light border p-3 rounded-3 custom-text-dark text-start"
                            style="min-height: 50px;">Aquí aparecerá el QR o el link de pago.</pre>
                    </div>
                </div>
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
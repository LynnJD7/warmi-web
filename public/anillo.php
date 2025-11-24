<?php
require_once __DIR__ . '/_init.php';

$user_id = $_SESSION['user_id'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar Anillo - WARMI360</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> 
    
    <script src="https://kit.fontawesome.com/c476b3252a.js" crossorigin="anonymous"></script>
    
    <script src="assets/js/anillo.js" defer></script>
</head>

<body class="custom-bg-light">

<?php require_once __DIR__ . '/../src/Includes/header.php'; ?>

<main class="container my-5">

    <h1 class="text-center fw-light custom-text-dark">💜 Compra tu Anillo Inteligente</h1>

    <div class="row justify-content-center mt-4">

        <!-- PRODUCTO -->
        <div class="col-md-6">
            <div class="card custom-bg-info border-0 shadow-lg">
                <div class="row g-0">
                    <div class="col-5 p-3 d-flex align-items-center justify-content-center">
                        <img src="assets/img/anillo.png" class="img-fluid" alt="Anillo WARMI360">
                    </div>

                    <div class="col-7 p-3">
                        <h5 class="fw-bold custom-text-dark">Anillo WARMI360</h5>
                        <p class="fs-5 custom-text-purple">Precio unitario: S/. 40.00</p>

                        <div class="d-flex align-items-center mb-3">
                            <label class="form-label me-3">Cantidad:</label>

                            <div class="input-group" style="width: 150px;">
                                <button class="btn custom-btn-purple" type="button" data-action="minus">
                                    <i class="fas fa-minus text-white"></i>
                                </button>

                                <input type="number" id="cantidad" class="form-control text-center" value="1" readonly>

                                <button class="btn custom-btn-purple" type="button" data-action="plus">
                                    <i class="fas fa-plus text-white"></i>
                                </button>
                            </div>
                        </div>

                        <p class="fs-5">Total: 
                            <span id="total" class="fw-bold custom-text-purple">S/. 40.00</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FORMULARIO DE ENTREGA -->
        <div class="col-md-6">
            <div class="p-4 custom-bg-info rounded shadow-lg">

                <h4 class="custom-text-dark border-bottom pb-2">Datos de Entrega</h4>

                <form id="form-pago">

                    <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">

                    <div class="mb-3">
                        <label class="form-label">Nombre completo:</label>
                        <input type="text" id="nombre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dirección:</label>
                        <input type="text" id="direccion" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Método de pago:</label>
                        <select id="metodo-pago" class="form-select" required>
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="yape">Yape</option>
                            <option value="plin">Plin</option>
                            <option value="tarjeta">Tarjeta</option>
                        </select>
                    </div>

                    <button class="btn custom-btn-purple w-100" id="btnPagar">
                        <i class="fas fa-qrcode me-2"></i> Generar Pago
                    </button>

                </form>

                <div class="mt-4">
                    <p class="fw-bold">Detalle:</p>
                    <pre id="qr" class="p-3 border rounded custom-bg-light"></pre>
                </div>

            </div>
        </div>
    </div>

</main>

<?php require '../src/Includes/footer.php'; ?>

</body>
</html>

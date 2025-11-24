<?php
// src/includes/footer.php
?>

<footer class="custom-bg-light text-center text-lg-start mt-5 border-top">
    <div class="container p-4">

        <div class="row">

            <div class="col-lg-6 col-md-12 mb-4 mb-md-0 text-start">
                <h5 class="fw-bold custom-text-dark">WARMI360</h5>
                <p class="text-muted">
                    Plataforma dedicada al empoderamiento y visibilidad de mujeres emprendedoras.
                </p>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h6 class="fw-bold">Enlaces</h6>
                <ul class="list-unstyled mb-0">
                    <li><a href="<?= $baseUrl ?>/index.php" class="text-muted text-decoration-none">Inicio</a></li>
                    <li><a href="<?= $baseUrl ?>/login.php" class="text-muted text-decoration-none">Iniciar Sesión</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="text-center p-3 bg-white border-top">
        <small class="text-muted">
            © <?= date('Y'); ?> WARMI360 - Todos los derechos reservados.
        </small>
    </div>
</footer>

</body>
</html>

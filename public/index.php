<?php
session_start();
// NOTA: Asume que $base_url está definido en algún archivo incluido antes de este punto
// o que las rutas relativas son correctas (e.g., /images/warmilogo.png)

// Definiciones de datos para las secciones dinámicas (Equipo, Pilares, Artículos, Planes)
$equipo = [
    [
        "nombre" => "Alejandro",
        "rol" => "Líder de Proyecto, Co-creador App Móvil",
        "descripcion" => "Líder de proyecto y Co-creador de la app móvil WARMI360.",
        "img" => "https://media.licdn.com/dms/image/v2/D5635AQH7hC-a7TeA1Q/profile-framedphoto-shrink_400_400/B56ZpLcNaSJsAk-/0/1762202277846?e=1764090000&v=beta&t=YhStLWbJ6v_S1MutYmqls0wBWJ2_PWwv48oOvkWzlgM"
    ],
    [
        "nombre" => "Lynn",
        "rol" => "Desarrolladora Desktop",
        "descripcion" => "Desarrolladora de la plataforma de escritorio.",
        "img" => "https://media.licdn.com/dms/image/v2/D4E35AQG1cVEX3g99hQ/profile-framedphoto-shrink_400_400/B4EZki9jtSGUAc-/0/1757228186690?e=1764090000&v=beta&t=wIlcGavCR_aCgpcSjBprnohDOOSt9Cd3ArljwyV467Y"
    ],
    [
        "nombre" => "Alyssa",
        "rol" => "Co-creadora App Móvil",
        "descripcion" => "Co-creadora de la app móvil WARMI360.",
        "img" => "https://media.licdn.com/dms/image/v2/D4D35AQEqvHNBtE_baQ/profile-framedphoto-shrink_400_400/B4DZeE.B_jHkAc-/0/1750282543407?e=1764090000&v=beta&t=d3XQgoW3kTBOFPWi1t18G6PSD0yxRjm97uYA7ieF_IE"
    ]
];

$pilares = [
    ["icon" => "fa-map-marked-alt", "titulo" => "Nuestra Misión", "texto" => "Integrar herramientas tecnológicas avanzadas y el apoyo comunitario para crear un escudo de protección. Buscamos empoderar a las mujeres proporcionándoles recursos discretos y efectivos para la gestión de su seguridad personal."],
    ["icon" => "fa-book-open", "titulo" => "Nuestra Visión", "texto" => "WARMI360 proyecta convertirse en un ecosistema digital confiable, accesible y seguro, capaz de acompañar a millones de mujeres mediante un anillo inteligente, una aplicación móvil y una plataforma web que promuevan sororidad y resiliencia."],
    ["icon" => "fa-book-open", "titulo" => "Nuestra Tecnología Integrada", "texto" => "La fortaleza de WARMI360 reside en la sinergia de sus componentes:<br>
    • App Móvil: Para alertas rápidas y geolocalización.<br>
    • Plataforma Web: Para gestión de cuentas, visualización de evidencias y acceso a recursos.<br>
    • Anillo Inteligente: Un dispositivo discreto que activa alertas de emergencia."]




];
$articulos = [
    [
        "nombre" => "Anillo Inteligente",
        "precio" => "S/ 40.00",
        "img_url" => "anillo.png",
        "descripcion" => "Dispositivo de seguridad que envía alertas discretas a tu red de apoyo con solo un toque.",
        "local_img" => "anillo.png"
    ]
];

$base_url = '.'; // Punto de partida para rutas relativas.

// Definición de variables de estilo customizado para el Hero, si es necesario
// NOTA: Estas variables están en línea para asegurar el fondo, pero deberían definirse en css/style.css
$hero_style = "
    background-image: url('img/header_inicio.png'); 
    background-size: cover; 
    background-position: center;
    min-height: 50vh; 
    display: flex; 
    align-items: center; 
    justify-content: center;
";
$overlay_style = "background-color: rgba(76, 53, 88, 0.6); z-index: 1;";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WARMI360 - Inicio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    
    <script src="https://kit.fontawesome.com/c476b3252a.js" crossorigin="anonymous"></script>

    <script src="js/anillo.js" defer></script>
</head>

<body>
    <?php require '../src/includes/header.php';?>
    
    <main class="mt-5 pt-3"> 
        
        <section class="text-white py-5 position-relative" style="<?= $hero_style ?>">
            <div class="position-absolute w-100 h-100 top-0 start-0" style="<?= $overlay_style ?>"></div>
            <div class="container text-center position-relative" style="z-index: 2;">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="display-3 fw-bold mb-4">Rompamos el silencio, construyamos libertad</h1>
                        <p class="fs-5 text-light mb-5">WARMI 360 es una multiplataforma creada por y para mujeres peruanas. Ayuda y proteje.</p>
                        <a href="#que-es" class="btn custom-btn-secondary btn-lg fw-bold shadow">Descubre cómo funciona</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="que-es" class="py-5 custom-bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 mb-4 mb-md-0 text-center">
                        <img src="<?= $base_url ?>/img/warmilogo.png" alt="Logo WARMI 360" class="img-fluid rounded-3 shadow" style="max-width: 18rem;">
                    </div>
                    <div class="col-md-6">
                        <h2 class="display-6 fw-bold custom-text-dark mb-4">¿Qué es WARMI 360?</h2>
                        <p class="text-secondary mb-4 text-justify">
                            WARMI360 es una plataforma tecnológica diseñada para proteger a las mujeres peruanas mediante tres componentes: un anillo inteligente, una aplicación móvil y una plataforma web.
                            El sistema permite activar alertas de emergencia, compartir la ubicación con contactos de confianza e identificar la violencia.
                        </p>
                        <p>
                            A través de un ecosistema que integra tecnología y sororidad, ofrecemos herramientas accesibles y empáticas para la conexión con redes de apoyo y la identificacion de la violencia.
                        </p>
                    </div>
                </div>
            </div>
        </section>


        <section id="pilares" class="py-5 bg-white">
            <div class="container text-center">
                <h2 class="display-6 fw-bold custom-text-dark mb-5">Nuestros Pilares de Protección</h2>
                <div class="row g-4">
                    <?php foreach ($pilares as $p): ?>
                        <div class="col-sm-6 col-lg-3">
                            <div class="p-4 rounded-3 shadow h-100 border border-1 custom-border-purple">
                                <i class="fas <?= htmlspecialchars($p['icon']) ?> fa-3x custom-text-purple mb-4"></i>
                                <h3 class="h5 fw-bold custom-text-dark mb-2"><?= htmlspecialchars($p['titulo']) ?></h3>
                                <div class="text-secondary small"><?= $p['texto'] ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>


        <section id="equipo" class="py-5 custom-bg-light">
            <div class="container text-center">
                <h2 class="display-6 fw-bold custom-text-dark mb-5">Conoce al Equipo Detrás de WARMI 360</h2>
                <div class="row g-4 justify-content-center">
                    <?php foreach ($equipo as $m): ?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 text-center shadow-sm">
                                <div class="card-body p-4">
                                    <img src="<?= htmlspecialchars($m['img']) ?>" alt="<?= htmlspecialchars($m['nombre']) ?>" class="rounded-circle mb-3 object-fit-cover shadow" style="width: 96px; height: 96px;">
                                    <h4 class="h5 fw-bold custom-text-dark"><?= htmlspecialchars($m['nombre']) ?></h4>
                                    <p class="text-secondary small mb-2"><?= htmlspecialchars($m['rol']) ?></p>
                                    <p class="text-secondary small fst-italic"><?= htmlspecialchars($m['descripcion']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        

        <section id="tienda" class="py-5 bg-white">
            <div class="container text-center">
                <h2 class="display-6 fw-bold custom-text-dark mb-3">El Anillo Inteligente WARMI</h2>
                <p class="lead text-secondary mb-5">Seguridad discreta y estilo en tu mano.</p>
        
                <div class="row g-4 justify-content-center">
                    <?php foreach ($articulos as $a):
                        $fallback = $base_url . '/img/' . $a['local_img'];
                    ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 shadow-lg overflow-hidden border-0">
                                <img
                                    src="<?= htmlspecialchars($a['img_url']) ?>"
                                    alt="<?= htmlspecialchars($a['nombre']) ?>"
                                    class="card-img-top object-fit-cover"
                                    style="height: 500px;"
                                    onerror="this.onerror=null;this.src='<?= htmlspecialchars($fallback) ?>';"
                                >
                                
                                <div class="card-body p-4">
                                    <h3 class="h5 fw-bold custom-text-dark mb-2"><?= htmlspecialchars($a['nombre']) ?></h3>
                                    <p class="text-secondary small mb-3"><?= htmlspecialchars($a['descripcion']) ?></p>
                                    <p class="fs-4 fw-bold custom-text-purple mb-4"><?= htmlspecialchars($a['precio']) ?></p>
                                    <a href="anillo.php" class="btn custom-btn-purple mt-2 btn-lg">¡Quiero mi Anillo!</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
    
    <footer class="text-center py-3 custom-bg-light custom-text-dark border-top border-secondary border-opacity-25">
        <p class="m-0">&copy; 2025 WARMI360. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>
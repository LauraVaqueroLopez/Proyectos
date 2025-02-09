<?php
session_start();
require_once '../controlador/ControlProducto.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: loginhtml.php");
    exit();
}

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laura's Photography Studio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex flex-column min-vh-100">

<header class="bg-dark text-white text-center py-4">
    <section>
        <h1>Laura's Photography Studio</h1>
        <p>Tu socio de confianza en soluciones fotográficas</p>
    </section>
</header>

<nav class="bg-success navbar navbar-expand-lg navbar-dark">
    <div class="container">

        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="menu.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="quienesomos.php">Quiénes Somos</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Servicios</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="Servicios.php"><strong>Todos</strong></a></li>
                        <li><a class="dropdown-item" href="https://www.google.com/?hl=es">Bodas y Eventos</a></li>
                        <li><a class="dropdown-item" href="https://www.google.com/?hl=es">Sesión Personalizada</a></li>
                        <li><a class="dropdown-item" href="https://www.google.com/?hl=es">Sesiones artísticas</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"> <a class="nav-link" href=""> Usuario: <?php print $_SESSION["usuario"]?></a></li>
                <li class="nav-item"> <a class="nav-link" href="../controlador/ControlCerrarSesion.php">Cerrar sesión</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="Carritohtml.php">
                        <img src="https://static.vecteezy.com/system/resources/previews/016/314/413/non_2x/shopping-cart-free-png.png" alt="Carrito">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container my-4">
    <div class="row">
        <aside class="col-md-3 aside-map">
            <h3>Mapa del Sitio</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href="menu.php">Inicio</a></li>
                <li class="list-group-item"><a href="quienesomos.php">Quiénes Somos</a></li>
                <li class="list-group-item">
                    <a href="Servicios.php">Servicios</a>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="https://www.google.com/?hl=es">Bodas y Eventos</a></li>
                        <li class="list-group-item"><a href="https://www.google.com/?hl=es">Sesión Personalizada</a></li>
                        <li class="list-group-item"><a href="https://www.google.com/?hl=es">Sesiones artísticas</a></li>
                    </ul>
                </li>
                <li class="list-group-item"><a href="contacto.php">Contacto</a></li>
            </ul>
        </aside>

        <section class="col-md-5 principal-container-inicio">
            <h3>Bienvenidos a Nuestra Empresa</h3>
            <p>
                Ofrecemos una amplia gama de servicios para capturar tus momentos más importantes.
                Explora nuestras opciones y descubre cómo podemos ayudarte a inmortalizar tus recuerdos.
            </p>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Opciones</th>
                    <th>Precio</th>
                    <th>Sesión</th>
                    <th>Precio/hora</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Bodas y Eventos</td>
                    <td>500€</td>
                    <td>4 horas</td>
                    <td>150€/h</td>
                </tr>
                <tr>
                    <td>Sesión Personalizada</td>
                    <td>190€</td>
                    <td>1.5 horas</td>
                    <td>100€/h</td>
                </tr>
                <tr>
                    <td>Sesiones artísticas</td>
                    <td>300€</td>
                    <td>2 horas</td>
                    <td>150€/h</td>
                </tr>
                </tbody>
            </table>
        </section>

        <aside class="col-md-3 carousel-container">
            <h3>Imágenes destacadas</h3>
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./img/Atardecerr.jpeg" class="d-block imagen-carrusel" alt="Atardecer en Asturias">
                        <div class="carousel-caption d-none d-md-block">
                            <figcaption>Asturias</figcaption>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./img/chinchon.jpeg" class="d-block imagen-carrusel" alt="Vista de Chinchón">
                        <div class="carousel-caption d-none d-md-block">
                            <figcaption>Chinchón</figcaption>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./img/Alemania.jpeg" class="d-block imagen-carrusel" alt="Paisaje de Alemania">
                        <div class="carousel-caption d-none d-md-block">
                            <figcaption>Alemania</figcaption>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./img/lastres.jpeg" class="d-block imagen-carrusel" alt="Vista de Lastres">
                        <div class="carousel-caption d-none d-md-block">
                            <figcaption>Lastres</figcaption>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./img/bruselas.jpeg" class="d-block imagen-carrusel" alt="Paisaje de Bruselas">
                        <div class="carousel-caption d-none d-md-block">
                            <figcaption>Bruselas</figcaption>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </aside>
    </div>
</main>

<footer class="bg-dark text-white text-center py-2 mt-auto">
    <p>2024 Laura's Photography Studio.</p>
    <nav>
        <a href="menu.php" class="enlace-footer mx-2">Inicio</a>
        <a href="quienesomos.php" class="enlace-footer mx-2">Quiénes Somos</a>
        <a href="Servicios.php" class="enlace-footer mx-2">Servicios</a>
        <a href="contacto.php" class="enlace-footer mx-2">Contacto</a>

        <div class="d-flex redes-sociales">
            <a href="https://www.instagram.com" target="_blank">
                <img src="https://1000marcas.net/wp-content/uploads/2019/11/Instagram-Logosu.png" alt="Logo de Instagram" class="instagram">
            </a>
            <a href="https://www.facebook.com" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Logo de Facebook " class="facebook">
            </a>
            <a href="https://www.x.com" target="_blank" class="mx-3">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/027/395/710/small/twitter-brand-new-logo-3-d-with-new-x-shaped-graphic-of-the-world-s-most-popular-social-media-free-png.png" alt="Logo de Facebook " class="media-x">
            </a>
        </div>
    </nav>
</footer>

<!-- Cambiar este script que controla el carrusel por uno creado a mano -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- Crear modelo entidad-relación, crear base de datos. Formulario para enviar peticiones de
 sesiones,  validaciones en formulario, crear código php. Modelo vista controlador.
 En contacto, realizar un formulario con opciones hecho con javascript-
 En Servicios crear las 3 paginas web.
 Añadir carrito de compra y añadir apartado de productos fotográficos.
 Averiguar como quitar los margenes laterales-->
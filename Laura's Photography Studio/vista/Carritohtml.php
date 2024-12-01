<?php
session_start();
require_once '../controlador/ControlProducto.php';
if (!isset($_SESSION['usuario'])) {
    header("Location:loginhtml.php");
    exit();
}
//crear variable carrito
$carrito = $_SESSION['carrito'];

$controlProducto = new ControlProducto();
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
        <a class="navbar-brand" href="menu.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
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

        <section class="col-md-5 principal-container-inicio">
            <h2>Tu Carrito de Compras</h2>
            <?php if (empty($carrito)) : ?>
                <p>No hay productos en tu carrito.</p>
            <?php else: ?>
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    /*
                     * se crea en la sesion una variable llamada carrito. Que se guarda como [ [id_producto], [cantidad] ]
                     * controles en menuhtml
                    */
                    foreach ($carrito as $id_producto => $cantidad) :
                        $producto = $controlProducto->obtenerProductoPorId($id_producto);
                        ?>
                        <tr>
                            <td><?php echo $id_producto; ?></td>
                            <td><?php echo $producto->getNombre(); ?></td>
                            <td><?php echo $cantidad; ?></td>
                            <td>
                                <form action="../controlador/ControlEliminarDelCarrito.php" method="POST"">
                                <input type="hidden" name="id" value="<?php echo $id_producto; ?>">
                                <button type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <form action="../controlador/ControlVaciarCarrito.php" method="post">
                    <button type="submit">Vaciar Carrito</button>
                </form>
            <?php endif; ?>

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
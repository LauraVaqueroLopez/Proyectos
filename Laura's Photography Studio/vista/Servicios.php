<?php
session_start();
require_once '../controlador/ControlProducto.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: loginhtml.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Servicios - Laura's Photography Studio</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex flex-column">

  <header class="bg-dark text-white text-center py-4">
    <h1>Laura's Photography Studio</h1>
    <p>Tu socio de confianza en soluciones fotográficas</p>

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
            <a href="Servicios.html">Servicios</a>
            <ul class="list-group">
              <li class="list-group-item"><a href="https://www.google.com/?hl=es">Bodas y Eventos</a></li>
              <li class="list-group-item"><a href="https://www.google.com/?hl=es">Sesión Personalizada</a></li>
              <li class="list-group-item"><a href="https://www.google.com/?hl=es">Sesiones artísticas</a></li>
            </ul>
          </li>
          <li class="list-group-item"><a href="contacto.php">Contacto</a></li>
        </ul>
      </aside>

      <section class="col-md-9 principal-container">
        <h3>Servicios</h3>
        <p>
          En **Laura's Photography Studio**, ofrecemos una amplia gama de servicios para capturar tus momentos más especiales. 
          Nuestro equipo profesional está listo para brindarte experiencias únicas y memorables.
        </p>
        
        <div class="row">
          <div class="col-md-4">
            <div class="card mb-3">
              <img src="img/bodas.jpg" class="card-img-top" alt="Bodas y Eventos">
              <div class="card-body">
                <h5 class="card-title">Bodas y Eventos</h5>
                <p class="card-text">Fotografía para bodas, aniversarios y eventos especiales.</p>
                <a href="https://www.google.com/?hl=es" class="btn btn-success">Saber más</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-3">
              <img src="img/personalizada.jpg" class="card-img-top" alt="Sesión Personalizada">
              <div class="card-body">
                <h5 class="card-title">Sesión Personalizada</h5>
                <p class="card-text">Sesiones individuales o familiares en interiores o exteriores.</p>
                <a href="https://www.google.com/?hl=es" class="btn btn-success">Saber más</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-3">
              <img src="img/artistica.jpg" class="card-img-top" alt="Sesiones Artísticas">
              <div class="card-body">
                <h5 class="card-title">Sesiones Artísticas</h5>
                <p class="card-text">Explora la creatividad con sesiones temáticas y artísticas.</p>
                <a href="https://www.google.com/?hl=es" class="btn btn-success">Saber más</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <footer class="bg-dark text-white text-center py-2 mt-auto">
    <p>2024 Laura's Photography Studio.</p>
    <nav>
      <a href="menu.php" class="enlace-footer mx-2">Inicio</a>
      <a href="quienesomos.php" class="enlace-footer mx-2">Quiénes Somos</a>
      <a href="Servicios.html" class="enlace-footer mx-2">Servicios</a>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
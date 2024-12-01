<?php
session_start();

if (isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

header("Location: ../vista/Carritohtml.php");
exit();
?>

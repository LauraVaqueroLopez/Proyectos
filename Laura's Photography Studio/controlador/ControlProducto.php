<?php
require_once '../modelo/ProductoDAO.php';

class ControlProducto
{
    public function listarProductos()
    {
        $productoDAO = new ProductoDAO();
        return $productoDAO->getAllProductos();
    }

    public function obtenerProductoPorId($id_producto) {
        $productoDAO = new ProductoDAO();
        return $productoDAO->carritoProductoPorId($id_producto);
    }
}




?>
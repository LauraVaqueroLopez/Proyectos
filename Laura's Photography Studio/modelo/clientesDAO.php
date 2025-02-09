<?php
require_once 'DB.php';
require_once 'DTOclientes.php';

class ClientesDAO {
    private $conn;

    public function __construct() {
        $this->conn = DB::getConnection();
    }

    // Metodo para registrar un cliente
    public function addCliente($nombre, $contraseña) {
        $stmt = $this->conn->prepare("INSERT INTO Cliente (nickname, password) VALUES (:nombre, :password)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':password', $contraseña);
        return $stmt->execute();
    }

    // Metodo para verificar si un cliente ya está registrado
    public function getClienteByNombre($nombre) {
        $stmt = $this->conn->prepare("SELECT * FROM Cliente WHERE nickname = :nombre");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getClienteByPassword($contraseña) {
        $stmt = $this->conn->prepare("SELECT * FROM Cliente WHERE password = :contraseña");
        $stmt->bindParam(':contraseña', $contraseña);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
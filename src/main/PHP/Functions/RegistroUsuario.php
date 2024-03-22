<?php
class RegistroUsuario {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function registrarUsuario($usuario) {
        try {
            $hashedPassword = password_hash($usuario->Contrasena, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare("INSERT INTO usuario (Nombre, Apellido, Direccion, Telefono, Correo, Contrasena) VALUES (:nombre, :apellido, :direccion, :telefono, :correo, :contrasena)");
            $stmt->bindParam(':nombre', $usuario->Nombre);
            $stmt->bindParam(':apellido', $usuario->Apellido);
            $stmt->bindParam(':direccion', $usuario->Direccion);
            $stmt->bindParam(':telefono', $usuario->Telefono);
            $stmt->bindParam(':correo', $usuario->Correo);
            $stmt->bindParam(':contrasena', $hashedPassword);
            $stmt->execute();

            header("Location: ../../Resources/View/login.php");
        } catch (PDOException $e) {
            echo "Error al registrar usuario: " . $e->getMessage();
        }
    }
}


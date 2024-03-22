<?php
class AutenticacionUsuario {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function autenticarUsuario($correo, $contrasena) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM usuario WHERE Correo = :correo");
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($usuario) {
                if (password_verify($contrasena, $usuario['Contrasena'])) {
                    header("Location: ../../Resources/View/index.html");
                    exit();
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error al autenticar usuario: " . $e->getMessage();
            return false;
        }
    }
}

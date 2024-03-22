<?php
require_once '../../PHP/Connections/Connection.php';
require_once '../../PHP/Models/Usuario.php';
require_once '../../PHP/Functions/RegistroUsuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $nuevoUsuario = new Usuario($nombre, $apellido, $direccion, $telefono, $correo, $contrasena);

    $connection = new Connection();
    $conn = $connection->getConnection();

    $registroUsuario = new RegistroUsuario($conn);
    $registroUsuario->registrarUsuario($nuevoUsuario);
}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registro de Usuario</title>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Registro de Usuario</h2>
        <form action="registrar_usuario.php" method="post" class="mt-4">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" maxlength="50" required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" maxlength="50" required>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" maxlength="50" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" pattern="[0-9]{9}" required>
        </div>

        <div class="mb-3">
            <label for="correos" class="form-label">Correo electrónico:</label>
            <input type="email" class="form-control" id="correos" name="correos" maxlength="50" required>
        </div>

        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena" maxlength="10" required>
        </div>
        
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</body>
</html>
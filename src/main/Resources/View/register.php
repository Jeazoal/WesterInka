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
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="register.php" method="post" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="nombre" class="form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" maxlength="50" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="apellido" class="form-label">Apellido:</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" maxlength="50" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="direccion" class="form-label">Dirección:</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" maxlength="50" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefono" class="form-label">Teléfono:</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" pattern="[0-9]{9}" required>
                                </div>
                                <div class="form-group">
                                    <label for="correo" class="form-label">Correo electrónico:</label>
                                    <input type="email" class="form-control" id="correo" name="correo" maxlength="50" required>
                                </div>
                                <div class="form-group">
                                <label for="contrasena" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" maxlength="50" required pattern="[A-Za-z0-9]+[-.]{1}[A-Za-z0-9]+" title="La contraseña debe contener solo letras y números con al menos un guion o punto como carácter obligatorio.">

                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Registrar</button>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
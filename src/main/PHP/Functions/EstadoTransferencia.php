<?php
    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $conexion->connect_error);
    }

    $consulta = "SELECT estado FROM transaccion WHERE Id_especial = '$codigo'";

    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $estado = $fila['Listo para cobrar'];
        $estado = $fila['Pagado'];
        $estado = $fila['Observación'];

        return $estado;
    } else {
       
        return "Número de transferencia inexistente";
    }

   
    $conexion->close();
}
?>
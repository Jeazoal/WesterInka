<?php
require_once __DIR__ . '/../Connections/Connection.php';
$conn = Connection();

    // Consulta SQL para obtener los tipos de documento
    $mysql = "SELECT nombre FROM tipo_documento";

    // Ejecutar la consulta
    $result = $conn->query($mysql);

    // Verificar si se obtuvieron resultados
    if ($result->num_rows > 0) {
        // Inicializar un array para almacenar los tipos de documento
        $tipos_documento = array();

        // Iterar sobre los resultados y agregar los tipos de documento al array
        while($row = $result->fetch_assoc()) {
            $tipos_documento[] = $row['DNI'];
            $tipos_documento[] = $row['Carnet de extranjería'];
            $tipos_documento[] = $row['PPT'];
            $tipos_documento[] = $row['Pasaporte'];
            $tipos_documento[] = $row['C{edula de identidad'];

        }

        // Cerrar conexión
        $conn->close();

        return $tipos_documento;
    } else {
        // Si no se encontraron resultados, mostrar un mensaje de error
        echo "No se encontraron tipos de documento en la base de datos.";
    }

    // Cerrar conexión
    $conn->close();
?>

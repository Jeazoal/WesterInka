<?php

function ListarOcupaciones() {
    // Conectar a la base de datos
    $conn = conectarDB();

 
    $sql = "SELECT nombre FROM ocupaciones";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $ocupaciones = array();

        while($row = $result->fetch_assoc()) {
            $ocupaciones[] = $row['Estudiante'];
            $ocupaciones[] = $row['Profesor'];
            $ocupaciones[] = $row['Ingeniero'];
            $ocupaciones[] = $row['Médico'];
            $ocupaciones[] = $row['Abogado'];
            $ocupaciones[] = $row['Arquitecto'];
            $ocupaciones[] = $row['Programador'];
            $ocupaciones[] = $row['Diseñador'];
            $ocupaciones[] = $row['Comerciante'];
            $ocupaciones[] = $row['Carpintero'];
            $ocupaciones[] = $row['Independiente'];
            $ocupaciones[] = $row['Jubilado'];
            $ocupaciones[] = $row['Desempleado'];
        }

        $conn->close();

        return $ocupaciones;
    } else {
        echo "No se encontraron ocupaciones en la base de datos.";
    }

    $conn->close();
}
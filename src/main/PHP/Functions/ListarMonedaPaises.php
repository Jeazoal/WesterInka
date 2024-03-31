<?php
require_once __DIR__ . '/../Connections/Connection.php';

$conexionDAO = new conexionDAO();
$conn = $conexionDAO->openConexion();

if (!$conn) {
    die("Error de conexión: No se pudo conectar a la base de datos");
}

$sql = "SELECT id_paises, codigo_moneda, CONCAT(nombre_pais, ' - ', nombre_moneda) AS Nombre FROM paises ORDER BY Nombre ASC";
try {
    $stmt = $conn->query($sql);
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['codigo_moneda'] . "' data-id-paises='" . $row['id_paises'] . "'>" . $row['Nombre'] . "</option>";
        }
    } else {
        echo "<option value=''>No hay datos</option>";
    }
} catch (PDOException $e) {
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}

$conn = null;
?>

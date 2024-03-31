<?php
require_once __DIR__ . '/../Connections/Connection.php';
$conexionDAO = new conexionDAO();
$conn = $conexionDAO->openConexion();

if (!$conn) {
    die("Error de conexión: No se pudo conectar a la base de datos");
}
$sql = "SELECT DISTINCT codigo_moneda, nombre_moneda FROM paises ORDER BY nombre_moneda ASC";
try {
    $stmt = $conn->query($sql);
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['codigo_moneda'] . "'>" . $row['nombre_moneda'] . "</option>";
        }
    } else {
        echo "<option value=''>No hay datos</option>";
    }
} catch (PDOException $e) {
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}
$conn = null;
?>

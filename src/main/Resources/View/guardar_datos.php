<?php
require_once '../../PHP/Connections/Connection.php';
require_once '../../PHP/Models/Envios.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datos = json_decode(file_get_contents("php://input"), true);

    if (!empty($datos) && isset($datos['Moneda_de_Envio']) && isset($datos['Cantidad_Enviada']) && isset($datos['Cantidad_Recibida']) && isset($datos['Total']) && isset($datos['id_paises']) && isset($datos['Tipo_de_Cambio'])) {
        $monedaEnvio = $datos['Moneda_de_Envio'];
        $cantidadEnvio = $datos['Cantidad_Enviada'];
        $cantidadRecibida = $datos['Cantidad_Recibida'];
        $total = $datos['Total'];
        $idPaises = $datos['id_paises'];
        $tipoCambio = $datos['Tipo_de_Cambio'];

        $envio = new Envio($idPaises, $monedaEnvio, $cantidadEnvio, $cantidadRecibida, $total, $tipoCambio);

        try {
            $conexionDAO = new conexionDAO();
            $pdo = $conexionDAO->openConexion();

            $sql = "INSERT INTO envios (id_paises, Moneda_de_Envio, Cantidad_Enviada, Cantidad_Recibida, Total, tipo_cambio) 
                    VALUES (:id_paises, :moneda_envio, :cantidad_envio, :cantidad_recibida, :total, :tipo_cambio)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':id_paises', $idPaises);
            $stmt->bindParam(':moneda_envio', $monedaEnvio);
            $stmt->bindParam(':cantidad_envio', $cantidadEnvio);
            $stmt->bindParam(':cantidad_recibida', $cantidadRecibida);
            $stmt->bindParam(':total', $total);
            $stmt->bindParam(':tipo_cambio', $tipoCambio);

            $stmt->execute();

            echo "Datos guardados correctamente en la base de datos";
        } catch (PDOException $e) {
            echo "Error al guardar los datos en la base de datos: " . $e->getMessage();
        }
    } else {
        echo "Error: No se recibieron datos completos por POST.";
    }
} else {
    echo "Error: No se recibieron datos por POST.";
}
?>

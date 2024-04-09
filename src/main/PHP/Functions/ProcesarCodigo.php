<?php
// Función para generar un código de transferencia único de 10 dígitos
function generarCodigoTransferencia($beneficiario, $monto, $paisDestino, $remitente) {
    // Se crea un código único basado en la información proporcionada
    $codigo = substr(strtoupper(sha1($beneficiario . $monto . $paisDestino . $remitente)), 0, 10); // Tomar los primeros 10 caracteres del hash SHA-1
    return $codigo;
}

// Obtener la información del beneficiario, monto a recibir, país de destino y remitente desde la URL o el formulario
$beneficiario = isset($_GET["nombre_beneficiario"]) ? $_GET["nombre_beneficiario"] : "";
$monto = isset($_GET["monto_enviar"]) ? $_GET["monto_enviar"] : "";
$paisDestino = isset($_GET["pais_destino"]) ? $_GET["pais_destino"] : "";
$remitente = isset($_GET["nombre_remitente"]) ? $_GET["nombre_remitente"] : "";

// Generar el código de transferencia único
$codigo_transferencia = generarCodigoTransferencia($beneficiario, $monto, $paisDestino, $remitente);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmación de Envío</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>Confirmación de Envío</h1>
  </header>
  <main>
  <section class="resumen">
      <h2>Resumen del Envío</h2>
      <ul>
        <li><strong>Remitente:</strong> <?php echo isset($_GET["nombre_remitente"]) ? $_GET["nombre_remitente"] : ""; ?></li>
        <li><strong>Documento:</strong> <?php echo isset($_GET["documento"]) ? $_GET["documento"] : ""; ?></li>
        <li><strong>Celular:</strong> <?php echo isset($_GET["celular_remitente"]) ? $_GET["celular_remitente"] : ""; ?></li>
        <li><strong>Beneficiario:</strong> <?php echo isset($_GET["nombre_beneficiario"]) ? $_GET["nombre_beneficiario"] : ""; ?></li>
        <li><strong>País de Destino:</strong> <?php echo isset($_GET["pais_destino"]) ? $_GET["pais_destino"] : ""; ?></li>
        <li><strong>Monto a Enviar:</strong> <?php echo isset($_GET["monto_enviar"]) ? $_GET["monto_enviar"] : ""; ?></li>
        <li><strong>Total a Pagar:</strong> <?php echo isset($_GET["total_pagar"]) ? $_GET["total_pagar"] : ""; ?></li>
      </ul>
    </section>
    <section class="opciones">
      <button href="dineroenviado.php" class="confirmar-btn">Confirmar Envío</button>
      <a href="enviardinero.php" class="cancelar-btn">Cancelar</a>
    </section>
  </main>
</body>
</html>
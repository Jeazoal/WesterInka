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
        <li><strong>Código de Transferencia:</strong> <?php echo $codigo_transferencia; ?></li>
        <li><strong>Remitente:</strong> <?php echo $remitente; ?></li>
        <li><strong>Beneficiario:</strong> <?php echo $beneficiario; ?></li>
        <li><strong>País de Destino:</strong> <?php echo $paisDestino; ?></li>
        <li><strong>Monto a Recibir:</strong> <?php echo $monto; ?></li>
      </ul>
    </section>
    
  </main>
</body>
</html>
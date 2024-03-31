<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Envíos</title>
    <link href="css/style-conversor.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0r3qJiZfowt4/8Wz92sDJ4tjeoHRgFJFZpA6WC8J0pkwxh2G8gEd5dd6IY4q0y+" crossorigin="anonymous">
    
</head>
<body>
    <div class="containers">
        <div class="header">
            <h2>Conversor de Monedas</h2>
        </div>
        <div class="container">
            <label for="moneda_de_envio">Moneda de Envío:</label>
            <select name="moneda_de_envio" id="moneda_de_envio" class="form-select" onchange="actualizarTipoCambio()">
                <?php require_once '../../PHP/Functions/ListarPaises.php'; ?>
            </select>

            <label for="nombre_pais">País de Destino:</label>
            <select name="nombre_pais" id="nombre_pais" class="form-select" onchange="actualizarTipoCambio()">
                <?php require_once '../../PHP/Functions/ListarMonedaPaises.php'; ?>
            </select>

            <label id="tipoCambioLabel"></label>
            <input type="hidden" id="id_paises" name="id_paises"> <br><br>

            <label for="cantidadEnvio">Cantidad a Enviar:</label>
            <input type="number" id="cantidadEnvio" name="cantidadEnvio" class="form-control">

            <button type="button" id="calcularBtn" class="btn btn-primary" onclick="calcularEnvio()">Calcular</button>
        </div>
        <div class="result-container">
            <label class="result-label" for="cantidadRecibida">Cantidad Recibida:</label>
            <input type="text" id="cantidadRecibida" name="cantidadRecibida" class="result-input" readonly>

            <label class="result-label" for="comision">Comisión 10%:</label>
            <input type="text" id="comision" name="comision" class="result-input" readonly>

            <label class="result-label" for="total">Total a Pagar:</label>
            <input type="text" id="total" name="total" class="result-input" readonly>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-JfK3jD0zL/wmx0D3HhpibNhj5gO+1bYfOBFC+ftaW7rXH2jI6Hy/aI3axfR5NskW" crossorigin="anonymous"></script>

    <script>
        function actualizarTipoCambio() {
            var monedaEnvio = document.getElementById("moneda_de_envio").value;
            var paisDestino = document.getElementById("nombre_pais").value;
            var idPaises = document.getElementById("nombre_pais").options[document.getElementById("nombre_pais").selectedIndex].getAttribute('data-id-paises');
            document.getElementById("id_paises").value = idPaises;

            var apiKey = '16d583ec99be1f7e43ea49bf';
            var url = "https://v6.exchangerate-api.com/v6/" + apiKey + "/latest/" + monedaEnvio;

            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    var tipoCambio = response.conversion_rates[paisDestino];

                    document.getElementById('tipoCambioLabel').innerText = '1 ' + monedaEnvio + ' = ' + tipoCambio + ' ' + paisDestino;
                }
            };
            xhr.send();
        }

        function calcularEnvio() {
            var CodigoEnvio = document.getElementById("moneda_de_envio").value;
            var monedaEnvio = document.getElementById("moneda_de_envio").options[document.getElementById("moneda_de_envio").selectedIndex].text;
            var paisDestino = document.getElementById("nombre_pais").value;
            var cantidadEnvio = parseFloat(document.getElementById("cantidadEnvio").value);
            var idPaises = document.getElementById("id_paises").value; 

            var tipoCambioString = document.getElementById('tipoCambioLabel').innerText;
            var tipoCambio = parseFloat(tipoCambioString.split('=')[1]);
            var cantidadRecibida = cantidadEnvio * tipoCambio;

            // Calcular el total sumando la cantidad enviada y el 10% de comisión en la moneda de envío original
            var comision = cantidadEnvio * 0.1;
            var total = cantidadEnvio + comision;

            document.getElementById('total').value = total.toFixed(2)  +" "+ CodigoEnvio;
            document.getElementById('cantidadRecibida').value = cantidadRecibida.toFixed(2) +" "+ paisDestino;
            document.getElementById('comision').value = comision.toFixed(2)  + " "+CodigoEnvio;

            var datosEnvio = {
                "id_paises": idPaises,
                "Moneda_de_Envio": monedaEnvio,
                "Cantidad_Enviada": cantidadEnvio + " "+ CodigoEnvio ,
                "Cantidad_Recibida": cantidadRecibida.toFixed(2) +" "+ paisDestino,
                "Total": total.toFixed(2) +" "+ CodigoEnvio,
                "Comision": comision.toFixed(2) + ""+CodigoEnvio,
                "Tipo_de_Cambio": tipoCambio
            };

            var datosEnvioJSON = JSON.stringify(datosEnvio);
            enviarDatos(datosEnvioJSON);
        }

        function enviarDatos(datos) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "guardar_datos.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                }
            };
            xhr.send(datos);
        }
    </script>
</body>
</html>
